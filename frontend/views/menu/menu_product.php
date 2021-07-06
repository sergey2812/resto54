<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use kv4nt\owlcarousel\OwlCarouselWidget;
use yii\captcha\Captcha;

$this->title = 'Карточка блюда: '.$menu_product['name'];

?>

    <section class="ftco-section" style="padding-top: 8em; padding-bottom: 5em;">
    	<div class="container">
                
                    <p class="breadcrumbs"><span class="mr-2"><a href="/">Главная</a></span>»&nbsp;&nbsp;<span class="mr-2"><a href="<?=Url::toRoute(['menu/menu', 'id' => $menu_subcategory['parent_id']]); ?>"><?=$menu_subcategory['name'];?></a></span></span>»&nbsp;&nbsp;<span><?=$menu_product['name'];?></span></p>

                    <div class="row justify-content-center mb-5 pb-3" style="margin-top: 5em;">
                      <div class="col-md-7 heading-section ftco-animate text-center">
                        <span class="subheading">Restaurant-Online</span>
                        <h1 class="mb-4"><?=$menu_product['name'];?></h1>
                        
                        <h2 class="mb-4"></h2>
                        <p><?=$menu_product['description']; ?></p>
                      </div>
                    </div>                      
            
    		<div class="row">
    			<div class="col-lg-4 mb-5 ftco-animate">
    				<a href="/images/<?=$menu_product['img']; ?>" class="image-popup"><img src="/images/<?=$menu_product['img']; ?>" class="img-fluid" alt="Купить блюдо: <?=$menu_product['name'];?>"></a>
    			</div>
    			<div class="col-lg-8 product-details pl-md-5 ftco-animate">

                    <? foreach ($products_options as $product_options) : ?> 
                        
        				<form>
                            <div class="row">
                                <div class="col text-center">
                                    <p class="price"><span><?=$product_options['size'];?></span></p></div>
                                <div class="col text-center">
                                    <p class="price"><span><?=$product_options['price'];?> р</span></p></div> 

                				<div class="input-group col-md-4 d-flex mb-3">
                	             	<span class="input-group-btn mr-2">
                	                	<button type="button" class="quantity-left-minus btn product"  data-type="minus" data-field="" data-id="<?= $product_options['id']; ?>" data-price="<?= $product_options['price']; ?>">
                	                   <i class="icon-minus"></i>
                	                	</button>
                	            		</span>

                	             	<input type="text" id="quantity_<?= $product_options['id']; ?>" name="quantity" class="form-control input-number" value="1" min="1" max="1000" data-id="<?= $product_options['id']; ?>" data-price="<?= $product_options['price']; ?>" readonly>

                	             	<span class="input-group-btn ml-2">
                	                	<button type="button" class="quantity-right-plus btn product" data-type="plus" data-field="" data-id="<?= $product_options['id']; ?>" data-price="<?= $product_options['price']; ?>">
                	                     <i class="icon-plus"></i>
                	                 </button>
                	             	</span>
                	          	</div>

                                <div class="col text-center" style="padding-top: 0.7em;">
                                    <p><a href="<?=Url::toRoute(['cart/add', 'id' => $product_options['id']]); ?>" class="btn btn-primary btn-outline-primary add-to-cart" data-id="<?= $product_options['id']; ?>" data-type="product">Выбрать</a></p>
                                </div> 
                  	        </div>
                        </form> 
                    
                    <? endforeach; ?>
  
                           	
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

   