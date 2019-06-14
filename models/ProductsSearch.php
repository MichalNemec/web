<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ProductsSearch represents the model behind the search form of `app\models\Products`.
 */
class ProductsSearch extends Products
{
    public $searchQuery;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'product_status_id', 'quantity', 'taxable'], 'integer'],
            [['sku', 'name', 'description', 'created_at', 'updated_at', 'searchQuery'], 'safe'],
            [['regular_price', 'discount_price'], 'number'],
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
        $query = Products::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'product_status_id' => $this->product_status_id,
            'regular_price' => $this->regular_price,
            'discount_price' => $this->discount_price,
            'quantity' => $this->quantity,
            'taxable' => $this->taxable
        ]);

        $query->andFilterWhere(['like', 'sku', $this->sku])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        if($this->searchQuery) {
            $query->andFilterWhere([
                'or',
                ['like', 'name', $this->searchQuery],
            ]);
        }

        return $dataProvider;
    }
}
