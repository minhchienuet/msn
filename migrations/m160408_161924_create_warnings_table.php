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
        $this->createTable('warnings_table', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('warnings_table');
    }
}
