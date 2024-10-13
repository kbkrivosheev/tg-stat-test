<?php

namespace app\controllers;

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
            [['original', 'short'], 'required'],
            ['short', 'unique', 'message' => 'Этот URL уже существует.'],
        ];

    }

    public function attributeLabels(): array
    {
        return [
            'original' => 'Ввведите ссылку',
            'short' => 'Скопируйте ссылку'
        ];
    }
    public function beforeValidate()
    {
        $this->short = app\Infrastructure\Uuid\Uuid::next();
        return parent::beforeValidate();
    }

}