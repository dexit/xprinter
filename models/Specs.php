<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "specs".
 *
 * @property integer $id_specs
 * @property string $fio
 */
class Specs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'specs';
    }

    public function getPrinters()
    {
        return $this->hasMany(Printers::className(),['id_specs'=>'id_specs']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fio'], 'required'],
            [['fio'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_specs' => 'Id Specs',
            'fio' => 'ПІБ',
        ];
    }
}
