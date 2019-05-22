$('#ajax-album-show').on('click', sendDataForAlbum);
    
    function sendDataForAlbum() {
    
        showInfo();
        eraseData();

        var token = $('#token-cpnt-album').val();

        var data = JSON.stringify({
            action : 'Home',
            method : 'readAlbums'
        });

        var ajax = CryptoJS.AES.encrypt(data, 'AJAX', {format: CryptoJSAesJson}).toString();
    
        $.ajax({
            url : './index.php',
            type : 'post',
            data : {
                ajax : ajax,
                tk_ajax    : token
            },
            success : function(data){
                var json = JSON.parse(CryptoJS.AES.decrypt(data, 'AJAX', {format: CryptoJSAesJson}).toString(CryptoJS.enc.Utf8));

                for(i in json){
    
                    var image = json[i].alb_image;
    
                    $('#show-info').append( 
                        '<div class="col-md-3 intro ajax">'
                           + '<img src="web/img/Albums/' + image +'" alt="' + image + '">'
                      + '</div>'  
                    );
                }
                $('#ajax-album-show').hide();
                $('#ajax-album-hide').show();
    
            }
        });    
    }
    
    $('#ajax-album-hide').on('click', hideDataForAlbum);
    
    function hideDataForAlbum() {
    
        $('#show-info').slideUp(1000)
        .find('.ajax')
        .remove('');
    
        hideInfo();
    
        $('#ajax-album-hide').hide();
        $('#ajax-album-show').show();
    }
