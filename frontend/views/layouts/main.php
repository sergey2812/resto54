<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use yii\bootstrap4\Modal;
use kv4nt\owlcarousel\OwlCarouselWidget;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use kartik\icons\FontAwesomeAsset;
use kartik\base\BootstrapInterface;
use yii\base\Model;
use common\models\User;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?= Html::csrfMetaTags() ?>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    
    
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">           
          <a class="navbar-brand" href="/">Ресторан<small>онлайн</small></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> МЕНЮ
          </button>
          <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active"><a href="<?=Url::toRoute(['/']); ?>" class="nav-link">Главная</a></li>
   
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Меню</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown04">
                  
                    <? foreach (Yii::$app->params['menu_categories'] as $menu_category) : ?>

                      <a class="dropdown-item" href="<?=Url::toRoute(['menu/menu', 'id' => $menu_category['id']]); ?>"><?=$menu_category['name'];?></a>
                         
                    <? endforeach; ?>

                  </div>       
              </li> 
              <li class="nav-item"><a href="<?=Url::toRoute(['afisha/allevents']); ?>" class="nav-link">Афиша</a></li>            
              <li class="nav-item"><a href="<?=Url::toRoute(['blog/news']); ?>" class="nav-link">Новости</a></li>
              <li class="nav-item"><a href="<?=Url::toRoute(['site/contact']); ?>" class="nav-link">Контакты</a></li>

              <li class="nav-item cart"><a href="#" class="nav-link get-cart"><span class="icon icon-shopping_cart"></span><span class="bag d-flex justify-content-center align-items-center"><small id="small-icon-cart"><? if(!empty($_SESSION['cart.qty'])) : ?><?=$_SESSION['cart.qty'];?><? else : ?>0<? endif; ?></small></span></a></li> 
<!--
              <? if (Yii::$app->user->isGuest) : ?>

                <li class="nav-item"><a href="<?=Url::toRoute(['site/signup']); ?>" class="nav-link">Signup</a></li>
                <li class="nav-item"><a href="<?=Url::toRoute(['site/login']); ?>" class="nav-link">Login</a></li>
              
              <? else : ?>

                <li class="nav-item">
                  <?=  Html::beginForm(['/site/logout'], 'post', ['class' => 'ftco-navbar']); ?>
                  <?=  Html::submitButton(
                          'Logout (' . Yii::$app->user->identity->username . ')',
                          ['class' => 'btn logout nav-link', 'style' => 'margin-top:17px;'],
                      ); ?>
                  <?=  Html::endForm(); ?>
                  
                </li>

              <? endif; ?>
-->
            </ul>
          </div>
          </div>
      </nav> 
    <!-- END nav -->
      
        <?= $content ?>


    <footer class="ftco-footer ftco-section img">
        <div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Присоединяйтесь</h2>
              <p>В социальных сетях есть наши фан-клубы.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-vk"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Акции Ресторан-Онлайн</h2>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(/images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Всегда при онлайн-заказах скидка 15%</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar">&nbsp;</span><?php echo date("d-m-Y", mktime(0, 0, 0, date('m'), date('d') - 2, date('Y')));?></a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(/images/image_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Каждый четвертый онлайн-заказ в будние дни со скидкой 50%</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar">&nbsp;</span><?php echo date("d-m-Y", mktime(0, 0, 0, date('m'), date('d') - 5, date('Y')));?></a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-6 mb-5 mb-md-5">
             <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Службы</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Кухня</a></li>
                <li><a href="#" class="py-2 d-block">Доставка</a></li>
                <li><a href="#" class="py-2 d-block">Качество</a></li>
                <li><a href="#" class="py-2 d-block">Администратор</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">Есть вопросы?</h2>
                <div class="block-23 mb-3">
                  <ul>
                    <li><span class="icon icon-map-marker"></span><span class="text">улица Объедения, 1</span></li>
                    <li><a href="#"><span class="icon icon-phone"></span><span class="text">+7 905 955 65 13</span></a></li>
                    <li><a href="#"><span class="icon icon-envelope"></span><span class="text">internet-restoran@rambler.ru</span></a></li>
                  </ul>
                </div>
            </div>
          </div>
        </div>

            <div class="mb-4 d-flex align-items-center justify-content-center" style="margin-top: -40px;"><a href="<?=Url::toRoute(['menu/menu', 'id' => 2]); ?>" class="btn btn-primary btn-outline-primary px-4 py-3">Перейти в меню прямо сейчас</a></div>

        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> Все права защищены | Ресурс разработан <i class="icon-heart" aria-hidden="true"></i> <a href="https://shop-improver.ru" target="_blank"> shop-improver</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
 

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<?php $this->endBody() ?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>

    <?php 
       
          Modal::begin([
            'size' => 'modal-lg',
            'id' => 'cart',
            'clientOptions' => ['backdrop' => 'static', 'keyboard' => true] ,
            'footer' => '<button type="button" class="btn btn-success btn-md" data-dismiss="modal">Продолжить покупки</button><a href="'.Url::toRoute(['cart/checkout']).'" type="button" class="btn btn-secondary btn-md">Оформить заказ</a><button type="button" class="btn btn-danger btn-md clear-cart">Очистить корзину</button>'
          ]);
          Modal::end();
         
    ?>      

</body>
</html>
<?php $this->endPage() ?>

