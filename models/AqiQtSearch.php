<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AqiQt;

/**
 * AqiQtSearch represents the model behind the search form about `app\models\AqiQt`.
 */
class AqiQtSearch extends AqiQt
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'level', 'start_value', 'end_value'], 'integer'],
            [['name', 'color', 'description'], 'safe'],
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
        $query = AqiQt::find();

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
            'level' => $this->level,
            'start_value' => $this->start_value,
            'end_value' => $this->end_value,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
