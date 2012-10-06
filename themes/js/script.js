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
    $('#qtdialog').html(data);
    $('#qtdialog').dialog('open');
}
var anim = null;
$(function(){
    $('select').each(function(i,e){selectOption(e)});
    $('.destination').hover(function(){
        anim = $('.destination-dropdown').slideDown('fast');
    },function(){
        anim = $('.destination-dropdown').slideUp('fast');
    });
})