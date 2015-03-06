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
 * @property integer $id_spec
 */
class Printers extends \yii\db\ActiveRecord
{
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
            [['year', 'id_spec'], 'integer']
        ];
    }

    public function getSpec()
    {
        return $this->hasOne('app\models\Specs',["id_specs" => "id_specs"]);
    }

    public function getWork()
    {
        return $this->hasMany('app\models\Works',["id_printers" => "id_printers"]);
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
            'id_spec' => 'Відповідальний',
        ];
    }
}
