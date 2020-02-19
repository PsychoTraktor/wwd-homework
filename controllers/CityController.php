<?php
namespace app\controllers;
use Yii;
use app\models\WshCoCity;
use yii\helpers\Json;


class CityController extends \yii\web\Controller
{
   public function actionGetCity($zipId) {

        $city = WshCoCity::findOne($zipId);

        echo Json::encode($city);
   }

}