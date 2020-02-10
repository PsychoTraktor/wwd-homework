<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $summarize
 * @property string $body
 * @property boolean $public
 * @property boolean $commentable
 * @property int $viewcount
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 *
 * @property User $createdBy
 */
class Article extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }



    public function behaviors() {

        return [
            TimestampBehavior::class,
            [
                'class' => BlameableBehavior::class,    // specified attributes with the current user ID.
                'updatedByAttribute' => false
            ],
            [
                'class' => SluggableBehavior::class,    //create slug by attribute
                'attribute' => 'title'
            ]
            ];

    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'body', 'summarize'], 'required'],
            [['title', 'slug'], 'string', 'max' => 60],
            [['body'], 'string'],
            [['public', 'commentable'], 'boolean'],
            [['created_at', 'updated_at', 'created_by', 'viewcount'], 'integer'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'summarize' => 'Summarize',
            'body' => 'Body',
            'viewcount' => 'Views',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }


    public function findArticles() {

        $articles = Article::find()->where(['created_by' => $this->created_by])->all();

        return $articles;
    }  


    /**
     * 
     * Gets number of articles, made by actual user.
     */
    public function countArticles() {

        $articles = $this->findArticles();
        $size = sizeof($articles);

        return $size;
    }

    public function getviews() {
        $views = $this->viewcount;
        return $views;
    }

   // public getViewsBy

    
}
