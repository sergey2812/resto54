<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Контакты Ресторан-Онлайн';

?>

    <section class="ftco-section contact-section">
      <div class="container">
              <p class="breadcrumbs" style="padding-bottom: 0.5em;"><span class="mr-2">
                  <a href="/">Главная</a></span>»&nbsp;&nbsp;<span>Контакты</span>
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
                                  
      <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <span class="subheading">Restaurant-Online</span>
            <h1 class="mb-4">Контакты</h1>
            
            <h2 class="mb-4"></h2>
            <p>Приезжайте. Звоните.</p>
            <p>Пишите в Ресторан-Онлайн, воспользовавшись обычной почтой или нашей формой</p>
          </div>
        </div>        
        <div class="row block-9">
					<div class="col-md-4 contact-info ftco-animate">
						<div class="row">
							<div class="col-md-12 mb-4">
	              <h2 class="h4">Информация о контактах</h2>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Адрес:</span> улица Объедения, 1</p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Телефон:</span> <a href="tel://1234567920">+ 7 905 955 65 13</a></p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Email:</span> <a href="mailto:info@yoursite.com">internet-restoran@rambler.ru</a></p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Интернет-ресурс:</span> <a href="#">https://shop-improver.ru</a></p>
	            </div>
						</div>
					</div>
					<div class="col-md-1"></div>
          <div class="col-md-6 ftco-animate">

            <div class="col-md-12 mb-4">
                <h2 class="h4">Напишите в Ресторан-Онлайн</h2>
            </div>

            <? $form = ActiveForm::begin([
                                          'id' => 'contact-form',
                                          'options' => ['class' => 'contact-form',
                                                'style' => '',
                                          ],
                                        ]);
            ?>
              	<div class="row">
              		<div class="col-md-6">
  	                <div class="form-group">
                      <?= $form->field($contact_form, 'name')->textInput(['placeholder' => 'Впишите Ваше имя', 'class' => 'form-control'])->label(''); ?>
  	                </div>
                  </div>
                  <div class="col-md-6">
  	                <div class="form-group">
                      <?= $form->field($contact_form, 'email')->textInput(['placeholder' => 'Впишите Ваш Email адрес', 'class' => 'form-control'])->label(''); ?>
  	                </div>
  	              </div>
                </div>
                <div class="form-group">
                  <?= $form->field($contact_form, 'body')->textarea(['rows' => '5', 'cols' => '30', 'placeholder' => 'Впишите Ваше сообщение', 'class' => 'form-control'])->label(''); ?>
                </div>
                <div class="form-group">
                  <?= Html::submitButton('Отправить сообщение', ['class' => 'btn btn-primary py-3 px-5', 'name' => 'contact-form-button']) ?>
                </div>
              </form>
            <? ActiveForm::end(); ?>

          </div>
        </div>
      </div>
    </section>

<!--    <div id="map"></div> -->

