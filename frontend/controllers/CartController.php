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
class CartController extends TotalController
{
    /**
     * Показ страницы "Корзина".
     *
     * @return mixed
     */
    public function actionAdd()
    {   
        $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all();

        Yii::$app->params['menu_categories'] = $menu_categories; 

        $id = Yii::$app->request->get('id'); // получение id из ajax запроса
        $qty = Yii::$app->request->get('quantity'); // получение quantity из ajax запроса
        $type = Yii::$app->request->get('type');

        if ($type == "mesto")
            {
                $product = AfishaMesto::findOne($id); // выборка мест из БД по id

                if(empty($product)) return false; // если выборка пустая, то стоп программа

                $event = Afisha::findOne($product->id_events); // выборка мероприятий из БД по id
                $stol = AfishaStol::findOne($product->stol_number); // выборка стола из БД по номеру
                
                date_default_timezone_set('Asia/Krasnoyarsk'); // мой часовой пояс

                $current_events = Afisha::find()->asArray()->all(); // выборка мер-й                    
                if(empty($current_events)) $current_events = null;
                
                $session = Yii::$app->session; // если продукты найдены, то открываем сессию
                $session->open(); //
                $cart = new Cart(); // создаем объект корзины
                $cart->addToCart($product, $qty, $type, $event, $stol, $current_events); // и передаем в него список продуктов                     
            }

        if ($type == "product")
            {
                $product = Products_options::findOne($id); // выборка блюд из БД по id
                
                if(empty($product)) return false; // если выборка пустая, то стоп программа

                $event = Products::findOne($product->id_products); // это дисплей блюд
                $stol = null; // заглушка
               
                date_default_timezone_set('Asia/Krasnoyarsk'); // мой часовой пояс
                
                $current_events = Afisha::find()->asArray()->all(); // выборка мер-й                    
                if(empty($current_events)) $current_events = null;
                
                $session = Yii::$app->session; // если продукты найдены, то открываем сессию
                $session->open(); //
                $cart = new Cart(); // создаем объект корзины
                $cart->addToCart($product, $qty, $type, $event, $stol, $current_events); // и передаем в него список продуктов                    
            }

        if(!Yii::$app->request->isAjax) { 

            return $this->redirect(Yii::$app->request->referrer);
        }       
        
        $this->layout = false;
        return $this->render('cart-modal', compact('session')); // передача cсессии в views 

    }

    /**
     * функция "Очистка Корзина".
     *
     * @return mixed
     */
    public function actionClearcart()
    {
        $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all();

        Yii::$app->params['menu_categories'] = $menu_categories; 

        $session = Yii::$app->session; // если продукты найдены, то открываем сессию
        $session->open();

        foreach ($session['cart'] as $id => $item)
            {
                if ($item['type'] == "mesto")
                    {
                        $product = AfishaMesto::findOne($id); // выборка билета из БД по id
                        $product->status = 1;
                        $product->save();
                    }                
            }

        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        $session->remove('cart.eventtoday');
        $session->remove('cart.event.qty');
        $session->remove('cart.product.qty');

        $this->layout = false;
        return $this->render('cart-modal', compact('session')); // передача cсессии в views 
    }

    /**
     * Функция "удаления позиции в Корзине".
     *
     * @return mixed
     */
    public function actionDelitem()
    {
        $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all();

        Yii::$app->params['menu_categories'] = $menu_categories; 

        $id = Yii::$app->request->get('id'); // получение id блюда из ajax запроса
        $type = Yii::$app->request->get('type'); // получение id Билета из ajax запроса
       
        $session = Yii::$app->session; // если продукты найдены, то открываем сессию
        $session->open();

        $cart = new Cart(); // создаем объект корзины
        $cart->recalculation($id, $type); // и передаем в него id удаляемого продукта

        if ($type == 'mesto') // если id не 0, то активизируем билет
            {
                $product = AfishaMesto::findOne($id); // выборка билета из БД по id
                $product->status = 1;
                $product->save();
                
            }        

        $this->layout = false;
        return $this->render('cart-modal', compact('session')); // передача cсессии в views 

    }    

    /**
     * Функция "показа модального окна Корзины".
     *
     * @return mixed
     */
    public function actionShowcart()
    {
        $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all();

        Yii::$app->params['menu_categories'] = $menu_categories;         

        $session = Yii::$app->session; // если продукты найдены, то открываем сессию
        $session->open();

        $this->layout = false;
        return $this->render('cart-modal', compact('session')); // передача cсессии в views 

    } 

