<?php

namespace app\modules\cpanel\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "page".
 *
 * @property int $id
 * @property string $link
 * @property string $name
 * @property string|null $description
 * @property string $body
 * @property int $created_at
 * @property int $updated_at
 */
class Page extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'page';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['link', 'name', 'body', 'created_at', 'updated_at'], 'required'],
            [['description', 'body'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['link', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'link' => 'Link',
            'name' => 'Name',
            'description' => 'Description',
            'body' => 'Body',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
