<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "addresses".
 *
 * @property integer $id
 * @property string $province
 * @property string $district
 * @property string $ward
 *
 * @property Nodes[] $node
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'addresses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['province', 'district', 'ward'], 'string', 'max' => 255],
            [['province'], 'required'],
            [['district'], 'required'],
            [['ward'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'province' => 'Province',
            'district' => 'District',
            'ward' => 'Ward',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNodes()
    {
        return $this->hasMany(Nodes::className(), ['address_id' => 'id']);
    }
}
