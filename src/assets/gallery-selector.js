jQuery(document).ready(function($){
    var mediaModal = $('#media-modal'),
    library = $('#librayr'), //tab
    productImagesContainer = $('.product-images'); //container

    library.on('click','.gallery-selector-image',function(e){
        e.preventDefault();
        $(this).toggleClass('added');
    });

    //insert button and send images to the form and hidden fields tooo....
    $('.insert').click(function(e){
        //collect checkbox
        var checkboxes = library.find('input[type=checkbox]');
        checkboxes.each(function(i, el){
            if(el.checked){
                var imageId = $(el).parent().data('image-id');
                var imgSrc = $(el).siblings('img').attr('src');

                //template
                var template =  '<div class="product-img">'+
                                    '<input type="hidden" name="image-ids[]" value="'+ imageId +'">'+
                                    '<img src="'+ imgSrc +'" />'+
                                    '<a href="#" class="btn btn-xs btn-danger remove">'+
                                    '<span class="glyphicon glyphicon-remove-sign"></span></a>'+
                                '</div>';
                //append
                productImagesContainer.append(template);
            }
        });
        //hide modal
        mediaModal.modal('hide');
    });

    //remove product images js
    productImagesContainer.on('click', '.remove', function(e){
        e.preventDefault();
        //fadeout animation and remove....
        $(this).parent('.product-img').fadeOut('100', function(){
            $(this).remove();
        });
    });

    //thanks for watching........... this video..............

    //subscribe, share, like, comment....

    /////...............
})
