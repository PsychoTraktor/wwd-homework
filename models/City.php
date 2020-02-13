<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wsh_co_city".
 *
 * @property int $cit_id
 * @property string|null $cit_zip
 * @property string|null $cit_name
 * @property string|null $cit_cty_code
 * @property float|null $cit_lat
 * @property float|null $cit_long
 * @property int|null $cit_cso_code
 * @property int|null $cit_rig_id
 * @property float|null $cit_range
 * @property int|null $cit_population
 * @property int|null $cit_homes
 */
class City extends \yii\db\ActiveRecord
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
            [['cit_lat', 'cit_long', 'cit_range'], 'number'],
            [['cit_cso_code', 'cit_rig_id', 'cit_population', 'cit_homes'], 'integer'],
            [['cit_zip'], 'string', 'max' => 8],
            [['cit_name'], 'string', 'max' => 64],
            [['cit_cty_code'], 'string', 'max' => 2],
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
            'cit_cty_code' => 'Cit Cty Code',
            'cit_lat' => 'Cit Lat',
            'cit_long' => 'Cit Long',
            'cit_cso_code' => 'Cit Cso Code',
            'cit_rig_id' => 'Cit Rig ID',
            'cit_range' => 'Cit Range',
            'cit_population' => 'Cit Population',
            'cit_homes' => 'Cit Homes',
        ];
    }
}
