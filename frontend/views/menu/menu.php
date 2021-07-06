<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;

foreach ($menu_categories as $menu_category)
{
	if ($menu_category['id'] == $_GET['id'])
		{
			$this->title = $menu_category['name'].' Ресторан-Онлайн';
		}
}
						
?>

    <section class="ftco-menu">
    	<div class="container">
			<? foreach ($menu_categories as $menu_category) : ?>
				<? if ($menu_category['id'] == $_GET['id']) : ?>
				
					<p class="breadcrumbs"><span class="mr-2"><a href="/">Главная</a></span>»&nbsp;&nbsp;<span><?=$menu_category['name'];?></span></p>

			      	<div class="row justify-content-center mb-5 pb-3" style="margin-top: 5em;">
			          <div class="col-md-7 heading-section ftco-animate text-center">
			            <span class="subheading">Restaurant-Online</span>
			            <h1 class="mb-4"><?=$menu_category['name'];?></h1>
			            
			            <h2 class="mb-4"></h2>
			            <p>Выбирайте Ваши любимые блюда</p>
			          </div>
			        </div>						

				<? endif; ?>
        	<? endforeach; ?>    		
    		<div class="row d-md-flex" style="margin-top: -3em;">
	    		<div class="col-lg-12 ftco-animate p-md-5">
		    		
		    		<div class="row">
				        <div class="col-md-12 nav-link-wrap mb-5">
				           <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					        <? $i = 0; ?>
							<? foreach ($menu_subcategories as $menu_subcategory) : ?>
					           
							    <a class="nav-link" id="v-pills-<?= $i; ?>-tab" data-toggle="pill" href="#v-pills-<?= $i; ?>" role="tab" aria-controls="v-pills-<?= $i; ?>" aria-selected="<? if ($i == 0) : ?>true<? else :?>false<? endif; ?>"><?=$menu_subcategory['name'];?></a>

							<? $i++; ?>
				        	<? endforeach; ?>
				            </div>
				        </div>

		          		<div class="col-md-12 d-flex align-items-center">
				            <div class="col-md-12 tab-content ftco-animate" id="v-pills-tabContent">

						<? $j = 0; ?>
						<? foreach ($menu_subcategories as $menu_subcategory) : ?>

				            <div class="tab-pane fade" id="v-pills-<?= $j; ?>" role="tabpanel" aria-labelledby="v-pills-<?= $j; ?>-tab">
				              <div class="row">
				                <? foreach ($menu_products as $menu_product) : ?> 
				                <? if ($menu_product['id_category'] == $menu_subcategory['id']) : ?>
				              		<div class="col-md-6 col-lg-4 text-center">
				              			<div class="menu-wrap">
				              				<a href="<?=Url::toRoute(['menu/menu_product', 'id' => $menu_product['id'], 'id_category' => $menu_subcategory['id']]); ?>" class="menu-img img mb-4" style="background-image: url(/images/<?=$menu_product['img'];?>);"></a>
				              				<div class="text">
				              					<h3><a href="<?=Url::toRoute(['menu/menu_product', 'id' => $menu_product['id'], 'id_category' => $menu_subcategory['id']]); ?>"><?=$menu_product['name'];?></a></h3>
				              					<p><?=$menu_product['description'];?></p>


								                <? foreach ($products_options as $product_options) : ?> 
								                <? if ($product_options['id_products'] == $menu_product['id']) : ?>
						              				<div class="row">
						              					<div class="col text-center">
						              						<p class="price"><span><?=$product_options['size'];?></span></p>
						              					</div>
						              					<div class="col text-center">
						              						<p class="price"><span><?=$product_options['price'];?> р</span></p>
						              					</div>
						              					<input type="hidden" id="quantity_<?= $product_options['id']; ?>" name="quantity" class="form-control input-number" value="1">
							              				<div class="col text-center">
							              					<p><a href="<?=Url::toRoute(['cart/add', 'id' => $product_options['id']]); ?>" class="btn btn-primary btn-outline-primary add-to-cart" data-id="<?= $product_options['id']; ?>" data-type="product">Выбрать</a></p>
							              				</div>
						              				</div>						              				
								              	<? endif; ?>
								              	<? endforeach; ?>					              	

				              				</div>
				              			</div>
				              		</div>
				              	<? endif; ?>
				              	<? endforeach; ?>	
				              </div>
				            </div>

		              	<? $j++; ?>
				       	<? endforeach; ?>				              
		              		</div>
		              	</div>
		            </div>

		          </div>
		        </div>
		      </div>
		    </div>
    	</div>
    </section>