<?php
namespace onix\assets;

use yii\web\AssetBundle;

class FontAwesomeAsset extends AssetBundle
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
                    case 'map':
                        return false;
                    default:
                        return true;
                }
            }
        };
    }
}
