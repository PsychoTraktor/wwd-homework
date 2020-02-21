<?php

namespace app\models;
use yii\base\Model;

use Yii;


 
class Userprofile extends Model {
    public $id;
    public $username;
    public $email;
    public $birthdate;
    public $introduction;
    public $articlesNum;
    public $address;
    public $city;
    public $zip_id;
    public $country;
    public $userid;

    public function rules()
    {
        return [
            [['username',  'email'], 'required'],
            ['username', 'string', 'min' => 4, 'max' => 16],
            ['email', 'unique','targetClass' => User::className(), 'targetAttribute' => ['email'], 'message'=>'Your email address is already in use.',
             'when' => function($model){
                $user =  User::find()->where(['id' => $model->userid])->one();
                //die("id:".$model->userid);
                return ($user->email != $model->email);
             }],
             ['username', 'unique','targetClass' => User::className(), 'targetAttribute' => ['username'], 'message'=>'Your username is already in use.',
             'when' => function($model){
                $user =  User::find()->where(['id' => $model->userid])->one();
                //die("id:".$model->userid);
                return ($user->username != $model->username);
             }],
            [[ 'email'], 'email'],
            [['birthdate'], 'date', 'format' => 'yyyy-M-dd'],
            [['birthdate'], 'safe'],
            [['introduction'], 'string'],
            [['userid'], 'integer'],
           // [['city'], 'exist', 'skipOnError' => false, 'targetClass' => City::className(), 'targetAttribute' => ['city' => 'cit_name']],  //city validation??
            [['address', 'city', 'zip_id', 'country'], 'string', 'max' => 255],
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
            'zip_id' => 'Zip',
            'country' => 'Country',
            'userid' => 'Userid',
        ];
    }

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

    public function loadUserprofile() {

        $this->userid = Yii::$app->user->identity->id;

        $user = User::find()->where(['id' => $this->userid])->one();
        $profile = Profile::find()->where(['userid' => $this->userid])->one();

        
        $this->articlesNum = $this->numberOfArticles($this->userid);
        $this->id = $user->id;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->birthdate = $profile->birthdate;

        $this->introduction = $profile->introduction;
        $this->address = $profile->address;
        $this->city = $profile->city;
        $this->zip_id = $profile->zip_id;
        $this->country = $profile->country;
    }

    public function saveUserprofile() {

        $this->userid = Yii::$app->user->identity->id;

        $user = User::find()->where(['id' => $this->userid])->one();
        $profile = Profile::find()->where(['userid' => $this->userid])->one();

        $user->username = $this->username;
        $user->email = $this->email;
        
        $profile->birthdate = $this->birthdate;
        $profile->introduction = $this->introduction;
        $profile->address = $this->address;
        $profile->city = $this->city;
        $profile->zip_id = $this->zip_id;
        $profile->country = $this->country;

        $user->save();
        $profile->save();
    }

}