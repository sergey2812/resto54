<?php
namespace frontend\controllers;

use Yii;
use yii\base\Model;
use common\models\User;
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
use yii\web\Request;

/**
 * Site controller
 */
class SiteController extends TotalController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all();

        Yii::$app->params['menu_categories'] = $menu_categories;         
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all();

        Yii::$app->params['menu_categories'] = $menu_categories;         
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {

        $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all();

        Yii::$app->params['menu_categories'] = $menu_categories;         

        if (isset($_GET['id']) && $_GET['id'] != "" && filter_var($_GET['id'], FILTER_VALIDATE_INT))
            {
                $menu_categories = Categories::find()->where(['parent_id' => $_GET['id']])->asArray()->all();

                if ($menu_categories)
                    {
                        return $this->render('menu', compact('menu_categories'));
                    }
                else
                    {
                        return $this->redirect(['/']);
                    }
            }
        else
            {
                $random_id = rand(1,39); // выбор случайного номера БЛЮДА

                $products_options = Products_options::find()->where(['id' => $random_id])->asArray()->one(); // выборка одного случайного БЛЮДА из БД            

                $menu_product = Products::find()->where(['id' => $products_options['id_products']])->asArray()->one(); // выборка связанного дисплея БЛЮДА из БД

                $products_options_bef = Products_options::find()->where(['id' => 38])->asArray()->one(); // выборка одного конкретного БЛЮДА из БД            

                $menu_product_bef = Products::find()->where(['id' => $products_options_bef['id_products']])->asArray()->one(); // выборка дисплея, связанного с конкретным БЛЮДОМ

                $products_options_vino = Products_options::find()->where(['id' => 29])->asArray()->one(); // выборка одного конкретного БЛЮДА из БД            

                $menu_product_vino = Products::find()->where(['id' => $products_options_vino['id_products']])->asArray()->one(); // выборка дисплея, связанного с конкретным БЛЮДОМ 

                $products_options_tiramisu = Products_options::find()->where(['id' => 35])->asArray()->one(); // выборка одного конкретного БЛЮДА из БД            

                $menu_product_tiramisu = Products::find()->where(['id' => $products_options_tiramisu['id_products']])->asArray()->one(); // выборка дисплея, связанного с конкретным БЛЮДОМ 

                $products_options_kofee = Products_options::find()->where(['id' => 32])->asArray()->one(); // выборка одного конкретного БЛЮДА из БД            

                $menu_product_kofee = Products::find()->where(['id' => $products_options_kofee['id_products']])->asArray()->one(); // выборка дисплея, связанного с конкретным БЛЮДОМ                                                

                if ($products_options)
                    {
                        return $this->render('index', compact('menu_categories', 'menu_product', 'products_options', 'products_options_bef', 'menu_product_bef', 'products_options_vino', 'menu_product_vino', 'products_options_tiramisu', 'menu_product_tiramisu', 'products_options_kofee', 'menu_product_kofee'));
                    }
                else
                    {
                        return $this->redirect(['/']);
                    }
            }
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all();

        Yii::$app->params['menu_categories'] = $menu_categories;   

        if (!Yii::$app->user->isGuest) 
            {
                return $this->goHome();
            }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) 
            {
                return $this->goBack();
            } 
        else 
            {
                $model->password = '';

                return $this->render('login', ['model' => $model,]);
            }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all();

        Yii::$app->params['menu_categories'] = $menu_categories;  
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Показ страницы "Контакты".
     *
     * @return mixed
     */
    public function actionContact()
    {
        $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all();

        Yii::$app->params['menu_categories'] = $menu_categories;         

        $contact_form = new ContactForm(); // создаем объект формы

        /* получаем данные из формы и запускаем функцию отправки sendEmail, и, если все хорошо, выводим сообщение об удачной отправке сообщения на почту */

        if ($contact_form->load(Yii::$app->request->post()) && $contact_form->sendEmail(Yii::$app->params['adminEmail'])) 
            {
                Yii::$app->session->setFlash('success', 'Письмо отправлено.</br>Админстратор сообщит Вам о его прочтении.'); // выводим сообщение на страницу об успешной отправке письма
                return $this->refresh();
            } 
        else 
            {
                return $this->render('contact', compact('contact_form'));
            }        
    } 

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all();

        Yii::$app->params['menu_categories'] = $menu_categories;          
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all();

        Yii::$app->params['menu_categories'] = $menu_categories;          
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all();

        Yii::$app->params['menu_categories'] = $menu_categories;          
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all();

        Yii::$app->params['menu_categories'] = $menu_categories;          
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all();

        Yii::$app->params['menu_categories'] = $menu_categories;          
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}
