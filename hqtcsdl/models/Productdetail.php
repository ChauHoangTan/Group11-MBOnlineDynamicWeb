<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_detail".
 *
 * @property int $ID_D_PROC
 * @property string|null $DESCRIBE_PROC
 * @property int|null $SOLD
 * @property string $TOTAL_NUMBER
 * @property int|null $ID_PROC
 * @property string|null $SCREEN_TECH
 * @property string|null $RESOLUTION
 * @property string|null $SREEN_SIZE
 * @property float|null $MAX_BRIGHTNESS
 * @property string|null $SCREEN_SENSOR
 * @property string|null $F_CAM_RESOLUTION
 * @property string|null $F_CAM_FILM
 * @property string|null $F_CAM_FLASH
 * @property string|null $F_CAM_FEATURE
 * @property string|null $B_CAM_RESOLUTION
 * @property string|null $B_CAM_FEATURE
 * @property string|null $OS
 * @property string|null $CPU
 * @property string|null $CPU_SPEED
 * @property string|null $GPU
 * @property string|null $RAM
 * @property string|null $ROM
 * @property string|null $ROM_AVB
 * @property string|null $MEMORY_CARD
 * @property string|null $PHONEBOOK
 * @property int|null $BATTERY_CAPACITY
 * @property string|null $BATTERY_TYPE
 * @property int|null $MAX_CHARGE
 * @property int|null $CHARGER_INCLUDED
 * @property string|null $BATTERY_FEATURE
 */
class Productdetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['DESCRIBE_PROC'], 'string'],
            [['SOLD', 'ID_PROC', 'BATTERY_CAPACITY', 'MAX_CHARGE', 'CHARGER_INCLUDED'], 'integer'],
            [['TOTAL_NUMBER'], 'required'],
            [['MAX_BRIGHTNESS'], 'number'],
            [['TOTAL_NUMBER', 'SCREEN_TECH', 'RESOLUTION', 'SREEN_SIZE', 'SCREEN_SENSOR', 'F_CAM_RESOLUTION', 'F_CAM_FILM', 'F_CAM_FLASH', 'F_CAM_FEATURE', 'B_CAM_RESOLUTION', 'B_CAM_FEATURE', 'OS', 'CPU', 'CPU_SPEED', 'GPU', 'RAM', 'ROM', 'ROM_AVB', 'MEMORY_CARD', 'PHONEBOOK', 'BATTERY_TYPE', 'BATTERY_FEATURE'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function getProductDetail($id){
        return Productdetail::findOne($id);
    }
    public function attributeLabels()
    {
        return [    
            'ID_D_PROC' => 'Id D Proc',
            'DESCRIBE_PROC' => 'Describe Proc',
            'SOLD' => 'Sold',
            'TOTAL_NUMBER' => 'Total Number',
            'ID_PROC' => 'Id Proc',
            'SCREEN_TECH' => 'Screen Tech',
            'RESOLUTION' => 'Resolution',
            'SREEN_SIZE' => 'Sreen Size',
            'MAX_BRIGHTNESS' => 'Max Brightness',
            'SCREEN_SENSOR' => 'Screen Sensor',
            'F_CAM_RESOLUTION' => 'F Cam Resolution',
            'F_CAM_FILM' => 'F Cam Film',
            'F_CAM_FLASH' => 'F Cam Flash',
            'F_CAM_FEATURE' => 'F Cam Feature',
            'B_CAM_RESOLUTION' => 'B Cam Resolution',
            'B_CAM_FEATURE' => 'B Cam Feature',
            'OS' => 'Os',
            'CPU' => 'Cpu',
            'CPU_SPEED' => 'Cpu Speed',
            'GPU' => 'Gpu',
            'RAM' => 'Ram',
            'ROM' => 'Rom',
            'ROM_AVB' => 'Rom Avb',
            'MEMORY_CARD' => 'Memory Card',
            'PHONEBOOK' => 'Phonebook',
            'BATTERY_CAPACITY' => 'Battery Capacity',
            'BATTERY_TYPE' => 'Battery Type',
            'MAX_CHARGE' => 'Max Charge',
            'CHARGER_INCLUDED' => 'Charger Included',
            'BATTERY_FEATURE' => 'Battery Feature',
        ];
    }
}
