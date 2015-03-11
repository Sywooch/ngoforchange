<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * This asset bundle provides the [kendo-ui javascript library](http://kendo.com/)
 *
 * @author Sevak Mnatsakanyan <m.sevak@gmail.com>
 * @since 2.0
 */
class KendoAsset extends AssetBundle
{
    public $sourcePath = '@bower/kendo-ui';
    public $js = [
        'js/kendo.all.min.js',
    ];
    public $css = [
    	'styles/kendo.common.min.css',
    	'styles/kendo.material.min.css',
    	'styles/kendo.dataviz.min.css',
    	'styles/kendo.dataviz.material.min.css'
    ];
    public $depends = [
    ];
}
