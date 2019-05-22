$('#ajax-style-show').on('click', sendDataStyle);
    
    function sendDataStyle() {
    
        showInfo();
        eraseData();

        var token = $('#token-cpnt-style').val();

        var data = JSON.stringify({
            action : 'Home',
            method : 'readStyles'
        })

        var ajax = CryptoJS.AES.encrypt(data, "AJAX", {format: CryptoJSAesJson}).toString();
    
        $.ajax({
            url : './index.php',
            type : 'post',
            data : {
                ajax : ajax,
                tk_ajax : token
            },
            success : function(data){
                var json = JSON.parse(CryptoJS.AES.decrypt(data, "AJAX", {format: CryptoJSAesJson}).toString(CryptoJS.enc.Utf8));

                if (json != null) {
                    for(i in json){
    
                        var style = json[i].gen_nom;
    
                        $('#show-info').append( 
                            '<div class="col-md-3 intro ajax">' +
                             '<p class="text-primary"><b>' + style + '</b></p>' +
                            '</div>'  
                        );
                    }
                    $('#ajax-style-show').hide();
                    $('#ajax-style-hide').show();
                    return;
                }
                $('#content-warper').hide(1000);
                $('#components-error').show(1000);
                return;
            },
            error : function() {
                $('#content-warper').hide(1000);
                $('#components-error').show(1000);
                return;
            }
        });    
    }
    
    $('#ajax-style-hide').on('click', hideDataForStyle);
    
    function hideDataForStyle() {
    
        $('#show-info').slideUp(1000)
        .find('.ajax')
        .remove();
        
        hideInfo();
    
        $('#ajax-style-hide').hide();
        $('#ajax-style-show').show();
    
    }
