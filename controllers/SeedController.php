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


    class SeedController extends Controller
    {

        public function actionIndex()
        {
            $faker = \Faker\Factory::create();

            $city = new City();
            $city->name = "Москва";
            $city->save();
            $city = new City();
            $city->name = "Владивосто́к";
            $city->save();
            $city = new City();
            $city->name = "Калининград";
            $city->save();

            $skils = new Skill();
            $skils->name = "PHP";
            $skils->save();
            $skils = new Skill();
            $skils->name = "NodeJS";
            $skils->save();
            $skils = new Skill();
            $skils->name = "Laravel";
            $skils->save();

            $skils = new Skill();
            $skils->name = "Vue";
            $skils->save();

            $skils = new Skill();
            $skils->name = "Yii2";
            $skils->save();

            $skils = new Skill();
            $skils->name = "C#";
            $skils->save();

            $skils = new Skill();
            $skils->name = "C++";
            $skils->save();

            $skils = new Skill();
            $skils->name = "MySQL";
            $skils->save();
        }

        public static function seed()
        {
            $faker = \Faker\Factory::create();

            $city = new City();
            $city->name = "Москва";
            $city->save();
            $city = new City();
            $city->name = "Владивосто́к";
            $city->save();
            $city = new City();
            $city->name = "Калининград";
            $city->save();

            $skils = new Skill();
            $skils->name = "PHP";
            $skils->save();
            $skils = new Skill();
            $skils->name = "NodeJS";
            $skils->save();
            $skils = new Skill();
            $skils->name = "Laravel";
            $skils->save();

            $skils = new Skill();
            $skils->name = "Vue";
            $skils->save();

            $skils = new Skill();
            $skils->name = "Yii2";
            $skils->save();

            $skils = new Skill();
            $skils->name = "C#";
            $skils->save();

            $skils = new Skill();
            $skils->name = "C++";
            $skils->save();

            $skils = new Skill();
            $skils->name = "MySQL";
            $skils->save();
        }


    }