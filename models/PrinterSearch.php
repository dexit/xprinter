<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Printers;

/**
 * PrinterSearch represents the model behind the search form about `app\models\Printers`.
 */
class PrinterSearch extends Printers
{
    public $countworks;
    public $specs;

    /*public function getCountWorks()
    {
        return \app\models\Works::find()->where(['id_printers'=>$this->id_printers])->count();
    }*/
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_printers', 'year', 'id_specs','countWorks'], 'integer'],
            [['name', 'inv', 'serial', 'countworks', 'specs'], 'safe'],
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
        $query = Printers::find();
        //var_dump($query);

        $query->joinWith(['specs']);
        //$query->joinWith(['works']);
        //$query->leftJoin(['works'])->andWhere('works.id_printers=1')->all()->count()->groupBy('id_printers');
        //var_dump($query);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);



        $dataProvider->sort->attributes['specs'] = [
            'asc' => ['specs.fio'=>SORT_ASC],
            'desc' => ['specs.fio'=>SORT_DESC],
        ];

        $dataProvider->sort->attributes['countworks'] = [
            'asc' => ['countworks'=>SORT_ASC],
            'desc' => ['countworks'=>SORT_DESC],
        ];
        //var_dump($params);

        $this->load($params);
//var_dump($this);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_printers' => $this->id_printers,
            'year' => $this->year,
            'countworks' => $this->countworks,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'inv', $this->inv])
            ->andFilterWhere(['like', 'serial', $this->serial])
            ->andFilterWhere(['like', 'specs.fio', $this->specs])
            ->andFilterWhere(['like', 'countworks', $this->countworks]);
//var_dump($this->specs);
        //var_dump($query);
        //var_dump($dataProvider);
        return $dataProvider;
    }
}
