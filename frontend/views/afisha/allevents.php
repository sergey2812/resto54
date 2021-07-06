<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use kv4nt\owlcarousel\OwlCarouselWidget;
use yii\captcha\Captcha;

$this->title = 'Афиша Ресторан-Онлайн';

?>

	<section class="ftco-section ftco-cart" style="padding-top: 8em; padding-bottom: 5em;">
		<div class="container">
	        <p class="breadcrumbs"><span class="mr-2">
	        	<a href="/">Главная</a></span>»&nbsp;&nbsp;<span>Афиша</span>
	        </p>
      	<div class="row justify-content-center pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <span class="subheading">Restaurant-Online</span>
            <h1 class="mb-4">Афиша, все мероприятия</h1>
            
            <h2 class="mb-4"></h2>
            <p>Выбирайте, какое из мероприятий Ресторан-Онлайн посетить. А лучше - выбирайте всё...</p>
          </div>
        </div>	        			
			<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>Фото</th>
						        <th>Мероприятие</th>
						        <th>Дата</th>
						        <th></th>
						      </tr>
						    </thead>
						    <tbody>
						    <? foreach ($afisha as $event) : ?>
						      <tr class="text-center">
						        
						        <td class="image-prod">

						        	<a href="<?=Url::toRoute(['afisha/event', 'id' => $event['id'], 'id_category' => $event['id_category']]); ?>">

						        		<div class="img" style="background-image:url(/images/<?=$event['img'];?>)"></div>
						        	</a>
						        </td>
						        
						        <td class="product-name">
						        	<h3><a href="<?=Url::toRoute(['afisha/event', 'id' => $event['id'], 'id_category' => $event['id_category']]); ?>"><?=$event['name'];?></a></h3>
						        	<p><a style="color: #777;" href="<?=Url::toRoute(['afisha/event', 'id' => $event['id'], 'id_category' => $event['id_category']]); ?>"><?=$event['description'];?></a></p>
						        </td>
						        
						        <td class="price"><?php echo date("d-m-Y в H:i", strtotime($event['date_event'])); ?></td>

						        <td class="total">
						        	<div class="mb-4 d-flex align-items-center justify-content-center"><a href="<?=Url::toRoute(['afisha/event', 'id' => $event['id'], 'id_category' => $event['id_category']]); ?>" class="btn btn-primary btn-outline-primary px-4 py-3">Выбрать места</a>
						        	</div>
						        </td>
						    
						      </tr><!-- END TR-->
						     <? endforeach; ?>

						    </tbody>
						  </table>

					  </div>
    			</div>
    		</div>
		</div>
	</section>

    <section class="">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
          	<span class="subheading">Restaurant-Online</span>
            <h2 class="mb-4">Интересные дополнения</h2>
            <p>Чтобы Вам было интересно и вкусно.</p>
          </div>
        </div>
        <div class="row">

            <?php
                OwlCarouselWidget::begin([
                    'container' => 'div',
                    'containerOptions' => [
                        'id' => 'container-id',
                        'class' => 'container-class'
                    ],
                    'pluginOptions'    => [
                        'autoplay'          => true,
                        'autoplayTimeout'   => 6000,
                        'items'             => 3,
                        'loop'              => true,
                        'itemsDesktop'      => [1199, 3],
                        'itemsDesktopSmall' => [979, 3],
                        'autoplayHoverPause' => true,
                        'smartSpeed' => 2500
                    ]
                ]);
            ?>
                <? foreach ($products_options_slider as $product_slider) : ?>
                    <? foreach ($menu_products_slider as $menu_slider) : ?> 
                            <? if ($product_slider['id_products'] == $menu_slider['id']) : ?>    
                            	<div class="item-class">
                            		<div class="menu-entry">
                        					<a href="/images/<?=$menu_slider['img']; ?>" class="image-popup"><img src="/images/<?=$menu_slider['img']; ?>" class="img-fluid" alt="Купить блюдо: <?=$menu_slider['name'];?>"></a>
                        					<div class="text text-center pt-4">
                        						<h3><a href="<?=Url::toRoute(['menu/menu_product', 'id' => $menu_slider['id'], 'id_category' => $menu_slider['id_category']]); ?>"><?=$menu_slider['name'];?></a></h3>
                        						<p><?=$menu_slider['description']; ?></p>
                        						<div class="col text-center">
                                                    <p class="price"><span><?=$product_slider['size'];?></span><span>  <?=$product_slider['price'];?>  р</span></p>
                                                </div>
                        						<input type="hidden" id="quantity_<?= $product_slider['id']; ?>" name="quantity" class="form-control input-number" value="1">
                                                <p><a href="<?=Url::toRoute(['cart/add', 'id' => $product_slider['id']]); ?>" class="btn btn-primary btn-outline-primary add-to-cart" data-id="<?= $product_slider['id']; ?>" data-type="product">Выбрать</a></p>
                        					</div>
                        				</div>
                            	</div>
                            <? endif; ?>
                    <? endforeach; ?>                
                <? endforeach; ?>
            <?php OwlCarouselWidget::end(); ?>            
        </div>
      </div>
    </section>	