<?php

use yii\db\Migration;

/**
 * Class m240118_131053_create_table_users
 */
class m240118_131053_create_table_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string()->notNull(),
            'email' => $this->string(200)->notNull(),
            'password' => $this->string()->notNull(),
            'role' => $this->string()->notNull()->defaultValue('user'),
        ],'ENGINE=InnoDB DEFAULT CHARSET=utf8');

        $this->createIndex('users_email_unique', 'users', 'email', true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240118_131053_create_table_users cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240118_131053_create_table_users cannot be reverted.\n";

        return false;
    }
    */
}
