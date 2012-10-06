function selectOption(s){
    $(s).siblings(".dropdownbtn").html($("option:selected",s).html());
}
function clearFixHotels(){
    $('.col','.items').each(function(i,e){
        if(!((i+1)%3)){
            $('<div class="clear"></div>').insertAfter(this);
        }
    })
}

function openDialog(data){
    if(data.success){
        $('form').each(function(i,e){this.reset();})
        $('#qtdialog').dialog({title : 'Thank You'});
    }else{
        $('#qtdialog').dialog({title : 'Sorry'});
    }
    $('#qtdialog').html(data.message);
    $('#qtdialog').dialog('open');
}

function popCountry(region){
    $.post('/ajax/country', {
        region:region
    }, function(data){
        $('.countrydd').html(data);
    });
}

function popCity(country){
    $.post('/ajax/city', {
        country:country
    }, function(data){
        $('.citydd').html(data);
    });
}

var anim = null;
$(function(){
    $('select').each(function(i,e){
        selectOption(e)
    });
    $('.destination').hover(function(){
        if(anim)anim.stop(true,true);
        anim = $('.destination-dropdown').slideDown('fast');
    },function(){
        if(anim)anim.stop(true,true);
        anim = $('.destination-dropdown').slideUp('fast');
    });
});
window.onload = function(){
    try{
        $(lazyImages).each(function(i,e){
            $('<img src="'+e+'"/>').appendTo('#slideImages');
        });
    }catch(e){}
    $('#slideImages').nivoSlider({
        effect: 'fade',
        directionNav : false,
        controlNav : false
    });
    $('input, textarea').placeholder();
}
