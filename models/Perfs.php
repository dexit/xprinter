<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "perfs".
 *
 * @property integer $id_perfs
 * @property string $name
 */
class Perfs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'perfs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
            [['works'], 'safe'],
        ];
    }

    public function getWorks()
    {
        return $this->hasMany('app\models\Works',['id_perfs' => 'id_perfs']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_perfs' => 'Id Perfs',
            'name' => 'Виконавець',
            'works' => 'Принтери',
        ];
    }
}
