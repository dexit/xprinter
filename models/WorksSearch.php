<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Works;

/**
 * WorksSearch represents the model behind the search form about `app\models\Works`.
 */
class WorksSearch extends Works
{
    public $printers;
    public $specs;
    public $perfs;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_works', 'id_printers', 'date', 'id_perfs'], 'integer'],
            [['summ'], 'number'],
            [['description','printers','perfs','specs'], 'safe'],
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
        $query = Works::find();

        $query->joinWith(['specs']);
        $query->joinWith(['printers']);
        $query->joinWith(['perfs']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['printers'] = [
            'asc' => ['printers.name'=>SORT_ASC],
            'desc' => ['printers.name'=>SORT_DESC],
        ];

        $dataProvider->sort->attributes['specs'] = [
            'asc' => ['printers.specs.fio'=>SORT_ASC],
            'desc' => ['printers.specs.fio'=>SORT_DESC],
        ];

        $dataProvider->sort->attributes['perfs'] = [
            'asc' => ['perfs.name'=>SORT_ASC],
            'desc' => ['perfs.name'=>SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_works' => $this->id_works,
            'id_printers' => $this->id_printers,
            'date' => $this->date,
            'summ' => $this->summ,
            'id_perfs' => $this->id_perfs,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
              ->andFilterWhere(['like', 'printers.name', $this->printers])
              ->andFilterWhere(['like', 'printers.specs.fio', $this->specs])
              ->andFilterWhere(['like', 'perfs.name', $this->perfs]);

        return $dataProvider;
    }
}
