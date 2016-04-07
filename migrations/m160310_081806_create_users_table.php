<?php

use yii\db\Migration;

class m160310_081806_create_users_table extends Migration
{
    public function up()
    {
        $this->createTable('user', [
                'id' => $this->primaryKey(),
                'username' =>$this->string('45')->notNull(),
                'password' =>$this->string('45'),
                'email' => $this->string('45')->unique(),
                'address' => $this->string('255'),
                'auth_key' =>$this->string('32')->notNull(),
                'phone' => $this->integer('11'),
            ]);
        $this->insertData();
    }
    public function insertData(){
        $this->batchInsert('user',
            ['username','password','email','address','phone'],
            [
                ['admin','123456','admin@example.com','Ha Noi', '0912345678'],
                ['demo','123456','demo@example.com','Ha Noi', '0912345678'],
            ]
        );
    }
    public function down()
    {
        $this->dropTable('user');
    }
}
