<?php

namespace app\models;
use yii\behaviors\BlameableBehavior;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property string $body
 * @property int $created_by
 * @property int $article_id 
 * * 
 * @property User $created_By
 * @property Article $article_id 
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    public function behaviors() {

        return [
            [
                'class' => BlameableBehavior::class,    // specified attributes with the current user ID.
                'updatedByAttribute' => false
            ],
           
        ];

    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['body'], 'required'],
            [['body'], 'string'],
            [['created_by'], 'integer'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['article_id'], 'integer'],
            [['article_id'], 'exist', 'skipOnError' => true, 'targetClass' => Article::className(), 'targetAttribute' => ['article_id' => 'id']],
            

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'body' => 'Body',
            'created_by' => 'Created By',
            
        ];
    }

    /**
     * Gets query for [[created_by]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    
    /**
     * Gets query for [[created_by]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticleId()
    {
        return $this->hasOne(Article::className(), ['id' => 'article_id']);
    }

    




     
}
