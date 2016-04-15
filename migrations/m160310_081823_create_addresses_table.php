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
    }
    public function down()
    {
        $this->dropTable('addresses');
    }
}
