<?php

namespace app\modules\cpanel\models;


use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "product_photo".
 *
 * @property int $id
 * @property string $path
 * @property int|null $product_id
 *
 * @property Product $product
 */
class ProductPhoto extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'product_photo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['path'], 'required'],
            [['product_id'], 'integer'],
            [['path'], 'string', 'max' => 255],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'path' => 'Path',
            'product_id' => 'Product ID',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return ActiveQuery
     */
    public function getProduct(): ActiveQuery
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }
}
