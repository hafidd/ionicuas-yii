<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Wisata;

/**
 * WisataSearch represents the model behind the search form of `app\models\Wisata`.
 */
class WisataSearch extends Wisata
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['wis_id', 'wis_kab_id', 'wis_jenis_id'], 'integer'],
            [['wis_nama', 'wis_keterangan'], 'safe'],
            [['wis_lat', 'wis_long'], 'number'],
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
        $query = Wisata::find();

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
            'wis_id' => $this->wis_id,
            'wis_kab_id' => $this->wis_kab_id,
            'wis_jenis_id' => $this->wis_jenis_id,
            'wis_lat' => $this->wis_lat,
            'wis_long' => $this->wis_long,
        ]);

        $query->andFilterWhere(['like', 'wis_nama', $this->wis_nama])
            ->andFilterWhere(['like', 'wis_keterangan', $this->wis_keterangan]);

        return $dataProvider;
    }
}
