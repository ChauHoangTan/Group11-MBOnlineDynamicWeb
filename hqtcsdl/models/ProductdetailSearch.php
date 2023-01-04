<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Productdetail;

/**
 * ProductdetailSearch represents the model behind the search form of `app\models\Productdetail`.
 */
class ProductdetailSearch extends Productdetail
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_D_PROC', 'SOLD', 'ID_PROC', 'BATTERY_CAPACITY', 'MAX_CHARGE', 'CHARGER_INCLUDED'], 'integer'],
            [['DESCRIBE_PROC', 'TOTAL_NUMBER', 'SCREEN_TECH', 'RESOLUTION', 'SREEN_SIZE', 'SCREEN_SENSOR', 'F_CAM_RESOLUTION', 'F_CAM_FILM', 'F_CAM_FLASH', 'F_CAM_FEATURE', 'B_CAM_RESOLUTION', 'B_CAM_FEATURE', 'OS', 'CPU', 'CPU_SPEED', 'GPU', 'RAM', 'ROM', 'ROM_AVB', 'MEMORY_CARD', 'PHONEBOOK', 'BATTERY_TYPE', 'BATTERY_FEATURE'], 'safe'],
            [['MAX_BRIGHTNESS'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Productdetail::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID_D_PROC' => $this->ID_D_PROC,
            'SOLD' => $this->SOLD,
            'ID_PROC' => $this->ID_PROC,
            'MAX_BRIGHTNESS' => $this->MAX_BRIGHTNESS,
            'BATTERY_CAPACITY' => $this->BATTERY_CAPACITY,
            'MAX_CHARGE' => $this->MAX_CHARGE,
            'CHARGER_INCLUDED' => $this->CHARGER_INCLUDED,
        ]);

        $query->andFilterWhere(['like', 'DESCRIBE_PROC', $this->DESCRIBE_PROC])
            ->andFilterWhere(['like', 'TOTAL_NUMBER', $this->TOTAL_NUMBER])
            ->andFilterWhere(['like', 'SCREEN_TECH', $this->SCREEN_TECH])
            ->andFilterWhere(['like', 'RESOLUTION', $this->RESOLUTION])
            ->andFilterWhere(['like', 'SREEN_SIZE', $this->SREEN_SIZE])
            ->andFilterWhere(['like', 'SCREEN_SENSOR', $this->SCREEN_SENSOR])
            ->andFilterWhere(['like', 'F_CAM_RESOLUTION', $this->F_CAM_RESOLUTION])
            ->andFilterWhere(['like', 'F_CAM_FILM', $this->F_CAM_FILM])
            ->andFilterWhere(['like', 'F_CAM_FLASH', $this->F_CAM_FLASH])
            ->andFilterWhere(['like', 'F_CAM_FEATURE', $this->F_CAM_FEATURE])
            ->andFilterWhere(['like', 'B_CAM_RESOLUTION', $this->B_CAM_RESOLUTION])
            ->andFilterWhere(['like', 'B_CAM_FEATURE', $this->B_CAM_FEATURE])
            ->andFilterWhere(['like', 'OS', $this->OS])
            ->andFilterWhere(['like', 'CPU', $this->CPU])
            ->andFilterWhere(['like', 'CPU_SPEED', $this->CPU_SPEED])
            ->andFilterWhere(['like', 'GPU', $this->GPU])
            ->andFilterWhere(['like', 'RAM', $this->RAM])
            ->andFilterWhere(['like', 'ROM', $this->ROM])
            ->andFilterWhere(['like', 'ROM_AVB', $this->ROM_AVB])
            ->andFilterWhere(['like', 'MEMORY_CARD', $this->MEMORY_CARD])
            ->andFilterWhere(['like', 'PHONEBOOK', $this->PHONEBOOK])
            ->andFilterWhere(['like', 'BATTERY_TYPE', $this->BATTERY_TYPE])
            ->andFilterWhere(['like', 'BATTERY_FEATURE', $this->BATTERY_FEATURE]);

        return $dataProvider;
    }
}
