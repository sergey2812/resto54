<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use kv4nt\owlcarousel\OwlCarouselWidget;
use yii\captcha\Captcha;

$this->title = 'Карточка мероприятия: '.$afisha_event['name'];

?>

    <section class="ftco-section">
        <div class="container">
                
                    <p class="breadcrumbs"><span class="mr-2"><a href="/">Главная</a></span>»&nbsp;&nbsp;<span class="mr-2"><a href="<?=Url::toRoute(['afisha/allevents']); ?>"><?=$subcategory['name'];?></a></span></span>»&nbsp;&nbsp;<span><?=$afisha_event['name'];?></span></p>

                    <div class="row justify-content-center pb-3">
                      <div class="col-md-7 heading-section ftco-animate text-center">
                        <span class="subheading">Restaurant-Online</span>
                        <h1 class="mb-4"><?=$afisha_event['name'];?></h1>
                        
                        <h4 class="mb-"><p class="price"><span>Начало:&nbsp;&nbsp;<?= date("d-m-Y в H:i", strtotime($afisha_event['date_event'])); ?> часов</span></p></h4>
                        <p><?=$afisha_event['description']; ?></p>
                      </div>
                    </div>                      
            
            <div class="row">
                <div class="col-lg-4 mb-5 ftco-animate mt-3">
                    <a href="/images/<?=$afisha_event['img']; ?>" class="image-popup"><img src="/images/<?=$afisha_event['img']; ?>" class="img-fluid" alt="Купить билеты на <?=$afisha_event['name'];?>"></a>
                </div>
                <div class="col-sm-8 product-details pl-md-5 ftco-animate">               
                
                    <div class="row">
                        
                        <div class="col-lg text-center" style="padding-top: 0.7em;">
                            <? foreach ($afisha_stol as $stol) : ?>
                                <? if ($stol['persons_number'] == 2) : ?>
                                    <div class="row">
                                        <p style="text-align: center; width: 100%; margin-bottom: 5px;">Стол № <?= $stol['stol_number']; ?></p>
                                        <div class="col text-center" style="display: block ruby;">
                                        <? foreach ($afisha_mesto as $mesto) : ?>
                                            <? if ($mesto['stol_number'] == $stol['id'] && $mesto['mesto'] == 1) : ?>
                                                <div>
                                                    <p style="margin-bottom: 0;">Место № <?= $mesto['mesto']; ?></p>
                                                    <p style="margin-bottom: 0; margin-top: -10px;"><?= $mesto['price']; ?> p.</p>
                                                    <input type="hidden" id="quantity_<?= $mesto['id']; ?>" name="quantity" class="form-control input-number" value="1">
                                                    <p id="ticket_<?= $mesto['id']; ?>" style="max-width: 30%;"><a <? if ($mesto['status'] == 0) : ?>style="pointer-events: none; opacity: 0.8; background-color: #ddd;"<? endif; ?> href="<? if ($mesto['status'] == 1) : ?><?=Url::toRoute(['cart/add', 'id' => $mesto['id']]); ?><? else : ?>#<? endif; ?>" class="btn btn-primary btn-outline-primary<? if ($mesto['status'] == 1) : ?> add-to-cart<? endif; ?>" data-id="<?= $mesto['id']; ?>" data-type="mesto"><? if ($mesto['status'] == 1) : ?>Выбрать<? else : ?>Куплено<? endif; ?></a></p>
                                                </div>
                                            <? endif; ?>
                                        <? endforeach; ?>
                                                <img style="max-width: 30%;" src="/images/afisha/stol-2.jpg" class="img-fluid" alt="Купить билеты на <?=$afisha_event['name'];?>">
                                        <? foreach ($afisha_mesto as $mesto) : ?>
                                            <? if ($mesto['stol_number'] == $stol['id'] && $mesto['mesto'] == 2) : ?>                                            
                                                <div>
                                                    <p style="margin-bottom: 0;">Место № <?= $mesto['mesto']; ?></p>
                                                    <p style="margin-bottom: 0; margin-top: -10px;"><?= $mesto['price']; ?> p.</p>
                                                    <input type="hidden" id="quantity_<?= $mesto['id']; ?>" name="quantity" class="form-control input-number" value="1">
                                                    <p id="ticket_<?= $mesto['id']; ?>" style="max-width: 30%;"><a <? if ($mesto['status'] == 0) : ?>style="pointer-events: none; opacity: 0.8; background-color: #ddd;"<? endif; ?> href="<? if ($mesto['status'] == 1) : ?><?=Url::toRoute(['cart/add', 'id' => $mesto['id']]); ?><? else : ?>#<? endif; ?>" class="btn btn-primary btn-outline-primary<? if ($mesto['status'] == 1) : ?> add-to-cart<? endif; ?>" data-id="<?= $mesto['id']; ?>" data-type="mesto"><? if ($mesto['status'] == 1) : ?>Выбрать<? else : ?>Куплено<? endif; ?></a></p>
                                                </div>
                                            <? endif; ?>
                                        <? endforeach; ?>                                            
                                        </div>
                                    </div>
                                <? endif; ?>
                            <? endforeach; ?>
                        </div>
                                                                    

                        <div class="col-lg text-center" style="padding-top: 0.7em;">
                            <? foreach ($afisha_stol as $stol) : ?>
                                <? if ($stol['persons_number'] == 4) : ?>                            
                                    <div class="row">
                                        <p style="text-align: center; width: 100%; margin-bottom: 0;">Стол № <?= $stol['stol_number']; ?></p>
                                        <div class="col text-center" style="display: block ruby;">
                                            <div style="vertical-align: middle; padding-top: 15px;">
                                                <? foreach ($afisha_mesto as $mesto) : ?>
                                                    <? if ($mesto['stol_number'] == $stol['id'] && $mesto['mesto'] == 1) : ?>               
                                                        <div>
                                                            <p style="margin-bottom: 0;">Место № <?= $mesto['mesto']; ?></p>
                                                            <p style="margin-bottom: 0; margin-top: -10px;"><?= $mesto['price']; ?> p.</p>
                                                            <input type="hidden" id="quantity_<?= $mesto['id']; ?>" name="quantity" class="form-control input-number" value="1">
                                                            <p id="ticket_<?= $mesto['id']; ?>" style="max-width: 30%;"><a <? if ($mesto['status'] == 0) : ?>style="pointer-events: none; opacity: 0.8; background-color: #ddd;"<? endif; ?> href="<? if ($mesto['status'] == 1) : ?><?=Url::toRoute(['cart/add', 'id' => $mesto['id']]); ?><? else : ?>#<? endif; ?>" class="btn btn-primary btn-outline-primary<? if ($mesto['status'] == 1) : ?> add-to-cart<? endif; ?>" data-id="<?= $mesto['id']; ?>" data-type="mesto"><? if ($mesto['status'] == 1) : ?>Выбрать<? else : ?>Куплено<? endif; ?></a></p>
                                                        </div>
                                                    <? endif; ?>
                                                <? endforeach; ?>
                                                <? foreach ($afisha_mesto as $mesto) : ?>
                                                    <? if ($mesto['stol_number'] == $stol['id'] && $mesto['mesto'] == 3) : ?>          
                                                        <div>
                                                            <p style="margin-bottom: 0;">Место № <?= $mesto['mesto']; ?></p>
                                                            <p style="margin-bottom: 0; margin-top: -10px;"><?= $mesto['price']; ?> p.</p>
                                                            <input type="hidden" id="quantity_<?= $mesto['id']; ?>" name="quantity" class="form-control input-number" value="1">
                                                            <p id="ticket_<?= $mesto['id']; ?>" style="max-width: 30%;"><a <? if ($mesto['status'] == 0) : ?>style="pointer-events: none; opacity: 0.8; background-color: #ddd;"<? endif; ?> href="<? if ($mesto['status'] == 1) : ?><?=Url::toRoute(['cart/add', 'id' => $mesto['id']]); ?><? else : ?>#<? endif; ?>" class="btn btn-primary btn-outline-primary<? if ($mesto['status'] == 1) : ?> add-to-cart<? endif; ?>" data-id="<?= $mesto['id']; ?>" data-type="mesto"><? if ($mesto['status'] == 1) : ?>Выбрать<? else : ?>Куплено<? endif; ?></a></p>
                                                        </div>
                                                    <? endif; ?>
                                                <? endforeach; ?>                                 
                                                </div>
                                        
                                            <img style="max-width: 30%;" src="/images/afisha/stol-4.jpg" class="img-fluid" alt="Купить билеты на <?=$afisha_event['name'];?>">
                                        
                                            <div style="vertical-align: middle; padding-top: 15px;">
                                                <? foreach ($afisha_mesto as $mesto) : ?>
                                                    <? if ($mesto['stol_number'] == $stol['id'] && $mesto['mesto'] == 2) : ?>               
                                                        <div>
                                                            <p style="margin-bottom: 0;">Место № <?= $mesto['mesto']; ?></p>
                                                            <p style="margin-bottom: 0; margin-top: -10px;"><?= $mesto['price']; ?> p.</p>
                                                            <input type="hidden" id="quantity_<?= $mesto['id']; ?>" name="quantity" class="form-control input-number" value="1">
                                                            <p id="ticket_<?= $mesto['id']; ?>" style="max-width: 30%;"><a <? if ($mesto['status'] == 0) : ?>style="pointer-events: none; opacity: 0.8; background-color: #ddd;"<? endif; ?> href="<? if ($mesto['status'] == 1) : ?><?=Url::toRoute(['cart/add', 'id' => $mesto['id']]); ?><? else : ?>#<? endif; ?>" class="btn btn-primary btn-outline-primary<? if ($mesto['status'] == 1) : ?> add-to-cart<? endif; ?>" data-id="<?= $mesto['id']; ?>" data-type="mesto"><? if ($mesto['status'] == 1) : ?>Выбрать<? else : ?>Куплено<? endif; ?></a></p>
                                                        </div>
                                                    <? endif; ?>
                                                <? endforeach; ?>
                                                <? foreach ($afisha_mesto as $mesto) : ?>
                                                    <? if ($mesto['stol_number'] == $stol['id'] && $mesto['mesto'] == 4) : ?>                        
                                                        <div>
                                                            <p style="margin-bottom: 0;">Место № <?= $mesto['mesto']; ?></p>
                                                            <p style="margin-bottom: 0; margin-top: -10px;"><?= $mesto['price']; ?> p.</p>
                                                            <input type="hidden" id="quantity_<?= $mesto['id']; ?>" name="quantity" class="form-control input-number" value="1">
                                                            <p id="ticket_<?= $mesto['id']; ?>" style="max-width: 30%;"><a <? if ($mesto['status'] == 0) : ?>style="pointer-events: none; opacity: 0.8; background-color: #ddd;"<? endif; ?> href="<? if ($mesto['status'] == 1) : ?><?=Url::toRoute(['cart/add', 'id' => $mesto['id']]); ?><? else : ?>#<? endif; ?>" class="btn btn-primary btn-outline-primary<? if ($mesto['status'] == 1) : ?> add-to-cart<? endif; ?>" data-id="<?= $mesto['id']; ?>" data-type="mesto"><? if ($mesto['status'] == 1) : ?>Выбрать<? else : ?>Куплено<? endif; ?></a></p>
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

   