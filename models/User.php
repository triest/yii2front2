<?php

    namespace app\models;

    use Yii;
    use app\models\Skill;

    /**
     * This is the model class for table "users".
     *
     * @property int $id
     * @property string|null $name
     * @property int|null $city_id
     *
     * @property UserSkills[] $userSkills
     * @property City $city
     */
    class User extends \yii\db\ActiveRecord
    {
        /**
         * {@inheritdoc}
         */
        public static function tableName()
        {
            return 'users';
        }

        /**
         * {@inheritdoc}
         */
        public function rules()
        {
            return [
                    [['city_id'], 'integer'],
                    [['name'], 'string', 'max' => 255],
                    [
                            ['city_id'],
                            'exist',
                            'skipOnError' => true,
                            'targetClass' => City::className(),
                            'targetAttribute' => ['city_id' => 'id']
                    ],
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
                    'city_id' => 'City ID',
            ];
        }

        /**
         * Gets query for [[UserSkills]].
         *
         * @return \yii\db\ActiveQuery
         */
        public function getUserSkills()
        {
            //return $this->hasMany(UserSkills::className(), ['user_id' => 'id']);

            return $this->hasMany(Skill::className(), ['id' => 'skill_id'])
                    ->viaTable('User_skills', ['user_id' => 'id']);
        }

        /**
         * Gets query for [[City]].
         *
         * @return \yii\db\ActiveQuery
         */
        public function getCity()
        {
            return $this->hasOne(City::className(), ['id' => 'city_id']);
        }
    }
