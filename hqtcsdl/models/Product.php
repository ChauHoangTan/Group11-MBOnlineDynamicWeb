<?php
namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $ID_PROC
 * @property string|null $NAME_PROC
 * @property int|null $PRICE
 * @property int|null $ID_BRAND
 * @property string $img
 */
class Product extends \yii\db\ActiveRecord
{

    /**
     *
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     *
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'PRICE',
                    'ID_BRAND'
                ],
                'integer'
            ],
            [
                [
                    'img'
                ],
                'required'
            ],
            [
                [
                    'NAME_PROC',
                    'img'
                ],
                'string',
                'max' => 255
            ]
        ];
    }

    /**
     *
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_PROC' => 'Id Proc',
            'NAME_PROC' => 'Name Proc',
            'PRICE' => 'Price',
            'ID_BRAND' => 'Id Brand',
            'img' => 'Img'
        ];
    }

    public static function ProductNoiBat($amount, $type)
    {
        if ($type == "SORT_DESC") {
            $result = self::find()->orderBy([
                'PRICE' => SORT_ASC
            ])
                ->limit($amount)
                ->all();
        } else {
            $result = self::find()->orderBy([
                'PRICE' => SORT_DESC
            ])
                ->limit($amount)
                ->all();
        }
        return $result;
    }
}
