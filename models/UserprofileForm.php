<?php

namespace app\models;
use yii\base\Model;

use Yii;


 
class UserprofileForm extends Model {
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
       // $profile = Profile::findIdentityByUserId($userid);

        $this->id = $user->id;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->password = $user->password;
       // $this->birthdate = $profile->birthdate;

      /*  $this->introduction = $profile->introduction;
        $this->address = $profile->address;
        $this->city = $profile->city;
        $this->zip = $profile->zip;
        $this->country = $profile->country;*/

        

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

    public function editProfile($userid) {


        $user = User::findIdentity($userid);
        $profile = Profile::findIdentityByUserId($userid);

       
        $user->username = $this->username;
        $user->email = $this->email;
        $user->password = $this->password;
        
        $profile->introduction = $this->introduction;
        $profile->address = $this->address;
        $profile->city = $this->city;
        $profile->zip = $this->zip;
        $profile->zip = $this->zip;

        $user->save();
        $profile->save();

       /* $user = User::findIdentity($userid);
        $profile = Profile::findIdentityByUserId($userid); <---- EZEK MUKODNEK, UPDATELIK AT ADATBAZIST
        $user->username = "eres peloo";
        $profile->introduction = "eres a peloom";
        $user->save();
        $profile->save();*/
    }
}