$('#ajax-artist-show').on('click', sendDataArtist);
    
    function sendDataArtist() {
        
        showInfo();
        eraseData();

        var token = $('#token-cpnt-artist').val();
        var data = JSON.stringify({
            action : 'Home',
            method : 'readArtists'
        });

        var ajax = CryptoJS.AES.encrypt(data, "AJAX", {format: CryptoJSAesJson}).toString();
    
        $.ajax({
            url : './index.php',
            type : 'post',
            data : {
                ajax : ajax,
                tk_ajax   : token
            },
            success : function(data){
                var json = JSON.parse(CryptoJS.AES.decrypt(data, "AJAX", {format: CryptoJSAesJson}).toString(CryptoJS.enc.Utf8));

                for(i in json){
    
                    var artist = json[i].art_nom;
    
                    $('#show-info').append( 
                        '<div class="col-md-3 intro ajax">'
                           + '<p class="text-primary"><b>' + artist + '</b></p>'
                      + '</div>'  
                    );
                }
                $('#ajax-artist-show').hide();
                $('#ajax-artist-hide').show();
            }
        });    
    }
    
    $('#ajax-artist-hide').on('click', hideDataForArtist);
    
    function hideDataForArtist() {
    
        $('#show-info').slideUp(1000)
        .find('.ajax')
        .remove();
    
        hideInfo()
    
        $('#ajax-artist-hide').hide();
        $('#ajax-artist-show').show();
    }        
