<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Branches;

/**
 * BranchesSearch represents the model behind the search form of `backend\models\Branches`.
 */
class BranchesSearch extends Branches
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['branch_id'], 'integer'],
            [['branch_name', 'branch_location'], 'safe'],
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
        $query = Branches::find();

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
            'branch_id' => $this->branch_id,
        ]);

        $query->andFilterWhere(['like', 'branch_name', $this->branch_name])
            ->andFilterWhere(['like', 'branch_location', $this->branch_location]);

        return $dataProvider;
    }
}
