<?php

use yii\db\Migration;

/**
 * Handles the creation for table `nodes_table`.
 */
class m160407_185403_create_nodes_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('node', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'address_id' => $this->integer(),
            'description' => $this->string()
        ]);
        $this->addForeignKey(
            'fk-node-address_id',
            'node',
            'address_id',
            'addresses',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('node');
    }
}
