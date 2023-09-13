<?php

namespace app\modules\cpanel\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $art
 * @property string $name
 * @property string|null $description
 *
 * @property ProductPhoto[] $productPhotos
 */
class Product extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['art', 'name'], 'required'],
            [['description'], 'string'],
            [['art'], 'string', 'max' => 10],
            [['name'], 'string', 'max' => 49],
            [['art'], 'unique'],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'art' => 'Art',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[ProductPhotos]].
     *
     * @return ActiveQuery
     * @
     */
    public function getProductPhotos(): ActiveQuery
    {
        return $this->hasMany(ProductPhoto::class, ['product_id' => 'id']);
    }
}
