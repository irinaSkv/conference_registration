<?php

use yii\db\Migration;

class m160116_175358_CreateTableConferenceHasUser extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%conference_has_user}}', [
            'id'            => $this->primaryKey(),
            'conference_id' => $this->integer()->notNull(),
            'user_id'       => $this->integer()->notNull(),
            'created_at'    => $this->integer()->notNull(),
            'updated_at'    => $this->integer()->notNull(),
        ], $tableOptions);
        $this->createIndex(
            'conference_user', 
            '{{%conference_has_user}}', 
            [
                'conference_id', 
                'user_id'
            ], 
            true
        );
        $this->addForeignKey(
            'fk_conference', 
            '{{%conference_has_user}}', 
            'conference_id', 
            '{{%conference}}', 
            'id'
        );
        $this->addForeignKey(
            'fk_user', 
            '{{%conference_has_user}}', 
            'user_id', 
            '{{%user}}', 
            'id'
        );
    }

    public function down()
    {
        $this->dropForeignKey('fk_conference', '{{%conference_has_user}}');
        $this->dropForeignKey('fk_user', '{{%conference_has_user}}');
        $this->dropTable('{{%conference_has_user}}');
    }
}
