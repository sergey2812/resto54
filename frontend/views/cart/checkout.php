<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use kartik\datetime\DateTimePicker;
use kv4nt\owlcarousel\OwlCarouselWidget;
use yii\captcha\Captcha;
use yii\bootstrap4\Modal;
use kartik\icons\FontAwesomeAsset;
use kartik\base\BootstrapInterface;

$this->title = 'Корзина и Оформление заказа Ресторан-Онлайн';

?>

	<section class="ftco-section ftco-cart" style="padding-bottom: 0;">
		<div class="container">
	            <p class="breadcrumbs" style="padding-bottom: 0.5em;"><span class="mr-2">
	                <a href="<?=Url::toRoute(['/']); ?>">Главная</a></span>»&nbsp;&nbsp;<span>Корзина и Оформление заказа</span>
	            </p> 

			<?php if( Yii::$app->session->hasFlash('success') ): ?>
			    <div class="alert alert-success alert-dismissible" role="alert">
			        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <?php echo Yii::$app->session->getFlash('success'); ?>
			    </div>
			<?php endif;?>

			<?php if( Yii::$app->session->hasFlash('error') ): ?>
			    <div class="alert alert-danger alert-dismissible" role="alert">
			        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <?php echo Yii::$app->session->getFlash('error'); ?>
			    </div>
			<?php endif;?>			

      	<div class="row justify-content-center mb-5 pb-3" style="margin-bottom: 1.5rem !important;">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <span class="subheading">Restaurant-Online</span>
            <h1 class="mb-4">Оформление заказа</h1>			
          </div>
        </div>

