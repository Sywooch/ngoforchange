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
class MomentAsset extends AssetBundle
{
    public $sourcePath = '@bower/moment';
    public $js = [
        'moment-with-locales.min.js',
    ];
    public $css = [
    ];
    public $depends = [
    ];
}
