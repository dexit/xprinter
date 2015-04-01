<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Printers;
use yii\db\ActiveQuery;

/**
 * PrinterSearch represents the model behind the search form about `app\models\Printers`.
 */
class PrinterSearch extends Printers
{
    public $countworks;
    public $specs;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_printers', 'year', 'id_specs'], 'integer'],
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
        $subQuery = Works::find()->select('id_printers, count(id_works) as countworks')->groupBy('id_printers');
        $query->leftJoin(['count_works'=>$subQuery],'count_works.id_printers = printers.id_printers');

        $query->joinWith(['specs']);

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

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_printers' => $this->id_printers,
            'year' => $this->year,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'inv', $this->inv])
            ->andFilterWhere(['like', 'serial', $this->serial])
            ->andFilterWhere(['like', 'specs.fio', $this->specs])
            ->andFilterWhere(['like', 'countworks', $this->countworks]);

        return $dataProvider;
    }
}
