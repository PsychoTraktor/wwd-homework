<?php

namespace app\models;
use yii\base\Model;

use Yii;


 
class Userprofile extends Model {
    public $id;
    public $username;
    public $email;
    public $password;
    public $birthdate;
    public $introduction;
    public $articlesNum;
    public $address;
    public $city;
    public $zip;
    public $country;
    public $userid;

    public function loadByUsername($username) {
        
        $user =  User::findByUsername($username);
     
        $this->id = $user->id;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->password = $user->password;
    }

    

    public function numberOfArticles($userid){
         $con = Yii::$app->db;
    
         $command = $con->createCommand('SELECT count(*) as num from article where created_by =:userid',[':userid'=>$userid]); 

         $result = $command->queryAll();

         return $result[0]['num'];
    }

    public function loadByUserId($userid) {

       

        $user = User::findIdentity($userid);
        $profile = Profile::findIdentityByUserId($userid);
        
        $this->articlesNum = $this->numberOfArticles($userid);
        $this->id = $user->id;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->password = $user->password;
        $this->birthdate = $profile->birthdate;

        $this->introduction = $profile->introduction;
        $this->address = $profile->address;
        $this->city = $profile->city;
        $this->zip = $profile->zip;
        $this->country = $profile->country;

        

    }

}