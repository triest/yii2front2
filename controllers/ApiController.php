<?php
    /**
     * Created by PhpStorm.
     * User: triest
     * Date: 18.05.2020
     * Time: 16:06
     */
    namespace app\controllers;

    use app\models\City;
    use app\models\Skill;
    use app\models\User;
    use Faker\Factory;
    use phpDocumentor\Reflection\Types\Array_;
    use Yii;
    use yii\db\Expression;
    use yii\filters\AccessControl;
    use yii\web\Controller;
    use yii\web\Response;
    use yii\filters\VerbFilter;
    use app\models\LoginForm;
    use app\models\ContactForm;


    class ApiController extends Controller
    {

        public function actionIndex()
        {
            $users = User::find()->orderBy('id', 'desc')->all();
            $array = array();


            foreach ($users as $user) {
                $skills = $user->getSkills()->all();
                $city = $user->getCity()->one();
                $item = array('user' => $user, 'skills' => $skills, 'city' => $city);
                array_push($array, $item);
            }


            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            return $array;
        }

        public function actionDelete($id)
        {
            $request = Yii::$app->request;
            $id = intval($request->get('id'));
            $model = $this->findModel($id);
            if ($model != false) {
                $model->delete();
                Yii::$app->response->statusCode = 200;
            } else {
                Yii::$app->response->statusCode = 404;
            }

        }

        private function findModel($id)
        {
            if (($model = User::findOne($id)) != null) {
                return $model;
            }

            return false;
        }

        public function actionAddRandUser()
        {
            $faker = Factory::create();

            $user = new User();
            $user->name = $faker->name;
            $query = City::find()
                    ->orderBy(new Expression('rand()'))
                    ->limit(1)
                    ->one();
            $user->city_id = $query->id;
            $user->save();


            $query = Skill::find()
                    ->orderBy(new Expression('rand()'))
                    ->limit(random_int(1, 6))
                    ->all();

            $user->saveSkill($query);

            Yii::$app->response->statusCode = 201;
        }


    }