<?php

namespace app\modules\admin;

/**
 * AdminAsset
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class AdminAsset extends \yii\web\AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@app/modules/admin/assets';

    /**
     * @inheritdoc
     */
    public $css = [
        'main.css',
        'custom.css',
    ];

}
