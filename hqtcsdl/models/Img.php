<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "img_proc".
 *
 * @property int $ID_IMG
 * @property string|null $IMG_PATH
 * @property int|null $ID_PROC
 */
class Img extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'img_proc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_PROC'], 'integer'],
            [['IMG_PATH'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_IMG' => 'Id Img',
            'IMG_PATH' => 'Img Path',
            'ID_PROC' => 'Id Proc',
        ];
    }
}
