<?php

namespace app\models;

use Yii;
use budyaga\users\models\User;
use budyaga\users\models\Node;

/**
 * This is the model class for table "warnings".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $node_id
 * @property string $standard
 * @property integer $level
 * @property string $time_interval
 * @property string $email
 *
 * @property Nodes $node
 * @property User $user
 */
class Warning extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'warnings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'node_id','standard','level','time_interval','email'], 'required'],
            [['user_id', 'node_id', 'level'], 'integer'],
            [['standard', 'time_interval', 'email'], 'string', 'max' => 255],
            [['node_id'], 'exist', 'skipOnError' => true, 'targetClass' => Node::className(), 'targetAttribute' => ['node_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'node_id' => 'Node ID',
            'standard' => 'Standard',
            'level' => 'Level',
            'time_interval' => 'Time Interval',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNode()
    {
        return $this->hasOne(Nodes::className(), ['id' => 'node_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
