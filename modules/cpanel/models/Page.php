<?php

namespace app\modules\cpanel\models;

use yii\behaviors\TimestampBehavior;
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
    public function behaviors(): array
    {
        return [
            TimestampBehavior::class,
        ];
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
            'link' => 'Ссылка',
            'name' => 'Название',
            'description' => 'Описание',
            'body' => 'Текст',
            'created_at' => 'Создано',
            'updated_at' => 'Отредактировано',
        ];
    }
}
