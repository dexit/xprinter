<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Works;
use \DateTime;

/**
 * WorksSearch represents the model behind the search form about `app\models\Works`.
 */
class WorksSearch extends Works
{
    public $printers;
    public $specs;
    public $perfs;
    public $inv;
    public $printersname;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_works', 'id_printers', 'id_perfs'], 'integer'],
            [['summ'], 'number'],
            [['description','printers','perfs','specs','inv','printersname', 'date'], 'safe'],
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
        $query->joinWith(['perfs']);

        $subQueryPrinters = Printers::find()->select('id_printers, name, inv')->groupBy('id_printers');
        $query->leftJoin(['printersname'=>$subQueryPrinters],'printersname.id_printers=works.id_printers');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort(['defaultOrder'=>['date'=>SORT_DESC],]);

        $dataProvider->sort->attributes['printersname'] = [
            'asc' => ['printers.name'=>SORT_ASC],
            'desc' => ['printers.name'=>SORT_DESC],
        ];

        $dataProvider->sort->attributes['inv'] = [
            'asc' => ['printers.inv'=>SORT_ASC],
            'desc' => ['printers.inv'=>SORT_DESC],
        ];

        $dataProvider->sort->attributes['specs'] = [
            'asc' => ['specs.fio'=>SORT_ASC],
            'desc' => ['specs.fio'=>SORT_DESC],
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

        if ($this->date) {
            $d = explode("/", $this->date);
            $date_obj = new DateTime();
            $date_obj->setDate($d[2],$d[1],$d[0]);
            $date_m = $date_obj->format("j F Y");
            $this->date = strtotime($date_m);
        }

        $query->andFilterWhere([
            'id_works' => $this->id_works,
            'id_printers' => $this->id_printers,
            'date' => $this->date,
            'summ' => $this->summ,
            'id_perfs' => $this->id_perfs,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
              ->andFilterWhere(['like', 'printersname.name', $this->printersname])
              ->andFilterWhere(['like', 'specs.fio', $this->specs])
              ->andFilterWhere(['like', 'perfs.name', $this->perfs])
              ->andFilterWhere(['like', 'printers.inv', $this->inv]);

        return $dataProvider;
    }
}
