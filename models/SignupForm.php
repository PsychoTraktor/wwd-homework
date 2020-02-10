<?php


namespace app\models;


use yii\base\Model;
use yii\helpers\VarDumper;


class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_repeat;

    public function rules()
    {
        return [
            [['username', 'password', 'password_repeat', 'email'], 'required'],
            ['username', 'string', 'min' => 4, 'max' => 16],
            ['email', 'unique','targetClass' => User::className(), 'targetAttribute' => ['email'], 'message'=>'Your email address is already in use.'],
            ['username', 'unique','targetClass' => User::className(), 'targetAttribute' => ['username'], 'message'=>'Your username is already in use.'],
            [['password', 'password_repeat'], 'string', 'min' => 6],
            ['password', 'match', 'pattern' => '/\d/', "message" => 'Password must contain a number.'],
            [['password_repeat'], 'compare', 'compareAttribute' => 'password'],
           
        ];
    }

    public function signup()
    {
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->auth_key = \Yii::$app->security->generateRandomString();
        $user->access_token = \Yii::$app->security->generateRandomString();
        $user->password = \Yii::$app->security->generatePasswordHash($this->password);

        $isUserSaved = $user->save();

        if ($isUserSaved) {
            $profile= new Profile();
            $profile->userid = $user->id;
            if ($profile->save()){
                return true;
            }
            \Yii::error("User profile was not saved: ".VarDumper::dumpAsString($user->errors));
            return false;
        }

        \Yii::error("User was not saved: ".VarDumper::dumpAsString($user->errors));
        return false;
    }

}