    /**
     * Показ страницы "Оформление заказа".
     *
     * @return mixed
     */
    public function actionCheckout()
    {
        $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all();

        Yii::$app->params['menu_categories'] = $menu_categories;

        $menu_products_slider = Products::find()->where(['id_category' => 47])->asArray()->all(); // выборка всех дисплеев БЛЮД из БД для данной категории

        $products_options_slider = Products_options::find()->where(['size' => 'малая'])->asArray()->all(); // выборка списка всех БЛЮД порция "малая" из БД          

        if ($id = Yii::$app->request->get('id') && $qty = Yii::$app->request->get('quantity'))
            {
                $id = Yii::$app->request->get('id'); // получение id из ajax запроса
                $qty = Yii::$app->request->get('quantity'); // получение quantity из ajax запроса
                $price = Yii::$app->request->get('price'); // получение price из ajax запроса

                $session = Yii::$app->session; // если продукты найдены, то открываем сессию
                $session->open(); //
                $cart = new Cart(); // создаем объект корзины
                $cart->recalculationCheckout($id, $qty, $price); // и передаем в него список продуктов  
                $order = new Orders(); // создаем объект заказа
                
                $this->layout = false;
                return $this->render('checkout', compact('session', 'order', 'menu_products_slider', 'products_options_slider'));
            }
        else
            {
                $session = Yii::$app->session; // если продукты найдены, то открываем сессию
                $session->open();       
                $order = new Orders(); // создаем объект заказа
                if ($order->load(Yii::$app->request->post())) // если форма заказа отправлена, то 
                    {
                        $order->qty = $session['cart.qty']; // добавляем в заказ количество товаров
                        $order->sum = $session['cart.sum']; // добавляем общую сумму товаров корзины
                        if ($order->save()) // если заказ сохранился, то 
                            {
                                $result = $this->saveOrderItems($session['cart'], $order->id);

                                if($result == 0) // сохраняем позиции заказа в таблицу order_items в БД
                                    {
                                        $order->delete();
                                        Yii::$app->session->setFlash('error', 'С позициями заказа что-то не так.');
                                    }
                                else
                                    {
                                        Yii::$app->session->setFlash('success', 'Заказ принят.</br>Админстратор позвонит Вам в ближайшие 7 минут.'); // выводим сообщение в checkout

                                        Yii::$app->mailer->compose('order', compact('session'))
                                            ->setFrom(['si@shop-improver.ru' => 'Ресторан-Онлайн'])
                                            ->setTo($order->email)
                                            ->setSubject('Новый заказ с сайта')
                                            ->send();
                                                                        
                                        $session->remove('cart');       // ощищаем корзину
                                        $session->remove('cart.qty');
                                        $session->remove('cart.sum');
                                        $session->remove('cart.eventtoday');
                                        $session->remove('cart.event.qty');
                                        $session->remove('cart.product.qty');

                                        return $this->refresh(); // обновление страницы
                                    }                            
                            }
                        else
                            {
                                Yii::$app->session->setFlash('error', 'Заказ с ошибкой.');
                            }
                    }

                return $this->render('checkout', compact('session', 'order', 'menu_products_slider', 'products_options_slider'));
            }
    } 

    /**
     * Функция сохранения позиций заказа в БД в таблицу order_items.
     *
     */
    protected function saveOrderItems($items, $order_id)
    {
        $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all();

        Yii::$app->params['menu_categories'] = $menu_categories; 

        $result = 0;
        foreach ($items as $id => $item) {
            
            $order_items = new OrderItems();
            $order_items->order_id = $order_id;
            $order_items->product_id = $id;
            $order_items->name = $item['name'];
            $order_items->price = $item['price'];
            $order_items->qty_item = $item['qty'];
            $order_items->sum_item = $item['qty'] * $item['price'];
            $order_items->img = $item['img'];

            if ($order_items->save()) 
                {
                    $result = 1;
                }
            else
                {
                    $result = 0;
                }
        }

        return $result;
    }

    /**
     * Функция "плюс-минус в Корзине".
     *
     * @return mixed
     */
    public function actionPlusminus()
    {
        $menu_categories = Categories::find()->where(['parent_id' => 1])->asArray()->all();

        Yii::$app->params['menu_categories'] = $menu_categories; 

        $id = Yii::$app->request->get('id'); // получение id из ajax запроса
        $qty = Yii::$app->request->get('quantity'); // получение quantity из ajax запроса
        $price = Yii::$app->request->get('price'); // получение price из ajax запроса

        $session = Yii::$app->session; // если продукты найдены, то открываем сессию
        $session->open(); //
        $cart = new Cart(); // создаем объект корзины
        $cart->recalculationCheckout($id, $qty, $price); // и передаем в него список продуктов 

        $this->layout = false;
        return $this->render('cart-modal', compact('session')); // передача cсессии в views 

    }     
           
}
