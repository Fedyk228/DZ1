<?php

namespace app\controllers;

use app\models\Comments;
use app\models\User;
use PhpParser\Comment;
use Yii;
use yii\web\Controller;

use app\models\Post;

class SiteController extends Controller
{

    public function actionIndex()
    {
        $posts = Post::find()->asArray()->all();

        return $this->render('index', ['posts' => $posts]);
    }

    public function actionItem()
    {
        $model = new Comments();

        $login = UserController::checkLogin();
        $items = Post::find()->select('*')->innerJoin(User::tableName(),Post::tableName() . '.id_author = ' . User::tableName() . '.uid')->where(['id' => Yii::$app->request->get('id')])->asArray()->all();

        $comments = Comments::find()->select('*')->innerJoin(User::tableName(), Comments::tableName() . '.author_id = ' . User::tableName() . '.uid')->where(['post_id' => Yii::$app->request->get('id')])->asArray()->all();

        if ($login && $model->load(Yii::$app->request->post())) {

            $model->post_id = Yii::$app->request->get('id');
            $model->author_id = $login['uid'];

            if ($model->save()) {
                $this->goBack($_SERVER['REQUEST_URI']);
            }

        }

        return $this->render('item', ['items' => $items, 'login' => $login, 'comments' => $comments, 'model' => $model]);
    }


}