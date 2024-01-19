<?php

use yii\db\Migration;

/**
 * Class m240118_131118_create_table_tasks
 */
class m240118_131118_create_table_tasks extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tasks',[
            'id' => $this->primaryKey()->unsigned(),
            'client_name' => $this->string()->notNull(),
            'title' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'in_work_user_id' => $this->integer(11)->unsigned()->notNull(),
            'category_id' => $this->integer(11)->unsigned()->notNull(),
            'status_id' => $this->integer(11)->unsigned()->notNull(),
            'created_at' => $this->timestamp()->notNull(),
            'completed_at' => $this->timestamp()->notNull(),
        ]);

        $this->createIndex('idx_tasks_in_work_user_id', 'tasks', 'in_work_user_id');
        $this->createIndex('idx_tasks_status_id', 'tasks', 'status_id');
        $this->createIndex('idx_tasks_category_id', 'tasks', 'category_id');

        $this->addForeignKey('fk_tasks_in_work_user', 'tasks', 'in_work_user_id', 'users', 'id', 'NO ACTION', 'NO ACTION');
        $this->addForeignKey('fk_tasks_status', 'tasks', 'status_id', 'statuses', 'id', 'NO ACTION', 'NO ACTION');
        $this->addForeignKey('fk_tasks_category', 'tasks', 'category_id', 'categories', 'id', 'NO ACTION', 'NO ACTION');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240118_131118_create_table_tasks cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240118_131118_create_table_tasks cannot be reverted.\n";

        return false;
    }
    */
}
