<?php

namespace app\models;

use Yii;
use \yii\behaviors\TimeStampBehavior;
use \yii\db\ActiveRecord;
use \DateTime;

/**
 * This is the model class for table "works".
 *
 * @property integer $id_works
 * @property integer $id_printers
 * @property integer $date
 * @property double $summ
 * @property string $description
 * @property string $id_perfs
 */
class Works extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'works';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_printers', 'date'], 'required'],
            [['id_printers'], 'integer'],
            [['description','date'], 'string'],
            [['summ','id_perfs'], 'number'],
            [['printers','perfs'], 'safe'],
        ];
    }

    public function getPrinters()
    {
        return $this->hasOne('app\models\Printers',["id_printers" => "id_printers"]);
    }

    public function getPerfs()
    {
        return $this->hasOne('app\models\Perfs',['id_perfs' => 'id_perfs']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_works' => 'Id Works',
            'id_printers' => 'Принтер',
            'id_perfs' => 'Виконавець',
            'date' => 'Дата',
            'summ' => 'Сума (грн.)',
            'description' => 'Виконані роботи',
            'printers' => 'Принтер',
            'perfs' => 'Виконавець',
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_AFTER_FIND => 'date',
                ],
                'value' => function() { return date('d/m/Y', $this->date);},
            ],
            'timestamp_edit' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'date',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'date',
                ],
                'value' => function() {
                    //$date = DateTime::createFromFormat("j F Y", "2013-10-10");
                    $date_obj = new DateTime($this->date);
                    $date = $date_obj->format("j F Y");
                    //$date = $date_obj->createFromFormat("j F Y",)
                    $c_date = strtotime($date);
                    //var_dump($c_date);
                    //var_dump($this);
                    //var_dump($this->date = $c_date);
                    //$this->date = (string)$c_date;
                    return $this->date = (string)$c_date;
                    //var_dump($this);
                },
            ],
        ];
    }


}
