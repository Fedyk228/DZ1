<?php

namespace app\controllers;

use app\models\User;
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
        $items = Post::find()->select('*')->innerJoin(User::tableName(),Post::tableName() . '.id_author = ' . User::tableName() . '.uid')->where(['id' => Yii::$app->request->get('id')])->asArray()->all();
        $user = UserController::checkLogin();

        return $this->render('item', ['items' => $items, 'user' => $user]);
    }


}