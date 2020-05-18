<?php

use yii\db\Migration;

/**
 * Class m200518_122204_add_foregin_key_users_city
 */
class m200518_122204_add_foregin_key_users_city extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex(
                'idx_city_id',
                'Users',
                'city_id'
        );


        // add foreign key for table `article`
        $this->addForeignKey(
                'fk-users_id',
                'Users',
                'city_id',
                'City',
                'id',
                'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200518_122204_add_foregin_key_users_city cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200518_122204_add_foregin_key_users_city cannot be reverted.\n";

        return false;
    }
    */
}
