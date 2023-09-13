<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_photo}}`.
 * @noinspection PhpUnused
 */
class m230913_114443_create_product_photo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('{{%product_photo}}', [
            'id' => $this->primaryKey(),
            'path' => $this->string()->notNull(),
            'product_id' => $this->integer()->null(),
        ]);
        $this->addForeignKey(
            'fk-photo-product_id',
            'product_photo',
            'product_id',
            'product',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('{{%product_photo}}');
    }
}
