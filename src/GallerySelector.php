<?php

namespace vivekmarakana\widgets;

class GallerySelector extends \yii\base\Widget {
    const WIDGET_NAME = 'gallery-selector';

    public $images = [];
    public $id;
    public $title = "Images";
    public $modalTitle = "Image Gallery Selector";
    public $uploadKey = "uploaded-images[]";

    public function run() {
        return $this->render('gallery-selector', [
            'images' => $this->images,
            'title' => $this->title,
            'modalTitle' => $this->modalTitle,
            'uploadKey' => $this->uploadKey,
            'id' => (!empty($this->id)) ? $this->id : 'timeline-widget-' . $this->getId()
        ]);
    }
}
?>
