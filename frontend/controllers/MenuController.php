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
class MenuController extends TotalController
{    
    /**
     * Показ страницы "Меню основное".
     *
     * @return mixed
     */
    public function actionMenu()
    {
     /**
     * Передача переменной $menu_categories в layout main.php. или page.php для вывода меню навигации
     */        
        $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all();

        Yii::$app->params['menu_categories'] = $menu_categories; 
     /**
     * Передача переменных со списками КАТЕГОРИЙ, ПОДкатегорий и блюд только для основного меню БЛЮД по id в views
     */
        if (isset($_GET['id']) && $_GET['id'] != "" && filter_var($_GET['id'], FILTER_VALIDATE_INT))
        {
            $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all(); // это КАТЕГОРИИ меню БЛЮД

            $menu_subcategories = Categories::find()->where(['parent_id' => $_GET['id']])->asArray()->all(); // выборка списка ПОДкатегорий только основного меню блюд из БД
            $menu_products = Products::find()->asArray()->all(); // выборка списка всех БЛЮД из БД

            $products_options = Products_options::find()->asArray()->all(); // выборка списка всех характеристик БЛЮД из БД

            if ($menu_subcategories)
            {
                return $this->render('menu', compact('menu_categories', 'menu_subcategories', 'menu_products', 'products_options')); // передача в views списка КАТЕГОРИЙ и ПОДкатегорий основного меню блюд и списка всех БЛЮД
            }
            else
            {
                return $this->redirect(['/menu?id=2']); // редирект на страницу основного меню блюд, если id не существует.
            }
        }
    } 

    /**
     * Показ страницы "Карточка блюда".
     *
     * @return mixed
     */
    public function actionMenu_product()
    {
     /**
     * Передача переменной $menu_categories в layout main.php. или page.php для вывода меню навигации
     */        
        $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all();

        Yii::$app->params['menu_categories'] = $menu_categories; 

     /**
     * Передача переменных со списками КАТЕГОРИЙ, ПОДкатегорий и одного блюда по id в views
     */
        if (isset($_GET['id']) && $_GET['id'] != "" && filter_var($_GET['id'], FILTER_VALIDATE_INT))
        {
            $menu_subcategory = Categories::find()->where(['id' => $_GET['id_category']])->asArray()->one(); // выборка одной ПОДкатегории из БД
            $menu_product = Products::find()->where(['id' => $_GET['id']])->asArray()->one(); // выборка конкретного дисплея БЛЮДА из БД для карточки блюда

            $products_options = Products_options::find()->where(['id_products' => $_GET['id']])->asArray()->all(); // выборка списка всех характеристик БЛЮДА из БД

            $menu_products_slider = Products::find()->where(['id_category' => 47])->asArray()->all(); // выборка всех дисплеев БЛЮД из БД для данной категории

            $products_options_slider = Products_options::find()->where(['size' => 'малая'])->asArray()->all(); // выборка списка всех БЛЮД порция "малая" из БД            

            if ($menu_product)
            {
                return $this->render('menu_product', compact('menu_subcategory', 'menu_product', 'products_options', 'menu_products_slider', 'products_options_slider')); // передача в views одной ПОДкатегории, одного БЛЮДА и всех характеристик блюд по id
            }
            else
            {
                return $this->redirect(['/menu?id=2']); // редирект на страницу основного меню блюд, если id не существует.
            }
        }


    } 

