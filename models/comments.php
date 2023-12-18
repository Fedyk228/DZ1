<?php

namespace app\models;

use yii\db\ActiveRecord;

class Comments extends ActiveRecord
{
    static public function tableName()
    {
        return 'comment';
    }

    public function rules()
    {
        return[
            [['comment_text'], 'required', 'message' => 'Comment field required'],
        ];
    }


}