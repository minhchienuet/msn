<?php

use yii\db\Migration;

class m160310_081823_create_addresses_table extends Migration
{
    public function up()
    {
        $this->createTable('addresses',[
            'id' => $this->primaryKey(),
            'province' => $this->string(),
            'district' => $this->string(),
            'ward' => $this-> string(),
        ]);
        $this->insertData();
    }

    public function insertData(){
        $this->batchInsert('addresses',
            ['province', 'district','ward'],
            [
                ['Hà Nội', 'Ba Đình', 'Kim mã'],
                ['Hà Nội', 'Ba Đình', 'Liễu Giai'],
                ['Hà Nội', 'Cầu Giấy', 'Dịch Vọng'],
                ['Hà Nội', 'Cầu Giấy', ' Mai Dịch'],
                ['Hà Nội', 'Nam Từ Liêm', ' Mỹ Đình 1'],
                ['Hà Nội', 'Nam Từ Liêm', 'Mễ Trì'],
            ]

        );
    }

    public function down()
    {
        $this->dropTable('addresses');
    }
}