<?php if(!empty($session['cart'])) : ?>	

			<div id="row-cart-checkout" class="row">
				<div style="text-align: center; padding-bottom: 50px; width: 100%;">Проверьте и подтвердите Ваш заказ
				</div>
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th style="width: 5%;"><span class="icon-close"></span></th>
						        <th style="width: 12%;">Фото</th>
						        <th style="width: 15%;">Продукт</th>
						        <th style="width: 10%;">Цена</th>
						        <th style="width: 20%;">Количество</th>
						        <th style="width: 18%;">Всего</th>
						      </tr>
						    </thead>
						    <tbody>
							<?php foreach ($session['cart'] as $id => $item) : ?>
						      <tr id="table-string_<?= $id; ?>" class="text-center">
						        <td class="product-remove"><a href="#"><span data-id="<?= $id; ?>" class="icon-close del-item" data-type="<?= $item['type']; ?>"></span></a></td>
						        
						        <? if ($item['type'] == 'product') : ?>
						        	<td class="image-prod"><div><?= Html::a(Html::img("@web/images/{$item['img']}", ['alt' => 'Купить блюдо '.$item['name'], 'height' => 90]), ["@web/images/{$item['img']}"], ['class' => 'image-popup']) ?></div></td>
						        <? else : ?>
									<td class="image-prod"><div><?= Html::a(Html::img("@web/images/{$item['img']}", ['alt' => 'Купить билет на '.$item['name'], 'height' => 90]), ["@web/images/{$item['img']}"], ['class' => 'image-popup']) ?></div></td>
						        <? endif; ?>
						        
						        <td class="product-name">
						        	<h3><? if ($item['type'] == 'mesto') : ?><a href="<?=Url::toRoute(['afisha/event', 'id' => $item['id'], 'id_category' => $item['id_category']]); ?>"><?=$item['name'];?></a><? else : ?><a href="<?=Url::toRoute(['menu/menu_product', 'id' => $item['id'], 'id_category' => $item['id_category']]); ?>"><?=$item['name'];?></a><? endif; ?></h3>
						        </td>
						        
						        <td class="price"><?= $item['price']; ?> p.</td>
						        
						        <td class="quantity">

						        	<div class="input-group mb-3" style="margin-bottom: 0 !important; width: 50%; margin-left: 50px;">
						        		<? if ($item['type'] != 'mesto') : ?> 
					                    	<span class="input-group-btn mr-2" style="margin-left: -40px;">
					                        <button type="button" class="quantity-left-minus btn checkout"  data-type="minus" data-field="" data-id="<?= $id; ?>" data-price="<?= $item['price']; ?>">
					                       <i class="icon-minus"></i>
					                        </button>
					                        </span>
					                    <? endif; ?>
					                    <input style="margin-left: 50px;" type="text" id="quantity_<?= $id; ?>" name="quantity" class="form-control input-number" value="<?= $item['qty']; ?>" min="1" max="100" data-id="<?= $id; ?>" data-price="<?= $item['price']; ?>" readonly>
					                    <? if ($item['type'] != 'mesto') : ?> 
					                    	<span class="input-group-btn ml-2">
					                        <button type="button" class="quantity-right-plus btn checkout" data-type="plus" data-field="" data-id="<?= $id; ?>" data-price="<?= $item['price']; ?>">
					                         <i class="icon-plus"></i>
					                     	</button>
					                    	</span>	
					                   	<? endif; ?>				             	 
					          	    </div>

					            </td>

						        <td class="total" id="total_<?= $id; ?>"><?= intval($item['price'])*intval($item['qty']); ?> p.</td>
						      </tr> <!-- END TR-->
							<?php endforeach; ?>
						    </tbody>
						</table>
					</div>
    			</div>
    		</div>
		</div>
	</section>

    <section class="ftco-section empty-checkout" style="padding-top: 5em; padding-bottom: 0;">
      <div class="container">      	
        <div class="row">
          	<div class="col-md-4 sidebar ftco-animate order-md-2">
				<div class="cart-total mb-3">
					<h4>ОБЩАЯ СТОИМОСТЬ</h4>
					<hr>
					<p class="d-flex">
						<span>Наименований</span>
						<span id="cart-total-qty"><?= $session['cart.qty']; ?> шт.</span>
					</p>
					<p class="d-flex">
						<span>Всего</span>
						<span id="cart-total-cost-1"><?= $session['cart.sum']; ?> p.</span>
					</p>
					<p class="d-flex">
						<span>Доставка</span>
						<span>0</span>
					</p>
					<p class="d-flex">
						<span>Скидка</span>
						<span>0</span>
					</p>
					<hr>
					<p class="d-flex total-price">
						<span>к оплате</span>
						<span id="cart-total-cost-2"><?= $session['cart.sum']; ?> p.</span>
					</p>
				</div>
            </div>        	

          <div class="col-md-8 ftco-animate order-md-1">

			<? $form = ActiveForm::begin([
			    'id' => 'checout-form',
			    'options' => ['class' => 'billing-form ftco-bg-dark p-3 p-md-5',
							  'style' => 'margin-left:5px; margin-right:5px;',
					],
			]); ?>
				<h3 class="billing-heading p-md-4">Данные о Заказе</h3>
	          	<div class="row align-items-end">

	          		<div class="col-md-7">
						<?= $form->field($order, 'variant')
							->radioList([
							        '1' => 'Обычное питание в ресторане', ['style'=>'color:red;'], 
							        '2' => 'Самостоятельно заберу заказ',
							        '3' => 'Доставить заказ мне по адресу:',
							    ], ['style'=>'padding-left:0px;']);
						?>
					</div>

					<div class="col-md-6 checkout-adress-field" style="display: none;">
						<?= $form->field($order, 'street')->textInput(['placeholder' => 'Впишите название улицы!']); ?>
					</div>

					<div class="col-md-3 checkout-adress-field" style="display: none;">
						<?= $form->field($order, 'house')->textInput(['placeholder' => '№ дома']); ?>
					</div>

					<div class="col-md-3 checkout-adress-field" style="display: none;">
						<?= $form->field($order, 'kv')->textInput(['placeholder' => '№ квартиры']); ?>
					</div>					

					<div class="col-md-6">
						
						<?= $form->field($order, 'for_time')
							->widget(DateTimePicker::classname(), [
										'name' => 'for_date_time',
    									'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
    									'language' => 'ru',
										'options' => [
											'placeholder' => 'К какому времени? *',
        									'readonly' => true,
        									'data-all-events' => $session['cart.events'],
        									'data-only-food' => $session['cart.event.qty'],
										],
										'pluginOptions' => [
											'autoclose' => true,
											'format' => 'yyyy-mm-dd hh:ii',
											'weekStart' => 1,
											'todayHighlight' => true,
										]
									]); ?>
					</div>		

					<div class="col-md-6">
						<?= $form->field($order, 'name')->textInput(['placeholder' => 'Впишите Ваше имя *']); ?>
					</div>
					<div class="col-md-12">
						<div id="proposal-pay-ticket" class="alert alert-success alert-dismissible" role="alert" style="display: none;">
				    	</div>
					</div>
					<div class="col-md-6">
						<?= $form->field($order, 'phone')
							->widget(\yii\widgets\MaskedInput::className(), 
							['mask' => '+7 (999) 999 99 99'])->textInput(['placeholder' => 'Впишите номер Вашего телефона *']); ?>
					</div>					
	          		
					<div class="col-md-6">
						<?= $form->field($order, 'email')->textInput(['placeholder' => 'Впишите Ваш email-адрес *']); ?>
					</div>
                	
					<div class="col-md-12">
						<?= $form->field($order, 'commenty')->textarea(['rows' => '5', 'placeholder' => 'Дополнительные пожелания к заказу']); ?>
					</div>

	           	</div>

		        <div class="row d-flex">
		          	<div class="col-md-6">
		          		<div class="cart-detail ftco-bg-dark p-md-4">
		          			<h3 class="billing-heading">Способ оплаты<span style="color: red;"> *</span></h3>

								<div class="col-md-12" style="margin-bottom: 3rem;">
									<?= $form->field($order, 'pay_way')
										->radioList([
										        '11' => 'Банковская карта', 
										        '12' => 'Наличными при посещении или курьеру',
										    ], ['style'=>'padding-left:0px;']);
									?>
								</div>

								<?= Html::submitButton('Подтверждаю заказ', ['class' => 'btn btn-primary py-3 px-4', 'name' => 'checkout-button']) ?>
						</div>
			        </div>	          	
			    </div>
	        </form><!-- END -->

		<? ActiveForm::end(); ?>		          
	          </div> <!-- .col-md-8 -->	          
          </div>
        </div>
		<?php else : ?>
			<div id="cart-empty"><h5 style="color: #555; font-size: 14px; text-align: center;">Корзина пуста.</br></br>Выбирайте блюда в меню!</h5></div>
		<?php endif; ?>        
      </div>
    </section> <!-- .section -->


    <section class="ftco-section" style="padding-bottom: 0em;">
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