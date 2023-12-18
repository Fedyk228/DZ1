<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 */
class m231013_103214_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'text' => $this->string(),
            'rating' => $this->integer(),
            'id_author' => $this->integer(),
            'date_create' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%post}}');
    }
}
