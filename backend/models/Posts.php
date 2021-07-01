<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property int $post_id
 * @property string $post_title
 * @property string $post_body
 * @property string $post_createddate
 * @property int $post_author
 *
 * @property Employees $postAuthor
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['post_title', 'post_body', 'post_createddate', 'post_author'], 'required'],
            [['post_createddate'], 'safe'],
            [['post_author'], 'integer'],
            [['post_title'], 'string', 'max' => 100],
            [['post_body'], 'string', 'max' => 500],
            [['post_author'], 'exist', 'skipOnError' => true, 'targetClass' => Employees::className(), 'targetAttribute' => ['post_author' => 'employee_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'post_id' => 'Post ID',
            'post_title' => 'Post Title',
            'post_body' => 'Post Content',
            'post_createddate' => 'Post Created Date',
            'post_author' => 'Post Author',
        ];
    }

    /**
     * Gets query for [[PostAuthor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPostAuthor()
    {
        return $this->hasOne(Employees::className(), ['employee_id' => 'post_author']);
    }
}
