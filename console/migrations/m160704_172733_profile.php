<?php

use yii\db\Migration;

class m160704_172733_profile extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%profile}}', [
            'id' => $this->primaryKey(),
            'userId' => 'int(10) NOT NULL',
            'name' => $this->string(80)->notNull()->unique(),
            'born' => $this->date(),
            'twitter' => $this->string(40),
            'facebook' => $this->string(40),
            'avatar' => $this->string(80),
        ], $tableOptions);

        $this->createIndex('idx-profile-id', 'profile', 'userId');
        $this->addForeignKey('fk-user-id', 'profile', 'userId', 'user', 'id');
    }

    public function down()
    {
        echo "m160704_172733_profile cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
