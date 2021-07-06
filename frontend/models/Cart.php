<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Модель для обработки данных в Корзине.
 */
class Cart extends ActiveRecord
{
    public function addToCart($product, $qty = 1, $type, $event, $stol, $current_events) // получаем из контроллера объект с продуктом
    {  	
    	if ($type == 'mesto')
    		{
				/**
				 * $product - это место из таблицы events_mesto
				 * $qty - это количество мест, за один клик всегда 1
				 * $type - это тип проадукта: mesto, значит билет на мероприятие
				 * $event - это само мероприятие, на которое куплен билет из таблицы events_products
				 * $stol - это стол из таблицы events_stol
				 * $current_event - это мероприятие сегодняшнего дня
				 */      			
    			if ($product->status == 1)
    				{
		    			$begin = date("d-m-Y в H:i часов", strtotime($event['date_event']));
				        	$_SESSION['cart'][$product->id] = [ // если нет такого товара в корзине, то добавляем его
				        		'qty' => $qty,
				        		'name' => $event->name.'</br>Начало '.$begin.'</br>Стол № '.$stol->stol_number.' Место № '.$product->mesto,
				        		'img' => $event->img,
				        		'price' => $product->price,
				        		'type' => $type,
				        		'date_event' => $event['date_event'],
				        		'id_category' => $event->id_category,
				        		'id' => $event->id,
				        	];
				        $product->status = 0;
                		$product->save();
				        
				        // считаем общее количество товаров в корзине
				        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
				        // считаем общую сумму корзины
				        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty*$product->price : $qty*$product->price; 
				        // помещаем в корзину объект с данными ОДНОГО мероприятия
				        $_SESSION['cart.events'] = $current_events;  
				        // индикатор, что в корзину помещено именно МЕРОПРИЯТИЕ
		        		$_SESSION['cart.event.qty'] = isset($_SESSION['cart.event.qty']) ? $_SESSION['cart.event.qty'] + 1 : $qty;             			
		        	}	        		
    		}

    	if ($type == 'product')
    		{
				/**
				 * $product - это блюдо из таблицы products_haracteristics
				 * $qty - это количество блюд за один клик
				 * $type - тип продукта: product, значит блюдо
				 * $event - это дисплей блюда
				 * $stol - для блюд ничего не значит
				 * $current_event - это мероприятие сегодняшнего дня, если оно существует,
				 * дата его нужна для логики вычисления пересечения времени питания и времени 
				 * мероприятия
				 */     			
		        if (isset($_SESSION['cart'][$product->id])) 
			        {
			        	$_SESSION['cart'][$product->id]['qty'] += $qty; // если продукт с таким id существует, то считаем количество таких товаров в корзине
			        	// индикатор, что в корзину помещено именно блюдо
		        		$_SESSION['cart.product.qty'] += $qty;
			        } 
		        else 
			        {

			        	$_SESSION['cart'][$product->id] = [ // если нет такого товара в корзине, то добавляем его
			        		'qty' => $qty,
			        		'name' => $event->name.' ('.$product->size.')',
			        		'img' => $event->img,
			        		'price' => $product->price,
			        		'type' => $type,
			        		'date_event' => null,
			        		'id_category' => $event->id_category,
			        		'id' => $event->id,
			        	];
			        }

		        // считаем общее количество товаров в корзине
		        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
		        // считаем общую сумму корзины
		        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty*$product->price : $qty*$product->price;	
		        // помещаем в корзину объект с мероприятием
		        $_SESSION['cart.events'] = $current_events; 
		      	// индикатор, что в корзину помещено именно блюдо
		        $_SESSION['cart.product.qty'] = isset($_SESSION['cart.product.qty']) ? $_SESSION['cart.product.qty'] + $qty : $qty;		        	        	        		
    		}

    }

    public function recalculation($id, $type) // получаем из контроллера id продукта, удаляемого из корзины, и id билета
    {
        if (!isset($_SESSION['cart'][$id])) return false; // если такого id нет, то останов программы

        $qtyminus = $_SESSION['cart'][$id]['qty']; // определяем количество удаляемых товаров из корзины

        $summinus = $_SESSION['cart'][$id]['qty']*$_SESSION['cart'][$id]['price']; // определяем количество денег, вычитаемых из общей суммы корзины при удалении товаров

        // уменьшаем общее количество товаров в корзине
        $_SESSION['cart.qty'] -= $qtyminus;
        // уменьшаем общую сумму корзины
        $_SESSION['cart.sum'] -= $summinus;

        if ($type == 'mesto')
    		{
    			// индикатор,  уменьшаем общее количество БИЛЕТОВ
		        $_SESSION['cart.event.qty'] -= $qtyminus; 
    		}

        if ($type == 'product')
    		{
    			// индикатор,  уменьшаем общее количество БЛЮД
		        $_SESSION['cart.product.qty'] -= $qtyminus; 		        
    		}    		

        unset($_SESSION['cart'][$id]);       

    }

    public function recalculationCheckout($id, $qty, $price) // получаем из контроллера id продукта, удаляемого из корзины
    {
        if (!isset($_SESSION['cart'][$id])) return false; // если такого id нет, то останов программы

        // считаем общее количество товаров в корзине
        $_SESSION['cart.qty'] -= $_SESSION['cart'][$id]['qty'];
        $_SESSION['cart.qty'] += $qty;

        // в индикатор блюд пишем общее количество именно БЛЮД в корзине
        $_SESSION['cart.product.qty'] -= $_SESSION['cart'][$id]['qty'];
        $_SESSION['cart.product.qty'] += $qty; 

        // считаем общую сумму корзины
        $_SESSION['cart.sum'] -= $_SESSION['cart'][$id]['qty']*$price;
        $_SESSION['cart.sum'] += $qty*$price;

        $_SESSION['cart'][$id]['qty'] = $qty; // если продукт с таким id существует, то считаем количество таких товаров в корзине             
    }    

}
