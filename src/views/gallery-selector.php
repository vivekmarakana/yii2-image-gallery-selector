<?php
    \vivekmarakana\widgets\GallerySelectorAssets::register($this);
?>

<div id="<?=$id?>" class="gallery-selector-widget">
    <div class="clearfix">
        <div class="form-group">
            <label for=""><?=$title?></label>
            <div class="no-image-selected">No images selected.</div>
            <div class="selected-images"></div>
            <div class="clearfix"></div>
            <button type="button" data-toggle="modal" data-target="#<?=$id?>-modal" class="btn btn-sm btn-danger btn-select-images" style="margin-top: 5px;">Select Images</button>
        </div>
    </div>

    <div id="<?=$id?>-modal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">&times;</button>
                    <h4>Image Gallery Selector</h4>
                </div>

                <div class="modal-body">
                    <div class="gallery-selector-container">
                        <div class="images-list">
                            <?php foreach ($images as $index => $image): ?>
                                <div class="gallery-selector-image" data-image-id="<?=$image['id']?>" data-image-name="<?=isset($image['name']) ? $image['name'] : $id . '-image-' . $index ?>" style="background-image: url('<?=$image['url']?>');" data-image-url="<?=$image['url']?>">
                                    <span class="glyphicon glyphicon-check"></span>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <button type="button" class="btn btn-primary gallery-image-select" style="margin-left: 5px; margin-top: 10px;">Select</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$script = <<<JS
    var _context = $("#{$id}");
    var _container = _context.find('.gallery-selector-container .images-list');
    var _selected = _context.find('.selected-images');
    var _blank = _context.find('.no-image-selected');

    _context.data('imageselector', {
        setImages: function(images){
            if (images && images instanceof Array) {
                this.clear();
                $.each(images, function(index, el){
                    if(el instanceof Object && el.id && el.url){
                        var name = (el.name) ? el.name : "{$id}-image-" + index;
                        var template =  '<div class="gallery-selector-image" data-image-id="' + el.id + '" data-image-name="' + name + '" style="background-image: url(\'' + el.url + '\');" data-image-url="' + el.url + '"><span class="glyphicon glyphicon-check"></span></div>';
                        _container.append(template);
                    } else {
                        console.error("Invalid object found in images array: ", el);
                    }
                });
            } else {
                console.error("images array required.");
            }
        },
        clear: function(){
            _container.html('');
            _selected.html('');
            _blank.show();
        }
    });
JS;

$this->registerJS($script);
?>
