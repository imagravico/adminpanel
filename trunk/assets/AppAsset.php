<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'web/css/site.css',
        'web/css/custom.css'
    ];
    public $js = [
        'web/backend/js/vendor/bootstrap.min.js',
        'web/backend/js/x-editable-master/dist/bootstrap3-editable/js/bootstrap-editable.min.js',
        'web/backend/js/shawnchin-jquery-cron-78118ba/cron/jquery-cron-min.js',
        'web/backend/js/jquery_chained-master/jquery.chained.min.js',
        'web/backend/js/plugins.js',
        'web/backend/js/app.js',
        'web/backend/js/pages/index.js',
        'web/js/custom.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    
}
