<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aqi_vn".
 *
 * @property integer $id
 * @property integer $level
 * @property string $name
 * @property integer $start_value
 * @property integer $end_value
 * @property string $color
 * @property string $description
 */
class AqiVn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aqi_vn';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level', 'start_value', 'end_value'], 'integer'],
            [['name', 'color', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'level' => 'Level',
            'name' => 'Name',
            'start_value' => 'Start Value',
            'end_value' => 'End Value',
            'color' => 'Color',
            'description' => 'Description',
        ];
    }
}
