<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
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
 * Это общий Контроллер для сайта: он наследуется от Yii2, а все остальные уже от него.
 */
class TotalController extends Controller
{
    public function debug($arr) {
        
        echo '<pre>' . print_r($arr, true) . '</pre>';
    }
}

  


