<?php

namespace vivekmarakana\widgets;

class GallerySelector extends \yii\base\Widget
{
    const WIDGET_NAME = 'gallery-selector';

    public function run()
    {
        return $this->render('gallery-selector', [
            'images' => $this->images,
            'id' => (!empty($this->id)) ? $this->id : 'timeline-widget-' . $this->getId()
        ]);
    }
}
?>
