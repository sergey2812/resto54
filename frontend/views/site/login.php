<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Login';

?>

    <section class="ftco-section contact-section">
      <div class="container">
              <p class="breadcrumbs" style="padding-bottom: 0.5em;"><span class="mr-2">
                  <a href="/">Главная</a></span>»&nbsp;&nbsp;<span>Авторизация в Ресторан-Онлайн</span>
              </p>        
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <span class="subheading">Restaurant-Online</span>
            <h1 class="mb-4">Авторизация в Ресторан-Онлайн</h1>
            
            <h2 class="mb-4"></h2>
            <p>Авторизуйтесь, чтобы управлять своими заказами онлайн</p>
          </div>
        </div>        
       
            <div class="row">
              <div class="col-lg-5">
                  <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                      <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Логин') ?>

                      <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>

                      <?= $form->field($model, 'rememberMe')->checkbox()->label('Запомнить меня', ['style'=>'padding-left:30px;']) ?>

                      <div style="color:#999;margin:1em 0">
                          Забыли пароль? <?= Html::a('восстановить', ['site/request-password-reset']) ?>.
                          <br>
                          Need new verification email? <?= Html::a('Resend', ['site/resend-verification-email']) ?>
                      </div>

                      <div class="form-group">
                          <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                      </div>

                  <?php ActiveForm::end(); ?>
              </div>
          </div>

  
      </div>
    </section>

<!--    <div id="map"></div> -->

