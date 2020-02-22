<?php
namespace app\controllers;
use Yii;
use app\models\WshCoCity;
use yii\helpers\Json;

 /**
     * Finds the city by a Zip code..
     *
     * @return Response
     */
class CityController extends \yii\web\Controller
{
   public function actionGetCity($zipId) {

        $city = WshCoCity::findOne($zipId);

        echo Json::encode($city);
   }

}