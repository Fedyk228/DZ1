<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m231013_103139_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'uid' => $this->primaryKey(),
            'fio' => $this->string(),
            'email' => $this->string(),
            'phone' => $this->string(),
            'password' => $this->string(),
            'date_create' => $this->string(),
            'auth_key' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
