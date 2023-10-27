<?php

namespace app\controllers;

use Yii;
use app\models\User;
use yii\web\Controller;
use yii\web\Cookie;
use app\models\Post;


class UserController extends Controller
{

    public function actionIndex()
    {
        $model = new Post();
        $err = '';
        $exist = self::checkLogin();

        if ($exist) {
            $posts = Post::find()->where(['id_author' => $exist['uid']])->orderBy(['id' => SORT_DESC])->asArray()->all();
            if ($model->load(Yii::$app->request->post())){
                $model->date_create = Date('d.m.Y - H:i');
                $model->id_author = $exist['uid'];

                if ($model->save()):
                    $this->goBack($_SERVER['REQUEST_URI']);

                else:
                    $err = 'Add review error';
                endif;
            }
        }

        return $this->render('index', ['model' => $model, 'err' => $err, 'exist' => $exist, 'posts' => $posts]);
    }

    public function actionRegister()
    {
        $model = new User();
        $err = '';
        $success = '';

        if ($model->load(Yii::$app->request->post())) {

            $exist = User::find()->where(['email' => $model->email])->asArray()->one();

            if (Yii::$app->request->post('User')['password'] != Yii::$app->request->post('r_password'))
                $err = 'Repeat password incorrect';
            elseif (!$exist) {
                $model->date_create = Date('d.m.Y - H:i');
                $model->password = md5($model->password);

                if ($model->save()) {
                    $model->password = '';
                    $success = 'Register success';
                } else {
                    $err = 'error';
                }
            } else {
                $err = 'This email it exist';
            }

        }

        return $this->render('register', ['model' => $model, 'err' => $err, 'success' => $success]);
    }

    public function actionLogin()
    {
        $model = new User();
        $err = '';

        if ($model->load(Yii::$app->request->post())) {
            $email = Yii::$app->request->post('User')['email'];
            $password = Yii::$app->request->post('User')['password'];
            $exist = User::find()->where(['email' => $email, 'password' => md5($password)])->one();

            if ($exist) {
                $auth_key = md5($email . Date('d.m.H.i.s'));
                $exist->auth_key = $auth_key;

                if ($exist->save()) {
                    $this->successLogin($auth_key);
                }
            } else {
                $err = 'Incorrect login or password';
            }
        }


        return $this->render('login', ['model' => $model, 'err' => $err]);
    }

    public function successLogin($auth_key)
    {
        $cookies = Yii::$app->response->cookies;

        $cookies->add(new Cookie([
            'name' => 'auth_key',
            'value' => $auth_key,
            'expire' => time() + 7200
        ]));

        $this->goBack('/web/user');
    }

     public function actionLogout()
    {
        $cookies = Yii::$app->response->cookies;
        $cookies->remove('auth_key');

        return $this->goBack('/web/user/login');
    }
    static public function checkLogin()
    {
        $cookies = Yii::$app->request->cookies;
        $auth_key = $cookies->getValue('auth_key');
        return User::find()->where(['auth_key' => $auth_key])->asArray()->one();
    }
}