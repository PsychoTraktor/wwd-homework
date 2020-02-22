<?php

namespace app\controllers;
use app\models\Userprofile;
use app\models\ChangePassword;
use app\models\User;
use app\models\Profile;
use Yii;

class UserprofileController extends \yii\web\Controller
{

    public function numberOfArticles($userid){
        $con = Yii::$app->db;
   
        $command = $con->createCommand('SELECT count(*) as num from article where created_by =:userid',[':userid'=>$userid]); 

        $result = $command->queryAll();

        return $result[0]['num'];
   }
   
    public function actionViewstranger($username)
    {   
        $user = User::find()->where(['username' => $username])->one();
        $profile = Profile::find()->where(['userid' => $user->id])->one();

        return $this->render('viewstranger', [
            'user' => $user,
            'profile' => $profile,
        ]);
    }



    public function actionView()
    {   

        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $user = User::find()->where(['id' => Yii::$app->user->identity->id])->one();
        $profile = Profile::find()->where(['userid' => Yii::$app->user->identity->id])->one();

        return $this->render('view', [
            'user' => $user,
            'profile' => $profile,
        ]);
    }

    public function actionEdit()
    {   
       $model = new Userprofile;

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate() && $model->saveUserprofile()) {
                return  $this->redirect(\Yii::$app->urlManager->createUrl('/userprofile/view'));
            }
        } else {
            $model->loadUserprofile();
        
        }

        return $this->render('edit', [
            "model" => $model
        ]);
    }

    public function actionPasswordedit()
    {   
        $model = new ChangePassword;

        if ($model->load(Yii::$app->request->post())) {
            $model->validate() && $model->savePassword();
           return  $this->redirect(\Yii::$app->urlManager->createUrl('/userprofile/edit'));
            }


        return $this->renderAjax('_passwordform', [
            'model' => $model,
        ]);
    }



}
