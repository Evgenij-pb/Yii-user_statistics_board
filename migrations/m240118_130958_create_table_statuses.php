<?php

use yii\db\Migration;

/**
 * Class m240118_130958_create_table_statuses
 */
class m240118_130958_create_table_statuses extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('statuses', [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string()->notNull(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240118_130958_create_table_statuses cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240118_130958_create_table_statuses cannot be reverted.\n";

        return false;
    }
    */
}
