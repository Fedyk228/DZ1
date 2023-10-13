<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class UserController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionRegister()
    {
        return $this->render('register');
    }

    public function actionLogin()
    {

        return $this->render('login');
    }
}