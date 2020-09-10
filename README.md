Yii2 Image Gallery Selector
=========================

[![Total Downloads](https://poser.pugx.org/vivekmarakana/yii2-image-gallery-selector/downloads)](//packagist.org/packages/vivekmarakana/yii2-image-gallery-selector)
[![Monthly Downloads](https://poser.pugx.org/vivekmarakana/yii2-image-gallery-selector/d/monthly)](//packagist.org/packages/vivekmarakana/yii2-image-gallery-selector)
[![License](https://poser.pugx.org/vivekmarakana/yii2-image-gallery-selector/license)](//packagist.org/packages/vivekmarakana/yii2-image-gallery-selector)

multiple image selector from gallery for yii2

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist vivekmarakana/yii2-image-gallery-selector "dev-master"
```

or add

```
"vivekmarakana/vivekmarakana/yii2-image-gallery-selector": "dev-master"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
$images = [];
foreach (Image::find()->each(100) as $row) {
    $images[] = [
        'name' => $row->image_name, //optional
        'url' => $row->url,
        'id' => 'image-' . $row->id,
    ];
}

echo \vivekmarakana\widgets\GallerySelector::widget(['images' => $images]);
```
