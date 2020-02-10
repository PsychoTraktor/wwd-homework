<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property string $birthdate
 * @property string $introduction
 * @property string $address
 * @property string $city
 * @property string $zip
 * @property string $country
 * @property int $userid
 *
 * @property User $user
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'userid'], 'required'],
            [['birthdate'], 'safe'],
            [['introduction'], 'string'],
            [['userid'], 'integer'],
            [['address', 'city', 'zip', 'country'], 'string', 'max' => 255],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'birthdate' => 'Birthdate',
            'introduction' => 'Introduction',
            'address' => 'Address',
            'city' => 'City',
            'zip' => 'Zip',
            'country' => 'Country',
            'userid' => 'Userid',
        ];
    }

     /**
     * {@inheritdoc}
     */
    public static function findIdentityByUserId($userid)
    {
        return self::find()->where(['userid' => $userid])->one();
    }

    

   
}