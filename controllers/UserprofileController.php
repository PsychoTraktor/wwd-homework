<?php

namespace app\controllers;
use app\models\UserprofileForm;
use Yii;

class UserprofileController extends \yii\web\Controller
{


    public function actionViewstranger($name)
    {   
        $model = new UserprofileForm();

       $model->loadByUsername($name);

        return $this->render('viewstranger', ['model' => $model]
        );
    }



    public function actionView()
    {   

        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new UserprofileForm();

        $model->loadByUserId(Yii::$app->user->identity->id);

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionEdit()
    {   
        $model = new UserprofileForm();
        $model->loadByUserId(Yii::$app->user->identity->id);
        return $this->render('edit', ['model' => $model]);
    }

    public function actionSubmit() {

        $model = new UserprofileForm();

        if ($model->load(Yii::$app->request->post())) {
            
            $model->editProfile(Yii::$app->user->identity->id);

        }

           // $model->editProfile(Yii::$app->user->identity->id);

        return $this->render('edit', ['model' => $model]);
    }

}
