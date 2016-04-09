<?php

use yii\db\Migration;

/**
 * Handles the creation for table `aqi_qt_table`.
 */
class m160408_161858_create_aqi_qt_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('aqi_qt', [
            'id' => $this->primaryKey(),
            'level' =>$this->integer(),
            'name' =>$this->string(),
            'start_value'  =>$this->integer(),
            'end_value'    =>$this->integer(),
            'color' =>$this->string(),
            'description' =>$this->string()

        ]);
        $this->batchInsert('aqi_qt',
            ['level','name','start_value','end_value','color'],
            [
                [1,'Tốt',0,50,'#03a815'],
                [2,'Bình thường',51,100,'#b7c423'],
                [3,'Có hại',101,150,'#b96d2a'],
                [4,'Nguy hại',151,200,'#b91526'],
                [5,'Rất nguy hại',201,300,'#71155b'],
                [6,'Nguy hiểm',301,400,'#620c19'],
                [7,'Rất nguy hiểm',401,500,'#913a19'],
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('aqi_qt');
    }
}
