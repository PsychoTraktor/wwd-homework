<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property string $text
 * @property int $made_by
 *
 * @property User $madeBy
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text', 'made_by'], 'required'],
            [['text'], 'string'],
            [['made_by'], 'integer'],
            [['made_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['made_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'made_by' => 'Made By',
        ];
    }

    /**
     * Gets query for [[MadeBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMadeBy()
    {
        return $this->hasOne(User::className(), ['id' => 'made_by']);
    }
}
