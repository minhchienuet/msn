<?php

use yii\db\Migration;

/**
 * Handles the creation for table `warnings_table`.
 */
class m160408_161924_create_warnings_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('warnings', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'node_id' => $this->integer(),
            'standard' =>$this->string(),
            'level' => $this->integer(),
            'time_interval' => $this->string(),
            'email' => $this->string(),
        ]);
        $this->addForeignKey(
            'fk-warning-user_id',
            'warnings',
            'user_id',
            'user',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-warning-node_id',
            'warnings',
            'node_id',
            'nodes',
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
        $this->dropTable('warnings');
    }
}
