<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 * @noinspection PhpUnused
 */
class m230913_110421_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'art' => $this->string(10)->notNull()->unique(),
            'name' => $this->string(49)->notNull()->unique(),
            'description' => $this->text(),
        ]);

        $this->createIndex(
            'idx-product-name',
            'product',
            'name',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('{{%product}}');
    }
}
