<?php

    namespace app\models;

    use Yii;

    /**
     * This is the model class for table "Skills".
     *
     * @property int $id
     * @property string|null $name
     */
    class Skill extends \yii\db\ActiveRecord
    {
        /**
         * {@inheritdoc}
         */
        public static function tableName()
        {
            return 'Skills';
        }

        /**
         * {@inheritdoc}
         */
        public function rules()
        {
            return [
                    [['name'], 'string', 'max' => 255],
                    ['name', 'unique', 'targetClass' => '\app\models\Skill',
                            'message' => 'This skill has already been taken.'],
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