    /**
     * Показ страницы "Меню напитки".
     *
     * @return mixed
     */
    public function actionMenu_drinks()
    {
     /**
     * Передача переменной $menu_categories в layout main.php. или page.php для вывода меню навигации
     */        
        $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all();

        Yii::$app->params['menu_categories'] = $menu_categories; 
     /**
     * Передача переменных со списками КАТЕГОРИЙ, ПОДкатегорий и блюд только для НАПИТКОВ по id в views
     */
        if (isset($_GET['id']) && $_GET['id'] != "" && filter_var($_GET['id'], FILTER_VALIDATE_INT))
        {
            $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all(); // это КАТЕГОРИИ напитков

            $menu_subcategories = Categories::find()->where(['parent_id' => $_GET['id']])->asArray()->all(); // выборка списка ПОДкатегорий только НАПИТКОВ из БД
            $menu_products = Products::find()->asArray()->all(); // выборка списка всех блюд из БД

           $products_options = Products_options::find()->asArray()->all(); // выборка списка всех характеристик БЛЮД из БД

            if ($menu_subcategories)
            {
                return $this->render('menu', compact('menu_categories', 'menu_subcategories', 'menu_products', 'products_options')); // передача в views списка КАТЕГОРИЙ и ПОДкатегорий основного меню блюд и списка всех БЛЮД
            }
            else
            {
                return $this->redirect(['/menu?id=2']); // редирект на страницу основного меню блюд, если id не существует.
            }
        }
    } 
    /**
     * Показ страницы "Меню детское".
     *
     * @return mixed
     */
    public function actionMenu_kids()
    {
     /**
     * Передача переменной $menu_categories в layout main.php. или page.php для вывода меню навигации
     */        
        $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all();

        Yii::$app->params['menu_categories'] = $menu_categories; 
     /**
     * Передача переменных со списками КАТЕГОРИЙ, ПОДкатегорий и блюд только для ДЕТСКОГО по id в views
     */
        if (isset($_GET['id']) && $_GET['id'] != "" && filter_var($_GET['id'], FILTER_VALIDATE_INT))
        {
            $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all(); // это КАТЕГОРИИ детского меню

            $menu_subcategories = Categories::find()->where(['parent_id' => $_GET['id']])->asArray()->all(); // выборка списка ПОДкатегорий только ДЕТСКОГО меню из БД
            $menu_products = Products::find()->asArray()->all(); // выборка списка всех блюд из БД

           $products_options = Products_options::find()->asArray()->all(); // выборка списка всех характеристик БЛЮД из БД

            if ($menu_subcategories)
            {
                return $this->render('menu', compact('menu_categories', 'menu_subcategories', 'menu_products', 'products_options')); // передача в views списка КАТЕГОРИЙ и ПОДкатегорий основного меню блюд и списка всех БЛЮД
            }
            else
            {
                return $this->redirect(['/menu?id=2']); // редирект на страницу основного меню блюд, если id не существует.
            }
        }
    } 
    /**
     * Показ страницы "Меню десерты".
     *
     * @return mixed
     */
    public function actionMenu_deserts()
    {
     /**
     * Передача переменной $menu_categories в layout main.php. или page.php для вывода меню навигации
     */        
        $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all();

        Yii::$app->params['menu_categories'] = $menu_categories; 
     /**
     * Передача переменных со списками КАТЕГОРИЙ, ПОДкатегорий и блюд только для ДЕСЕРТОВ по id в views
     */
        if (isset($_GET['id']) && $_GET['id'] != "" && filter_var($_GET['id'], FILTER_VALIDATE_INT))
        {
            $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all(); // это КАТЕГОРИИ десертного меню

            $menu_subcategories = Categories::find()->where(['parent_id' => $_GET['id']])->asArray()->all(); // выборка списка ПОДкатегорий только ДЕСЕРТОВ из БД
            $menu_products = Products::find()->asArray()->all(); // выборка списка всех блюд из БД

           $products_options = Products_options::find()->asArray()->all(); // выборка списка всех характеристик БЛЮД из БД

            if ($menu_subcategories)
            {
                return $this->render('menu', compact('menu_categories', 'menu_subcategories', 'menu_products', 'products_options')); // передача в views списка КАТЕГОРИЙ и ПОДкатегорий основного меню блюд и списка всех БЛЮД
            }
            else
            {
                return $this->redirect(['/menu?id=2']); // редирект на страницу основного меню блюд, если id не существует.
            }
        }
    } 
    /**
     * Показ страницы "Меню постное".
     *
     * @return mixed
     */
    public function actionMenu_vegans()
    {
     /**
     * Передача переменной $menu_categories в layout main.php. или page.php для вывода меню навигации
     */        
        $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all();

        Yii::$app->params['menu_categories'] = $menu_categories; 
     /**
     * Передача переменных со списками КАТЕГОРИЙ, ПОДкатегорий и блюд только для ПОСТНОГО по id в views
     */
        if (isset($_GET['id']) && $_GET['id'] != "" && filter_var($_GET['id'], FILTER_VALIDATE_INT))
        {
            $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all(); // это КАТЕГОРИИ Постного меню

            $menu_subcategories = Categories::find()->where(['parent_id' => $_GET['id']])->asArray()->all(); // выборка списка ПОДкатегорий только ПОСТНОГО меню из БД
            $menu_products = Products::find()->asArray()->all(); // выборка списка всех блюд из БД

           $products_options = Products_options::find()->asArray()->all(); // выборка списка всех характеристик БЛЮД из БД

            if ($menu_subcategories)
            {
                return $this->render('menu', compact('menu_categories', 'menu_subcategories', 'menu_products', 'products_options')); // передача в views списка КАТЕГОРИЙ и ПОДкатегорий основного меню блюд и списка всех БЛЮД
            }
            else
            {
                return $this->redirect(['/menu?id=2']); // редирект на страницу основного меню блюд, если id не существует.
            }
        }
    } 
    /**
     * Показ страницы "Меню завтраки".
     *
     * @return mixed
     */
    public function actionMenu_breakfasts()
    {
     /**
     * Передача переменной $menu_categories в layout main.php. или page.php для вывода меню навигации
     */        
        $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all();

        Yii::$app->params['menu_categories'] = $menu_categories; 
     /**
     * Передача списков КАТЕГОРИЙ, ПОДкатегорий и блюд только для ЗАВТРАКОВ по id в views
     */
        if (isset($_GET['id']) && $_GET['id'] != "" && filter_var($_GET['id'], FILTER_VALIDATE_INT))
        {
            $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all(); // это КАТЕГОРИИ Завтраков

            $menu_subcategories = Categories::find()->where(['parent_id' => $_GET['id']])->asArray()->all(); // выборка списка ПОДкатегорий только ЗАВТРАКОВ из БД
            $menu_products = Products::find()->asArray()->all(); // выборка списка всех блюд из БД

           $products_options = Products_options::find()->asArray()->all(); // выборка списка всех характеристик БЛЮД из БД

            if ($menu_subcategories)
            {
                return $this->render('menu', compact('menu_categories', 'menu_subcategories', 'menu_products', 'products_options')); // передача в views списка КАТЕГОРИЙ и ПОДкатегорий основного меню блюд и списка всех БЛЮД
            }
            else
            {
                return $this->redirect(['/menu?id=2']); // редирект на страницу основного меню блюд, если id не существует.
            }
        }
    }
    /**
     * Показ страницы "Меню Обеды".
     *
     * @return mixed
     */
    public function actionMenu_dinners()
    {
     /**
     * Передача переменной $menu_categories в layout main.php. или page.php для вывода меню навигации
     */        
        $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all();

        Yii::$app->params['menu_categories'] = $menu_categories; 
     /**
     * Передача переменных со списками КАТЕГОРИЙ, ПОДкатегорий и блюд только для ОБЕДОВ по id в views
     */
        if (isset($_GET['id']) && $_GET['id'] != "" && filter_var($_GET['id'], FILTER_VALIDATE_INT))
        {
            $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all(); // это КАТЕГОРИИ Обедов

            $menu_subcategories = Categories::find()->where(['parent_id' => $_GET['id']])->asArray()->all(); // выборка списка ПОДкатегорий только ОБЕДОВ из БД
            $menu_products = Products::find()->asArray()->all(); // выборка списка всех блюд из БД

           $products_options = Products_options::find()->asArray()->all(); // выборка списка всех характеристик БЛЮД из БД

            if ($menu_subcategories)
            {
                return $this->render('menu', compact('menu_categories', 'menu_subcategories', 'menu_products', 'products_options')); // передача в views списка КАТЕГОРИЙ и ПОДкатегорий основного меню блюд и списка всех БЛЮД
            }
            else
            {
                return $this->redirect(['/menu?id=2']); // редирект на страницу основного меню блюд, если id не существует.
            }
        }
    }                     
           
}
