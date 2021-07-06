<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap/bootstrap-grid.css',
        'css/bootstrap/bootstrap-reboot.css',
        'css/css/bootstrap-reboot.css',
        'css/bootstrap.min.css',
        'css/css/mixins/_text_hide.css',
        'css/animate.css',
        'css/aos.css',
        'css/bootstrap-datepicker.css',
        'css/flaticon.css',
        'css/icomoon.css',
        'css/ionicons.min.css',
        'css/jquery.timepicker.css',
        'css/magnific-popup.css',
        'css/open-iconic-bootstrap.min.css',        
        'css/owl.carousel.min.css',
        'css/owl.theme.default.min.css',
        'css/site.css',
        'css/style.css',
    ];
    public $js = [
        'js/aos.js',
        'js/bootstrap-datepicker.js',
        'js/google-map.js',
        'js/bootstrap.min.js',
        //'js/jquery-3.2.1.min.js',
        //'js/jquery.min.js',
        'js/jquery-migrate-3.0.1.min.js',
        'js/jquery.animateNumber.min.js',
        'js/jquery.easing.1.3.js',
        'js/jquery.magnific-popup.min.js',
        'js/jquery.stellar.min.js',
        'js/jquery.timepicker.min.js',
        'js/jquery.waypoints.min.js',
        'js/owl.carousel.min.js',
        'js/popper.min.js',
        'js/range.js',
        'js/scrollax.min.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        //'yii\bootstrap4\BootstrapPluginAsset',
        'yii\web\JqueryAsset',
    ];
}
