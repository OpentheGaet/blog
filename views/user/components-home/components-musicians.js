function showInfo() {
    $('#show-info').slideDown(1000);
}
    
function hideInfo() {
    $('#show-info').slideUp(1000);
}
    
function eraseData(){
        
    $('#show-info')
    .css({'heigth' : '100%'})
    .find('.ajax')
    .remove();
    
    $('#ajax-album-hide').hide();
    $('#ajax-style-hide').hide();
    $('#ajax-artist-hide').hide();
    $('#ajax-album-show').show();
    $('#ajax-style-show').show();
    $('#ajax-artist-show').show();
}