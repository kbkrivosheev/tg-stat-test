<?php

declare(strict_types=1);

namespace app\models;

use yii\db\ActiveRecord;


/**
 * This is the model class for table "links".
 *
 * @property integer $id
 * @property string $original
 * @property string $short
 */
class Links extends ActiveRecord
{
    
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'links';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['original'], 'required', 'message' => 'Поле не должно быть пустым'],
            [['original'], 'url', 'message' => 'Неверный формат URL'],
        ];

    }

    public function attributeLabels(): array
    {
        return [
            'original' => 'Ввведите ссылку',
            'short' => 'Скопируйте ссылку'
        ];
    }

}