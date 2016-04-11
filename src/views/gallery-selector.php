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
            <button type="button" data-toggle="modal" data-target="#<?=$id?>-modal" class="btn btn-sm btn-danger" style="margin-top: 5px;">Select Images</button>
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
                        <?php foreach ($images as $index => $image): ?>
                            <div class="gallery-selector-image" data-image-id="<?=$image['id']?>" data-image-name="<?=isset($image['name']) ? $image['name'] : $id . '-image-' . $index ?>" style="background-image: url('<?=$image['url']?>');" data-image-url="<?=$image['url']?>">
                                <span class="glyphicon glyphicon-check"></span>
                            </div>
                        <?php endforeach ?>
                        <div class="clearfix"></div>
                        <button type="button" class="btn btn-primary gallery-image-select" style="margin-left: 5px; margin-top: 10px;">Select</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
