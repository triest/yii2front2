<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "City".
 *
 * @property int $id
 * @property string|null $name
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'City';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
                ['name', 'unique', 'targetClass' => '\app\models\City',
                        'message' => 'This city has already been taken.'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }
}
