jQuery(document).ready(function($){
    $(document).on('click','.gallery-selector-widget .gallery-selector-image',function(e){
        e.preventDefault();
        $(this).toggleClass('added');
    });

    $(document).on('click', '.gallery-selector-widget .gallery-image-select', function(e){
        //collect selected images
        var $this = $(this);
        var $context = $this.closest('.gallery-selector-widget');
        var $mediaModal = $this.closest('.modal');
        var $library = $context.find('.gallery-selector-container');
        var $selectedImageContainer = $context.find('.selected-images');

        console.log($mediaModal, $library, $selectedImageContainer);

        var images = $library.find('.gallery-selector-image.added');
        images.each(function(i, el){
            var $el = $(el);
            var imageId = $el.data('image-id');
            var imgSrc = $el.data('image-url');

            if ($selectedImageContainer.find('.selected-img[data-image-id="' + imageId + '"]').length == 0){
                //template
                var template =  '<div class="selected-img" style="background-image: url(\'' + imgSrc + '\')" data-image-id="' + imageId + '">'+
                                    '<input type="hidden" name="selected-image-ids[]" value="'+ imageId +'">'+
                                    '<span class="glyphicon glyphicon-remove-sign remove-selected-image"></span>' +
                                '</div>';
                //append
                $selectedImageContainer.append(template);
            }

            $context.find('.no-image-selected').hide();
        });

        //hide modal
        $mediaModal.modal('hide');
    });

    $(document).on('click', '.gallery-selector-widget .remove-selected-image', function(e){
        e.preventDefault();
        var $this = $(this);
        var $context = $this.closest('.gallery-selector-widget');

        //fadeout animation, remove and un-select from gallery....
        var $image = $(this).parent('.selected-img');
        var image_id = $image.find('input').val();
        $image.fadeOut('100', function(){
            $(this).remove();
            $context.find('.gallery-selector-image[data-image-id="' + image_id + '"]').removeClass('added');
            if ($context.find('.selected-img').length == 0) {
                $context.find('.no-image-selected').show();
            }
        });
    });
})
