<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 *  @property string $email
 * @property string $password
 *  @property string $auth_key
 *  @property string $access_token
 *  @property string $password
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email'], 'required'],
            ['username', 'string', 'min' => 4, 'max' => 16],
            ['email', 'unique','targetClass' => User::className(), 'targetAttribute' => ['email'], 'message'=>'Your email address is already in use.'],
            ['username', 'unique','targetClass' => User::className(), 'targetAttribute' => ['username'], 'message'=>'Your username is already in use.'],
            [['password'], 'string', 'min' => 6],
            ['password', 'match', 'pattern' => '/\d/', "message" => 'Password must contain a number.'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return User::find()->where(['username' => $username])->one();
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::find()->where(['access_token' => $token]);
    }

     /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

     /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

     /**
     * Finds user by email
     *
     * @param string $email
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return User::find()->where(['email' => $email])->one();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

   

    public function getEmail()
    {
        return $this->email;
    }

 
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password);
    }
    
}
