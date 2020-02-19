<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wsh_co_city".
 *
 * @property int $cit_id
 * @property string|null $cit_zip
 * @property string|null $cit_name
 */
class WshCoCity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wsh_co_city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cit_zip'], 'string', 'max' => 8],
            [['cit_name'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cit_id' => 'Cit ID',
            'cit_zip' => 'Cit Zip',
            'cit_name' => 'Cit Name',
        ];
    }
}
