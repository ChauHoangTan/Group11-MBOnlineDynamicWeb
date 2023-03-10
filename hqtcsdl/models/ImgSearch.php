<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Img;

/**
 * ImgSearch represents the model behind the search form of `app\models\Img`.
 */
class ImgSearch extends Img
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_IMG', 'ID_PROC'], 'integer'],
            [['IMG_PATH'], 'safe'],
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
        $query = Img::find();

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
            'ID_IMG' => $this->ID_IMG,
            'ID_PROC' => $this->ID_PROC,
        ]);

        $query->andFilterWhere(['like', 'IMG_PATH', $this->IMG_PATH]);

        return $dataProvider;
    }
}
