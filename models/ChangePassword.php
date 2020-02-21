<?php

namespace app\models;
use yii\base\Model;

use Yii;


 
class ChangePassword extends Model {
    public $id;
    public $password;
    public $password_repeat;


    public function rules()
    {
        return [
            [['password',  'password_repeat'], 'required'],
            [['password', 'password_repeat'], 'string', 'min' => 6],
            ['password', 'match', 'pattern' => '/\d/', "message" => 'Password must contain a number.'],
            [['password_repeat'], 'compare', 'compareAttribute' => 'password'],
        ];
    }

    public function loadByUsername($username) {
        
        $user =  User::findByUsername($username);
     
        $this->id = $user->id;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->password = $user->password;
    }


    public function loadPassword() {

        $user = User::find()->where(['id' => $this->userid])->one();

        $this->password = $user->password;
    }

    public function savePassword() {

        $user = User::find()->where(['id' => $this->userid])->one();

        $user->password = \Yii::$app->security->generatePasswordHash($this->password);;
        $user->save();
    }

}