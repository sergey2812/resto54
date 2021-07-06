<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Categories;
use frontend\models\Afisha;
use frontend\models\AfishaStol;
use frontend\models\AfishaMesto;
use frontend\models\Products;
use frontend\models\Cart;
use frontend\models\Products_options;
use frontend\models\Orders;
use frontend\models\OrderItems;

/**
 * Контроллер для страниц сайта
 */
class AfishaController extends TotalController
{

    /**
     * Показ страницы "Афиша".
     *
     * @return mixed
     */
    public function actionAllevents()
    {
     /**
     * Передача переменной $menu_categories в layout main.php. или page.php для вывода меню навигации
     */
        $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all();

        Yii::$app->params['menu_categories'] = $menu_categories; 

        $menu_products_slider = Products::find()->where(['id_category' => 47])->asArray()->all(); // выборка всех дисплеев БЛЮД из БД для данной категории

        $products_options_slider = Products_options::find()->where(['size' => 'малая'])->asArray()->all(); // выборка списка всех БЛЮД порция "малая" из БД  

     /**
     * Передача переменной со списком мероприятий афиши или с одним мероприятием по id в views
     */    
        if (isset($_GET['id']) && $_GET['id'] != "" && filter_var($_GET['id'], FILTER_VALIDATE_INT))
        {
            $afisha = Afisha::find()->where(['id' => $_GET['id']])->asArray()->one(); // выборка из БД одного мероприятия

            if ($afisha)
            {
                return $this->render('event', compact('afisha', 'menu_products_slider', 'products_options_slider')); // передача переменной с одним мероприятием в views одного мероприятия
            }
            else
            {
                return $this->redirect(['/afisha/allevents']); // редирект на афишу, если нет такого id
            }
        }
        else
        {
            $afisha = Afisha::find()->where(['>=', 'date_event', date('Y-m-d H:i:s')])->asArray()->orderBy('date_event ASC')->all(); // выборка из БД всех мероприятий афиши

            return $this->render('allevents', compact('afisha', 'menu_products_slider', 'products_options_slider')); // передача переменной со всеми мероприятиями в views афиши
        } 
    }
         /**
     * Показ страницы "Мероприятие (одно) Афиши".
     *
     * @return mixed
     */
    public function actionEvent()
    {
     /**
     * Передача переменной $menu_categories в layout main.php. или page.php для вывода меню навигации
     */        
        $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all();

        Yii::$app->params['menu_categories'] = $menu_categories; 

        $menu_products_slider = Products::find()->where(['id_category' => 47])->asArray()->all(); // выборка всех дисплеев БЛЮД из БД для данной категории

        $products_options_slider = Products_options::find()->where(['size' => 'малая'])->asArray()->all(); // выборка списка всех БЛЮД порция "малая" из БД        

     /**
     * Передача переменных со списками ПОДкатегорий и одного мероприятия по id в views
     */
        if (isset($_GET['id']) && $_GET['id'] != "" && filter_var($_GET['id'], FILTER_VALIDATE_INT))
        {
            $subcategory = Categories::find()->where(['id' => $_GET['id_category']])->asArray()->one(); // выборка одной ПОДкатегории из БД
            $afisha_event = Afisha::find()->where(['id' => $_GET['id']])->asArray()->one(); // выборка конкретного МЕРОПРИЯТИЯ из БД
            $afisha_stol = AfishaStol::find()->where(['id_events' => $afisha_event['id']])->asArray()->all(); // выборка столов МЕРОПРИЯТИЯ из БД
            $afisha_mesto = AfishaMesto::find()->asArray()->all(); // выборка мест для столов МЕРОПРИЯТИЯ из БД

            if ($afisha_event && $afisha_stol && $afisha_mesto)
            {
                return $this->render('event', compact('subcategory', 'afisha_event', 'afisha_stol', 'afisha_mesto', 'menu_products_slider', 'products_options_slider')); // передача в views одной ПОДкатегории, одного МЕРОПРИЯТИЯ и всех столов и мест
            }
            else
            {
                return $this->redirect(['/afisha/allevents']); // редирект на страницу афиши, если id не существует.
            }
        }        
    }

}
