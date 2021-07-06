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
class BlogController extends TotalController
{
    /**
     * Показ страницы все  "Новости".
     *
     * @return mixed
     */
    public function actionNews()
    {
        $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all();

        Yii::$app->params['menu_categories'] = $menu_categories; 

        return $this->render('news');
    } 
    /**
     * Показ страницы одна Новость.
     *
     * @return mixed
     */
    public function actionArticle()
    {
        $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all();

        Yii::$app->params['menu_categories'] = $menu_categories; 

        return $this->render('article');
    }            

}
