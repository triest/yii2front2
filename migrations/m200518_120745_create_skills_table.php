<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%skills}}`.
 */
class m200518_120745_create_skills_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('Skills', [
                'id' => $this->primaryKey(),
                'title'=>$this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%skills}}');
    }
}
