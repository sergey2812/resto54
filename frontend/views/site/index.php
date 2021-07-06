<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Ресторан-Онлайн | заказ ресторанной еды через интернет.';
?>


    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image: url(/images/bg_1.jpg);">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-8 col-sm-12 text-center ftco-animate">
                <span class="subheading">Restaurant-online</span>
              <h1 class="mb-4">Один из первых</h1>
              <p class="mb-4 mb-md-5">РЕСТОРАН с интернет-сервисом </br> предлагает заказывать приготовление еды к определенному Вами времени! </br> Все блюда и билеты на мероприятия Вы можете заказать до своего визита. </br> Заранее. Через интернет! </p>
              <p><a href="<?=Url::toRoute(['menu/menu', 'id' => 2]); ?>" class="btn btn-primary p-3 px-xl-4 py-xl-3">Заказать сейчас</a> <a href="<?=Url::toRoute(['menu/menu', 'id' => 2]); ?>" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">Смотреть меню</a></p>
            </div>

          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url(/images/bg_2.jpg);">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-8 col-sm-12 text-center ftco-animate">
                <span class="subheading">Restaurant-online</span>
              <h1 class="mb-4">Экономьте </br> до 7,5 часов в неделю!</h1>
              <p class="mb-4 mb-md-5">Навсегда. Исключите из своей жизни ожидание приготовления еды! </br> Это возможно! Стоит только войти в двери ресторана - блюда тут же принесут </br> к Вашему столу!</p>
              <p><a href="<?=Url::toRoute(['menu/menu', 'id' => 2]); ?>" class="btn btn-primary p-3 px-xl-4 py-xl-3">Заказать сейчас</a> <a href="<?=Url::toRoute(['menu/menu', 'id' => 2]); ?>" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">Смотреть меню</a></p>
            </div>

          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url(/images/bg_3.jpg);">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-8 col-sm-12 text-center ftco-animate">
                <span class="subheading">Restaurant-online</span>
              <h1 class="mb-4">Из любого положения</h1>
              <p class="mb-4 mb-md-5">Вы можете с Вашего смартфона делать заказ отовсюду, </br> где есть интернет (дом, работа, трамвай, авто...)! </br> Достаточно указать время Вашего визита нажатием одной кнопки!</p>
              <p><a href="<?=Url::toRoute(['menu/menu', 'id' => 2]); ?>" class="btn btn-primary p-3 px-xl-4 py-xl-3">Заказать сейчас</a> <a href="<?=Url::toRoute(['menu/menu', 'id' => 2]); ?>" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">Смотреть меню</a></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-intro">
        <div class="container-wrap">
            <div class="wrap d-md-flex align-items-xl-end">
                <div class="info">
                    <div class="row no-gutters">
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="icon"><span class="icon-phone"></span></div>
                            <div class="text">
                                <h3>+7 905 955 65 13</h3>
                                <p>Общаемся. </br> Не нарушая традиций.</p>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="icon"><span class="icon-my_location"></span></div>
                            <div class="text">
                                <h3>Улица Объедения, 1</h3>
                                <p>Легко найти </br> Вкусно поесть.</p>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="icon"><span class="icon-clock-o"></span></div>
                            <div class="text">
                                <h3>Работаем ежедневно</h3>
                                <p>Заказывайте онлайн </br> круглосуточно.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="book p-4">
