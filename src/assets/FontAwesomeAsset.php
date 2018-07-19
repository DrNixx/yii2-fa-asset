<?php
namespace onix\assets;

use yii\web\AssetBundle as YiiAssetBundle;

defined('YII_DEBUG') or define('YII_DEBUG', true);

class FontAwesomeAsset extends YiiAssetBundle
{
    public $sourcePath = '@bower/font-awesome';

    public $css = [
        'css/font-awesome.min.css'
    ];

    public function init()
    {
        parent::init();

        $this->publishOptions['beforeCopy'] = function ($from, $to) {
            if (is_dir($from)) {
                $dirname = basename($from);
                return $dirname === 'fonts' || $dirname === 'css';
            } else {
                $ext = pathinfo($from, PATHINFO_EXTENSION);
                switch ($ext) {
                    case 'scss':
                        return false;
                    case 'map':
                        return YII_DEBUG;
                    default:
                        return true;
                }
            }
        };
    }
}
