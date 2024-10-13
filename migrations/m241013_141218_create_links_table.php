<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%links}}`.
 */
class m241013_141218_create_links_table extends Migration
{
    private string $tableName = '{{%links}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'original' => $this->text()->notNull()->comment('Оригинальная ссылка'),
            'short' => $this->string(5)->notNull()->unique()->comment('Сокращённая ссылка'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
