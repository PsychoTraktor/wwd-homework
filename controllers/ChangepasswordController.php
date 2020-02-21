<?php
namespace app\controllers;
use Yii;
use app\models\ChangePassword;
use yii\helpers\Json;


class ChangepasswordController extends \yii\web\Controller
{
    public function actionEdit()
    {   
       $model = new ChangePassword;

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate() && $model->savePassword()) {
                return $this->goBack();
            }
        } else {
            $model->loadUserprofile();
        }

        return $this->renderAjax('edit', [
            'model' => $model,
        ]);
    }
}