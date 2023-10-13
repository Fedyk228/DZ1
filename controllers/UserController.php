<?php

namespace app\controllers;

use app\models\User;
use Yii;

use yii\web\Controller;


class UserController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionRegister()
    {
        $model = new User();
        $err = '';
        $success = '';

        if ($model->load(Yii::$app->request->post())) {
            $exist = User::find()->where(['email' => $model->email])->asArray()->one();

            if (Yii::$app->request->post('user')['password'] != Yii::$app->request->post('r_password')) {
                $err = 'Repeat password incorrect';
            } else {
                $model->date_create = Data('d.m.Y - H:i');
                $model->password = md5($model->password);

                if ($model->save()) {
                    $model->password = '';
                    $success = 'Register success';
                } else {
                    $err = 'error';
                }
            }
        }

        return $this->render('register', ['model' => $model, 'err' => $err, 'success' => $success]);
    }

    public function actionLogin()
    {

        return $this->render('login');
    }
}