<!--                    <h3><?=$menu_product['name'];?></h3> -->
                      <div class="row">
                        <div class="col">
                          <div class="menu-entry">
                            <a href="/images/<?=$menu_product['img']; ?>" class="image-popup"><img src="/images/<?=$menu_product['img']; ?>" class="img-fluid" alt="Купить блюдо: <?=$menu_product['name'];?>"></a>
                            <div class="text text-center pt-4">
                              <h3><a href="<?=Url::toRoute(['menu/menu_product', 'id' => $menu_product['id'], 'id_category' => $menu_product['id_category']]); ?>"><?=$menu_product['name'];?></a></h3>
                              <p><?=$menu_product['description']; ?></p>
                              
                              <div class="col text-center">
                                <p class="price"><span><?=$products_options['size'];?></span><span>  <?=$products_options['price'];?>  р</span></p>
                              </div>
                              <input type="hidden" id="quantity_<?= $products_options['id']; ?>" name="quantity" class="form-control input-number" value="1">
                              <p><a href="<?=Url::toRoute(['cart/add', 'id' => $products_options['id']]); ?>" class="btn btn-primary btn-outline-primary add-to-cart px-4" data-id="<?= $products_options['id']; ?>" data-type="product" style="border: 1px solid #fff; background: transparent; color: #fff;">Выбрать</a></p>
                                      <style>
                                        .btn.btn-primary.btn-outline-primary.add-to-cart.px-4:hover {
                                          background-color: green !important;
                                        }
                                      </style>                              
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-about d-md-flex">
        <div class="one-half img" style="background-image: url(/images/about.jpg);"></div>
        <div class="one-half ftco-animate">
            <div class="overlap">
                <div class="heading-section ftco-animate ">
                    <span class="subheading">Restaurant-online</span>
                  <h2 class="mb-4">Наша идея</h2>
                </div>
                <div>
                    <p>Не ждите! C нашим сервисом Вы легко можете организовать регулярное питание сотрудников офиса в ресторане или с доставкой еды по адресу! К указанному Вами времени всё будет готово! </br></br> Навсегда. Исключите из своей жизни ожидание приготовления еды! Это возможно! Просто перейдите в меню, и выберите любимое блюдо прямо сейчас! </br></br> За считанные минуты Вы можете сделать заблаговременный заказ еды, имея перед собой ВСЕ необходимые данные! Администратор сразу увидит заказ на мониторе, и позвонит Вам для подтверждения. </br> Стоит только войти в двери ресторана - блюда тут же принесут к Вашему столу! </br></br> Применяйте наш сервис, как калькулятор. Корзина покажет стоимость мероприятия для человека и группы! Вам будет легко обсудить с администратором скидку, имея все расчеты на руках!</p>

            <div class="mb-4 d-flex align-items-center justify-content-center" style="margin-top: 40px;"><a href="<?=Url::toRoute(['menu/menu', 'id' => 2]); ?>" class="btn btn-primary btn-outline-primary px-4 py-3">Перейти в меню прямо сейчас</a></div>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-services">
        <div class="container">
              <div class="row justify-content-center mb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                  <span class="subheading" style="color: white;">Restaurant-online</span>
                  <h2 class="mb-4">Ваши возможности</h2>
                </div>
              </div>          
            <div class="row">
                <div class="col-md-4 ftco-animate">
                  <div class="media d-block text-center block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-5">
                      <span class="flaticon-delivery-truck"></span>
                    </div>
                    <div class="media-body">
                      <h3 class="heading">В ресторане, дома, на работе...</h3>
                      <p>Не ждите! C нашим сервисом Вы легко можете организовать регулярное питание сотрудников офиса в ресторане или с доставкой еды по адресу! К указанному Вами времени всё будет готово!</p>
                    </div>
                  </div>      
                </div>
                <div class="col-md-4 ftco-animate">
                  <div class="media d-block text-center block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-5">
                      <span class="flaticon-coffee-bean"></span></div>
                    <div class="media-body">
                      <h3 class="heading">Здоровое питание</h3>
                      <p>Заказывая у нас приготовление еды через интернет к определенному времени, Вы организуете своё правильное здоровое питание! Просто перейдите в меню, и выберите любимое блюдо прямо сейчас!</p>
                    </div>
                  </div>      
                </div>
                <div class="col-md-4 ftco-animate">
                  <div class="media d-block text-center block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-5">
                      <span class="flaticon-choices"></span></div>

                    <div class="media-body">
                      <h3 class="heading">Полная определённость!</h3>
                      <p>За считанные минуты Вы можете сделать заблаговременный заказ еды, имея перед собой ВСЕ необходимые данные! Администратор сразу увидит заказ на мониторе, и позвонит Вам для подтверждения.</p>
                    </div>
                  </div>    
                </div>
          </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 pr-md-5">
                    <div class="heading-section text-md-right ftco-animate">
                      <span class="subheading">Restaurant-online</span>
                      <h2 class="mb-4">Онлайн-меню</h2>
                      <p class="mb-4">За считанные минуты Вы можете сделать заблаговременный заказ еды, имея перед собой ВСЕ необходимые данные! Администратор сразу увидит заказ на мониторе, и позвонит Вам для подтверждения. </br> К указанному Вами времени всё будет готово! Стоит только войти в двери ресторана - блюда тут же принесут к Вашему столу! </br></br> Применяйте наш сервис, как калькулятор. Корзина покажет стоимость мероприятия для человека или группы! Вам будет легко обсудить с администратором скидку, имея все расчеты на руках!</p>
                      <p><a href="<?=Url::toRoute(['menu/menu', 'id' => 2]); ?>" class="btn btn-primary btn-outline-primary px-4 py-3">Смотреть полное меню</a></p>
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="menu-entry">
                                <div class="menu-wrap">
                                    <a href="/images/<?=$menu_product_bef['img']; ?>" class="image-popup"><img src="/images/<?=$menu_product_bef['img']; ?>" class="img-fluid" alt="Купить блюдо: <?=$menu_product_bef['name'];?>"></a>
                                    <div class="text">
                                        <div class="col text-center" style="padding-top: 20px;">
                                        <h3><a href="<?=Url::toRoute(['menu/menu_product', 'id' => $menu_product_bef['id'], 'id_category' => $menu_product_bef['id_category']]); ?>"><?=$menu_product_bef['name'];?></a></h3>
                                        </div>
                                        <div class="col text-center">
                                        <p><?=$menu_product_bef['description']; ?></p>
                                        </div>
                                        <div class="col text-center">
                                          <p class="price"><span><?=$products_options_bef['size'];?></span><span>  <?=$products_options_bef['price'];?>  р</span></p>
                                        </div>
                                        <input type="hidden" id="quantity_<?= $products_options_bef['id']; ?>" name="quantity" class="form-control input-number" value="1">
                                        <div class="col text-center">
                                        <p><a href="<?=Url::toRoute(['cart/add', 'id' => $products_options_bef['id']]); ?>" class="btn btn-primary btn-outline-primary add-to-cart" data-id="<?= $products_options_bef['id']; ?>" data-type="product">Выбрать</a></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="menu-entry">
                                <div class="menu-wrap">
                                    <a href="/images/<?=$menu_product_vino['img']; ?>" class="image-popup"><img src="/images/<?=$menu_product_vino['img']; ?>" class="img-fluid" alt="Купить блюдо: <?=$menu_product_vino['name'];?>"></a>
                                    <div class="text">
                                        <div class="col text-center" style="padding-top: 20px;">
                                        <h3><a href="<?=Url::toRoute(['menu/menu_product', 'id' => $menu_product_vino['id'], 'id_category' => $menu_product_vino['id_category']]); ?>"><?=$menu_product_vino['name'];?></a></h3>
                                        </div>
                                        <div class="col text-center">
                                        <p><?=$menu_product_vino['description']; ?></p>
                                        </div>
                                        <div class="col text-center">
                                          <p class="price"><span><?=$products_options_vino['size'];?></span><span>  <?=$products_options_vino['price'];?>  р</span></p>
                                        </div>
                                        <input type="hidden" id="quantity_<?= $products_options_vino['id']; ?>" name="quantity" class="form-control input-number" value="1">
                                        <div class="col text-center">
                                        <p><a href="<?=Url::toRoute(['cart/add', 'id' => $products_options_vino['id']]); ?>" class="btn btn-primary btn-outline-primary add-to-cart" data-id="<?= $products_options_vino['id']; ?>" data-type="product">Выбрать</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="menu-entry">
                              <div class="menu-wrap">
                                    <a href="/images/<?=$menu_product_tiramisu['img']; ?>" class="image-popup"><img src="/images/<?=$menu_product_tiramisu['img']; ?>" class="img-fluid" alt="Купить блюдо: <?=$menu_product_tiramisu['name'];?>"></a>
                                    <div class="text">
                                        <div class="col text-center" style="padding-top: 20px;">
                                        <h3><a href="<?=Url::toRoute(['menu/menu_product', 'id' => $menu_product_tiramisu['id'], 'id_category' => $menu_product_tiramisu['id_category']]); ?>"><?=$menu_product_tiramisu['name'];?></a></h3>
                                        </div>
                                        <div class="col text-center">
                                        <p><?=$menu_product_tiramisu['description']; ?></p>
                                        </div>
                                        <div class="col text-center">
                                          <p class="price"><span><?=$products_options_tiramisu['size'];?></span><span>  <?=$products_options_tiramisu['price'];?>  р</span></p>
                                        </div>
                                        <input type="hidden" id="quantity_<?= $products_options_tiramisu['id']; ?>" name="quantity" class="form-control input-number" value="1">
                                        <div class="col text-center">
                                        <p><a href="<?=Url::toRoute(['cart/add', 'id' => $products_options_tiramisu['id']]); ?>" class="btn btn-primary btn-outline-primary add-to-cart" data-id="<?= $products_options_tiramisu['id']; ?>" data-type="product">Выбрать</a></p>
                                        </div>
                                    </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="menu-entry">
                              <div class="menu-wrap">
                                    <a href="/images/<?=$menu_product_kofee['img']; ?>" class="image-popup"><img src="/images/<?=$menu_product_kofee['img']; ?>" class="img-fluid" alt="Купить блюдо: <?=$menu_product_kofee['name'];?>"></a>
                                    <div class="text">
                                        <div class="col text-center" style="padding-top: 20px;">
                                        <h3><a href="<?=Url::toRoute(['menu/menu_product', 'id' => $menu_product_kofee['id'], 'id_category' => $menu_product_kofee['id_category']]); ?>"><?=$menu_product_kofee['name'];?></a></h3>
                                        </div>
                                        <div class="col text-center">
                                        <p><?=$menu_product_kofee['description']; ?></p>
                                        </div>
                                        <div class="col text-center">
                                          <p class="price"><span><?=$products_options_kofee['size'];?></span><span>  <?=$products_options_kofee['price'];?>  р</span></p>
                                        </div>
                                        <input type="hidden" id="quantity_<?= $products_options_kofee['id']; ?>" name="quantity" class="form-control input-number" value="1">
                                        <div class="col text-center">
                                        <p><a href="<?=Url::toRoute(['cart/add', 'id' => $products_options_kofee['id']]); ?>" class="btn btn-primary btn-outline-primary add-to-cart" data-id="<?= $products_options_kofee['id']; ?>" data-type="product">Выбрать</a></p>
                                        </div>
                                    </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>      
    </section>



    <section class="ftco-gallery">
        <div class="container">
              <div class="row justify-content-center mb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                  <span class="subheading">Restaurant-online</span>
                  <h2 class="mb-4">Галерея впечатлений</h2>
                </div>
              </div>           
            <div class="row no-gutters">
                    <div class="col-md-3 ftco-animate">
                        <a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(/images/gallery-1.jpg);">
                            <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-search"></span>
                        </div>
                        </a>
                    </div>
                    <div class="col-md-3 ftco-animate">
                        <a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(/images/gallery-2.jpg);">
                            <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-search"></span>
                        </div>
                        </a>
                    </div>
                    <div class="col-md-3 ftco-animate">
                        <a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(/images/gallery-3.jpg);">
                            <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-search"></span>
                        </div>
                        </a>
                    </div>
                    <div class="col-md-3 ftco-animate">
                        <a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(/images/gallery-4.jpg);">
                            <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-search"></span>
                        </div>
                        </a>
                    </div>
            </div>
        </div>
            <div class="mb-4 d-flex align-items-center justify-content-center" style="margin-top: 40px;"><a href="<?=Url::toRoute(['menu/menu', 'id' => 2]); ?>" class="btn btn-primary btn-outline-primary px-4 py-3">Перейти в меню прямо сейчас</a></div>        
    </section>



    <section class="ftco-section img" id="ftco-testimony" style="background-image: url(/images/bg_1.jpg);"  data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
          <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Restaurant-online</span>
              <h2 class="mb-4">Истории Гостей</h2>
              <p>И каждый Гость индувидуален и неповторим...</p>
            </div>
          </div>
        </div>
        <div class="container-wrap">
          <div class="row d-flex no-gutters">
            <div class="col-lg align-self-sm-end ftco-animate">
              <div class="testimony">
                 <blockquote>
                    <p>&ldquo;Это возможно! Стоит только войти в двери ресторана - блюда тут же принесут к Вашему столу!&rdquo;</p>
                  </blockquote>
                  <div class="author d-flex mt-4">
                    <div class="image mr-3 align-self-center">
                      <img src="/images/person_1.jpg" alt="">
                    </div>
                    <div class="name align-self-center">Чиз Кейк <span class="position">Уважаемый Гость</span></div>
                  </div>
              </div>
            </div>
            <div class="col-lg align-self-sm-end">
              <div class="testimony overlay">
                 <blockquote>
                    <p>&ldquo;С сервисом заказывать заранее через интернет возможно легко организовать себе регулярное питание здоровой едой, как в ресторане, так и с доставкой по адресу! К назначенному времени всё будет уже готово!&rdquo;</p>
                  </blockquote>
                  <div class="author d-flex mt-4">
                    <div class="image mr-3 align-self-center">
                      <img src="/images/person_2.jpg" alt="">
                    </div>
                    <div class="name align-self-center">Беф Строганов <span class="position">Уважаемый Гость</span></div>
                  </div>
              </div>
            </div>
            <div class="col-lg align-self-sm-end ftco-animate">
              <div class="testimony">
                 <blockquote>
                    <p>&ldquo;Вы можете с Вашего смартфона делать заказ отовсюду, где есть интернет (дом, работа, трамвай, авто...)! Достаточно указать время Вашего визита нажатием одной кнопки!&rdquo;</p>
                  </blockquote>
                  <div class="author d-flex mt-4">
                    <div class="image mr-3 align-self-center">
                      <img src="/images/person_3.jpg" alt="">
                    </div>
                    <div class="name align-self-center">Чили Пеппер <span class="position">Уважаемый Гость</span></div>
                  </div>
              </div>
            </div>
            <div class="col-lg align-self-sm-end">
              <div class="testimony overlay">
                 <blockquote>
                    <p>&ldquo;Все блюда и билеты на мероприятия Ресторана Вы можете заказать до своего визита. Заранее. Через интернет!&rdquo;</p>
                  </blockquote>
                  <div class="author d-flex mt-4">
                    <div class="image mr-3 align-self-center">
                      <img src="/images/person_2.jpg" alt="">
                    </div>
                    <div class="name align-self-center">Гриль Стейк <span class="position">Уважаемый Гость</span></div>
                  </div>
              </div>
            </div>
            <div class="col-lg align-self-sm-end ftco-animate">
              <div class="testimony">
                <blockquote>
                  <p>&ldquo;За считанные минуты можно сделать заблаговременный заказ еды, имея перед собой ВСЕ необходимые данные! Администратор сразу увидит заказ на мониторе, и звонит Вам для подтверждения. &rdquo;</p>
                </blockquote>
                <div class="author d-flex mt-4">
                  <div class="image mr-3 align-self-center">
                    <img src="/images/person_3.jpg" alt="">
                  </div>
                  <div class="name align-self-center">Вайт Чоколате <span class="position">Уважаемый Гость</span></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

            <div class="mb-4 d-flex align-items-center justify-content-center" style="margin-top: 40px;"><a href="<?=Url::toRoute(['menu/menu', 'id' => 2]); ?>" class="btn btn-primary btn-outline-primary px-4 py-3">Перейти в меню прямо сейчас</a></div>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <span class="subheading">Restaurant-online</span>
            <h2 class="mb-4">Новости, Акции...</h2>
            <p>Чтобы Вам было интересно и вкусно...</p>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('/images/image_1.jpg');">
              </a>
              <div class="text py-4 d-block">
                <div class="meta">
                  <div><a href="#"><?php echo date("d-m-Y", mktime(0, 0, 0, date('m'), date('d') - 1, date('Y')));?></a></div>
                  <div><a href="#">Admin</a></div>
                  
                </div>
                <h3 class="heading mt-2"><a href="#">Всегда!</a></h3>
                <p>Всегда при онлайн-заказах скидка 15%</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('/images/image_2.jpg');">
              </a>
              <div class="text py-4 d-block">
                <div class="meta">
                  <div><a href="#"><?php echo date("d-m-Y", mktime(0, 0, 0, date('m'), date('d') - 2, date('Y')));?></a></div>
                  <div><a href="#">Admin</a></div>
                  
                </div>
                <h3 class="heading mt-2"><a href="#">Каждый четвертый!</a></h3>
                <p>Каждый четвертый онлайн-заказ в будние дни со скидкой 50%</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('/images/image_3.jpg');">
              </a>
              <div class="text py-4 d-block">
                <div class="meta">
                  <div><a href="#"><?php echo date("d-m-Y", mktime(0, 0, 0, date('m'), date('d') - 3, date('Y')));?></a></div>
                  <div><a href="#">Admin</a></div>
                  
                </div>
                <h3 class="heading mt-2"><a href="#">Внимание, дети!</a></h3>
                <p>При онлайн-заказе детских блюд скидка 30%</p>
              </div>
            </div>
          </div>
        </div>
      </div>
            <div class="mb-4 d-flex align-items-center justify-content-center" style="margin-top: 40px;"><a href="<?=Url::toRoute(['menu/menu', 'id' => 2]); ?>" class="btn btn-primary btn-outline-primary px-4 py-3">Перейти в меню прямо сейчас</a></div>      
    </section>

