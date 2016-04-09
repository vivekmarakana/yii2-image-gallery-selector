<?php
    \vivekmarakana\widgets\GallerySelectorAssets::register($this);
?>

<div class="row">
    <div class="col-sm-6">
        <form action="">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control input-sm" name="">
            </div>

            <div class="form-group">
                <label for="">Images</label>
                <div class="product-images">
                    <!-- product images and hidden fields -->
                    <!-- dynamically added after  -->
                </div>

                <div class="clearfix"></div>

                <button type="button" data-toggle="modal" data-target="#media-modal" class="btn btn-sm btn-danger">
                    Upload Images
                </button>
            </div>

            <button class="btn btn-sm btn-success" type="submit">Submit</button>

        </form>
    </div>

    <div id="media-modal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">&times;</button>
                    <h4>Image Gallery Selector</h4>
                </div>

                <div class="modal-body">
                    <div class="gallery-selector-container" id="librayr">
                        <?php foreach ($images as $image): ?>
                            <div class="gallery-selector-image" data-image-id="<?=$image['id']?>" data-image-name="<?=$image['name']?>" style="background-image: url('<?=$image['url']?>');">
                                <span class="glyphicon glyphicon-check"></span>
                            </div>
                        <?php endforeach ?>
                        <div class="clearfix"></div>
                        <button type="button" class="btn btn-primary insert" style="margin-left: 5px; margin-top: 10px;">Select</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
