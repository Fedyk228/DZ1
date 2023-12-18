<?php

namespace app\models;

use yii\db\ActiveRecord;

class Post extends ActiveRecord
{
    static public function tableName()
    {
        return 'post';
    }

    public function rules()
    {
        return[
            [['title'], 'required', 'message' => 'Title field required'],
            ['text', 'string'],
            ['rating', 'integer']
        ];
    }


}