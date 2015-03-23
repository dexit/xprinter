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
    public $countWorks;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_printers', 'year', 'id_specs'], 'integer'],
            [['name', 'inv', 'serial', 'countWorks'], 'safe'],
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

        //$query->joinWith(['specs']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                //'id',
                /*'countWorks' => [
                    //'asc' => ['countWorks' => SORT_ASC],
                    'asc' => ['countWorks' => SORT_ASC],
                    'desc' => ['countWorks' => SORT_DESC],
                    'label' => 'cccc',
                    'default' => SORT_ASC
                ],
                'id_printers'*/
                'name',
                'inv',
                'serial',
                'year',
                'specs'=>[
                    /*'ask'=>['specs.fio'=>SORT_ASC],
                    'desk'=>['specs.fio'=>SORT_DESC],
                    'default'=>SORT_ASC,*/
                ],
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_printers' => $this->id_printers,
            'year' => $this->year,
            'id_specs' => $this->id_specs,
            //'specs.fio' => $this->id_specs,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'inv', $this->inv])
            ->andFilterWhere(['like', 'serial', $this->serial]);

        return $dataProvider;
    }
}
