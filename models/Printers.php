<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "printers".
 *
 * @property integer $id_printers
 * @property string $name
 * @property string $inv
 * @property string $serial
 * @property integer $year
 * @property integer $id_specs
 */
class Printers extends \yii\db\ActiveRecord
{
    //public $countWorks;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'printers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'inv', 'serial'], 'string'],
            [['year', 'id_specs'], 'integer'],
            [['specs','countWorks'],'safe']
        ];
    }

    public function getSpecs()
    {
        return $this->hasOne(Specs::className(),['id_specs' => 'id_specs']);
    }

    public function getWorks()
    {
        return $this->hasMany('app\models\Works',["id_printers" => "id_printers"]);
    }

    public function getCountWorks()
    {
        return \app\models\Works::find()->where(['id_printers'=>$this->id_printers])->count();
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_printers' => 'Id Printers',
            'name' => 'Назва',
            'inv' => 'Інвентарний номер',
            'serial' => 'Серійний номер',
            'year' => 'Рік випуску',
            'id_specs' => 'Відповідальний',
            'specs' => 'Відповідальний',
            'works' => 'Роботи',
            'countWorks' => 'Кількість робіт',
        ];
    }
}
