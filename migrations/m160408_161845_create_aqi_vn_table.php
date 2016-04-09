<?php

use yii\db\Migration;

/**
 * Handles the creation for table `aqi_vn_table`.
 */
class m160408_161845_create_aqi_vn_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('aqi_vn', [
            'id' => $this->primaryKey(),
            'level' =>$this->integer(),
            'name' =>$this->string(),
            'start_value'  =>$this->integer(),
            'end_value'    =>$this->integer(),
            'color' =>$this->string(),
            'description' =>$this->string()
        ]);
        $this->batchInsert('aqi_vn',
            ['level','name','start_value','end_value','color'],
            [
                [1,'Tốt',0,50,'#0566cd'],
                [2,'Trung bình',51,100,'#b9c625'],
                [3,'Kém',101,200,'#ba6e27'],
                [4,'Xấu',201,300,'#ba1627'],
                [5,'Nguy hại',301,500,'#4e3826']
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('aqi_vn');
    }
}
