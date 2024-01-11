<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $client_name
 * @property string $title
 * @property string $description
 * @property int $in_work_user_id
 * @property int $category_id
 * @property int $status_id
 * @property string $created_at
 * @property string $completed_at
 *
 * @property Categories $category
 * @property Users $inWorkUser
 * @property Statuses $status
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_name', 'title', 'description', 'in_work_user_id', 'category_id', 'status_id', 'created_at', 'completed_at'], 'required'],
            [['description'], 'string'],
            [['in_work_user_id', 'category_id', 'status_id'], 'integer'],
            [['created_at', 'completed_at'], 'safe'],
            [['client_name', 'title'], 'string', 'max' => 255],
            [['in_work_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['in_work_user_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Statuses::class, 'targetAttribute' => ['status_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_name' => 'Client Name',
            'title' => 'Title',
            'description' => 'Description',
            'in_work_user_id' => 'In Work User ID',
            'category_id' => 'Category ID',
            'status_id' => 'Status ID',
            'created_at' => 'Created At',
            'completed_at' => 'Completed At',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[InWorkUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInWorkUser()
    {
        return $this->hasOne(Users::class, ['id' => 'in_work_user_id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Statuses::class, ['id' => 'status_id']);
    }
}
