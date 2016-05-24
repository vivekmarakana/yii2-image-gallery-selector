Yii2 Image Gallery Selector
=========================
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
foreach (Image::find()->each(100) as $row) {
    $image = [
        'name' => $row->image_name, //optional
        'url' => $row->url,
        'id' => 'image-' . $row->id,
    ];
}

echo \vivekmarakana\widgets\GallerySelector::widget(['images' => $images]);
```
