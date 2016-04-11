<?php
namespace vivekmarakana\widgets;

/**
 * Asset bundle for GallerySelector Widget
 *
 * @author Vivek Marakana <vivek.marakana@gmail.com>
 */
class GallerySelectorAssets extends \yii\web\AssetBundle
{
    public $depends = [
        '\yii\web\JqueryAsset',
        '\yii\bootstrap\BootstrapAsset',
        '\yii\bootstrap\BootstrapPluginAsset'
    ];

    public $css = [
        'gallery-selector.css',
    ];

    public $js = [
        'gallery-selector.js',
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setSourcePath(__DIR__ . '/assets');
        parent::init();
    }
    /**
     * Sets the source path if empty
     * @param string $path the path to be set
     */
    protected function setSourcePath($path)
    {
        if (empty($this->sourcePath)) {
            $this->sourcePath = $path;
        }
    }
}
