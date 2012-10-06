$(function(){
    $('.image_uploader').each(function(i,e){
        try{
            var uploader = new qq.FileUploader({
                element: $(e)[0],
                action: '/admin/image/index',
                debug: true,
                allowedExtensions: ['jpg','png'],
                sizeLimit: 1024*1024*4,
                params : {
                    thumbnail : $(e).attr('thumbnail'),
                    type : $(e).attr('type')
                },
                onComplete: function(id, fileName, response){
                    if(response.success){
                        if(response.thumbpath)$(e).siblings('.imgholder').attr('src', response.thumbpath);
                        else $(e).siblings('.imgholder').attr('src', response.filepath);
                        
                        $(e).siblings('input').val(response.filepath);
                    }
                }
            });
        }
        catch(e){
        }
    });
    
    $('.multi_uploader').each(function(i,e){
        try{
            var uploader = new qq.FileUploader({
                element: $(e)[0],
                action: '/admin/image/index',
                debug: true,
                allowedExtensions: ['jpg','png'],
                sizeLimit: 1024*1024*4,
                params : {
                    thumbnail : $(e).attr('thumbnail'),
                    type : $(e).attr('type')
                },
                onComplete: function(id, fileName, response){
                    if(response.success){
                        var template = $('.holder.template').clone().removeClass('template');
                        if(response.thumbpath)$('img',template).attr('src', response.thumbpath);
                        else $('img',template).attr('src', response.filepath);
                        $('input',template).val(response.filepath);
                        $(template).prependTo('.holders');
                    }
                }
            });
        }
        catch(e){
        }
    });
    try{
        var f = $('.featured').val();
        $('.holder[rel="'+f+'"]').addClass('feat');
    }catch(e){}
    
})

function deleteImage(a){
    if(confirm('Are you sure you want to delete this image?')){
        $(a).parent('.holder').remove();
    }
}

function cropImage(a){
    var type = $(a).parent('.holder').parent('.holders').attr('type');
    var img = $(a).siblings('input')[0].value;
    var url = '/admin/image/crop?image='+img+'&type='+type;
    $('#cropFrame').attr('src',url);
    $('#imdialog').dialog('open');
}

function refreshImages(){
    var date = new Date;
    $('.holder img').each(function(i,e){
        $(this).attr('src', $(this).attr('src') + '?' + date.getTime());
    })
}

function setFeatured(a){
    $('.holder').removeClass('feat');
    $(a).parent('.holder').addClass('feat');
    $('.featured').val($(a).siblings('input')[0].value);
}