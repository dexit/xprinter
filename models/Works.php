<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "works".
 *
 * @property integer $id_works
 * @property integer $id_printers
 * @property string $date
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
            [['date', 'description'], 'string'],
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
}
