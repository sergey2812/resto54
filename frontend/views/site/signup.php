<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Регистрация в Ресторан-Онлайн';

?>

    <section class="ftco-section contact-section">
      <div class="container">
              <p class="breadcrumbs" style="padding-bottom: 0.5em;"><span class="mr-2">
                  <a href="/">Главная</a></span>»&nbsp;&nbsp;<span>Регистрация в Ресторан-Онлайн</span>
              </p>        
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <span class="subheading">Restaurant-Online</span>
            <h1 class="mb-4">Регистрация в Ресторан-Онлайн</h1>
            
            <h2 class="mb-4"></h2>
            <p>Зарегистрируйтесь, чтобы управлять своими заказами онлайн</p>
          </div>
        </div>        
       
            <div class="row">
                <div class="col-lg-5">
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Логин') ?>

                        <?= $form->field($model, 'email') ?>

                        <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>

                        <div class="form-group">
                            <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                        </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>

  
      </div>
    </section>

<!--    <div id="map"></div> -->

