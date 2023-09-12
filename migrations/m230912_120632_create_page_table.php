<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%page}}`.
 * @noinspection PhpUnused
 */
class m230912_120632_create_page_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('{{%page}}', [
            'id' => $this->primaryKey(),
            'link' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
            'body' => $this->text()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('{{%page}}');
    }
}
