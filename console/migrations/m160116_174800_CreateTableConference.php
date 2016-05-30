<?php

use yii\db\Migration;

class m160116_174800_CreateTableConference extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable(
            '{{%conference}}', 
            [
                'id' => $this->primaryKey(),
                'title' => $this->string()->notNull(),
                'active' => $this->boolean()->notNull()->defaultValue(1),
                'created_at' => $this->integer()->notNull(),
                'updated_at' => $this->integer()->notNull(),
            ],
            $tableOptions); 
        $this->insert(
            '{{%conference}}',
            [
                'title' => 'Конференция 2016',
                'created_at' => time(),
                'updated_at' => time()
            ]
        );
    }

    public function down()
    {
        $this->dropTable('{{%conference}}');
    }
}
