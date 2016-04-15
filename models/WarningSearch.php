<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Warning;

/**
 * WarningSearch represents the model behind the search form about `app\models\Warning`.
 */
class WarningSearch extends Warning
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'node_id', 'level'], 'integer'],
            [['standard', 'time_interval', 'email'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Warning::find();

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
            'id' => $this->id,
            'user_id' => $this->user_id,
            'node_id' => $this->node_id,
            'level' => $this->level,
        ]);

        $query->andFilterWhere(['like', 'standard', $this->standard])
            ->andFilterWhere(['like', 'time_interval', $this->time_interval])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
