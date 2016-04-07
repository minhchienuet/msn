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
        $this->createTable('nodes', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'address_id' => $this->integer(),
            'description' => $this->string()
        ]);
        $this->addForeignKey(
            'fk-nodes-address_id',
            'nodes',
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
        $this->dropTable('nodes');
    }
}
