<?php
use yii\db\Migration;
class m250206_090730_create_table_trip extends \yii\db\Migration
{
    public function safeUp()
    {
        $this->createTable('trip', [
            'id' => $this->primaryKey()->unsigned(),
            'user_id' => $this->integer(11)->unsigned()->notNull(),
            'from' => $this->integer(11)->unsigned()->notNull(),
            'to' => $this->integer(11)->unsigned()->notNull(),
            'date' => $this->dateTime()->notNull(),
            'number_seats' => $this->smallInteger(4)->notNull(),
            'duration' => $this->decimal(10, 1)->notNull(),
            'price' => $this->decimal(10, 2)->notNull(),
            'currency_id' => $this->integer(11)->unsigned()->notNull(),
            'status' => $this->smallInteger(4)->notNull()->defaultValue(1),
            'created' => $this->timestamp(0)->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated' => $this->timestamp(0)->notNull()->defaultExpression('CURRENT_TIMESTAMP')->append('ON UPDATE CURRENT_TIMESTAMP'),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('trip');
    }
}