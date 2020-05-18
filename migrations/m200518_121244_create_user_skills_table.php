<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_skills}}`.
 */
class m200518_121244_create_user_skills_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('User_skills', [
                'id' => $this->primaryKey(),
                'user_id'=>$this->integer(),
                'skill_id'=>$this->integer()
        ]);

        // creates index for column `user_id`
        $this->createIndex(
                'idx_user_skills_user_id',
                'user_skills',
                'user_id'
        );


        // add foreign key for table `user`
        $this->addForeignKey(
                'user_skills_user_id',
                'user_skills',
                'user_id',
                'Users',
                'id',
                'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
                'idx_user_skills_skill_id',
                'user_skills',
                'skill_id'
        );


        // add foreign key for table `user`
        $this->addForeignKey(
                'user_skills_skill_id',
                'user_skills',
                'skill_id',
                'Skills',
                'id',
                'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_skills}}');
    }
}
