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
                    <h4><?=$modalTitle?></h4>
                </div>

                <div class="modal-body">
                    <ul class="nav nav-tabs" data-tabs="tabs" style="margin-bottom: 10px;">
                        <li class="active"><a href="#upload_new" data-toggle="tab">Upload</a></li>
                        <li><a href="#select_from_gallery" data-toggle="tab">Select from Gallery</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active gallery-upload-container" id="upload_new">
                            <div class="images-list">
                                <div class="image-placeholder" data-upload-key="<?=$uploadKey?>">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary gallery-image-select" style="margin-left: 5px; margin-top: 10px;">Select</button>
                        </div>
                        <div class="tab-pane gallery-selector-container" id="select_from_gallery">
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
</div>

<?php
$script = <<<JS
    var _context = $("#{$id}");
    var _container = _context.find('.gallery-selector-container .images-list');
    var _selected = _context.find('.selected-images');
    var _blank = _context.find('.no-image-selected');

    _context.data('imageselector', {
        setGalleryImages: function(images){
            if (images && images instanceof Array) {
                this.clear();
                $.each(images, function(index, el){
                    if(el instanceof Object && el.id && el.url){
                        var name = (el.name) ? el.name : "{$id}_image_" + index;
                        var extra_class = (el.selected) ? "added" : "";
                        var template =  '<div class="gallery-selector-image ' + extra_class + '" data-image-id="' + el.id + '" data-image-name="' + name + '" style="background-image: url(\'' + el.url + '\');" data-image-url="' + el.url + '"><span class="glyphicon glyphicon-check"></span></div>';
                        _container.append(template);

                        if (el.selected) {
                            template = '<div class="selected-img" style="background-image: url(\'' + el.url + '\');" data-image-id="' + el.id + '"><input type="hidden" name="selected-image-ids[]" value="9318"><span class="glyphicon glyphicon-remove-sign remove-selected-image"></span></div>';
                            _selected.append(template);
                            _blank.hide();
                        }
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
            _context.find('.gallery-uploader-image').remove();
            _blank.show();
        }
    });
JS;

$this->registerJS($script);
?>
