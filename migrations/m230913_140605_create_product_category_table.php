<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_category}}`.
 * @noinspection PhpUnused
 */
class m230913_140605_create_product_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('{{%product_category}}', [
            'id' => $this->primaryKey(),
            'pid' => $this->integer(),
            'name' => $this->string(),
        ]);

        $this->addColumn('product','category_id', 'integer');

        $this->addForeignKey(
            'fk-product-category_id',
            'product',
            'category_id',
            'product_category',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('{{%product_category}}');
    }
}
