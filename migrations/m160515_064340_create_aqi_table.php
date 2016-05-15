<?php

use yii\db\Migration;

/**
 * Handles the creation for table `aqi_table`.
 */
class m160515_064340_create_aqi_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('aqi', [
//            'id' => $this->primaryKey(),
            'standard'  =>  $this->integer(),
            'level'     =>  $this->integer(),
            'name'      =>  $this->string(),
            'start_value'  =>$this->integer(),
            'end_value'    =>$this->integer(),
            'color'     =>  $this->string(),
            'description' =>$this->string()
        ]);
        $this->addPrimaryKey('standard-level','aqi',['standard','level']);
        $this->batchInsert('aqi',
            ['standard','level','name','start_value','end_value','color'],
            [
                [1,1,'Tốt',0,50,'#0566cd'],
                [1,2,'Trung bình',51,100,'#b9c625'],
                [1,3,'Kém',101,200,'#ba6e27'],
                [1,4,'Xấu',201,300,'#ba1627'],
                [1,5,'Nguy hại',301,500,'#4e3826'],
                [2,1,'Tốt',0,50,'#03a815'],
                [2,2,'Bình thường',51,100,'#b7c423'],
                [2,3,'Có hại',101,150,'#b96d2a'],
                [2,4,'Nguy hại',151,200,'#b91526'],
                [2,5,'Rất nguy hại',201,300,'#71155b'],
                [2,6,'Nguy hiểm',301,400,'#620c19'],
                [2,7,'Rất nguy hiểm',401,500,'#913a19'],
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('aqi');
    }
}
