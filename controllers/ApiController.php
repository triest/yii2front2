<?php
    /**
     * Created by PhpStorm.
     * User: triest
     * Date: 18.05.2020
     * Time: 16:06
     */
    namespace app\controllers;

    use app\models\User;
    use phpDocumentor\Reflection\Types\Array_;
    use Yii;
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
            $users = User::find()->all();
            $array = array();


            foreach ($users as $user) {
                $skills = $user->getUserSkills()->all();
                $city = $user->getCity()->one();
                $item = array('user' => $user, 'skills' => $skills, 'city' => $city);
                array_push($array, $item);
            }


            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            return $array;
        }

    }