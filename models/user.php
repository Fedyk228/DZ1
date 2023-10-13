<?php

namespace app\models;

use yii\db\ActiveRecord;

class User extends ActiveRecord
{
    static public function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return[
          [['email'], 'required', 'message' => 'Email filed required'],
          [['password'], 'required', 'message' => 'Password filed required'],
          ['email', 'email'],
          ['phone', 'string'],
          ['fio', 'string'],
          ['date_create', 'string'],
        ];
    }

    public function attributeLabels()
    {
        return[
            'fio' => \Yii::t('app', 'Enter your name'),
            'email' => \Yii::t('app', 'Enter your email address'),
            'password' => \Yii::t('app', 'Enter your password'),
            'phone' => \Yii::t('app', 'Enter your phone'),
        ];
    }

}