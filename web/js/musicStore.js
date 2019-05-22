$( document ).ready(function() {

function loadSlider() {
    
    /*========== 1) Events ===========*/
    
    $('#pause').on('click', pausePics);
    $('#play').on('click', playPics);
    $('#before').on('click', beforePics);
    $('#next').on('click', nextPics);
    
    /*========== 2) Variables =========*/
    
    var tabImg = [
            'music',
            'music1',
            'music2'
    ];
        var i = 0;
        var slider, 
            action,
            click,
            timer,
            second,
            count;
    
        /*========== 3) Functions ===========*/        
    
        function startSlider() {
            slider = '';
            slider = setInterval(setSlider, 5000);    
            return action = 0;
        }    
    
        function setSlider(){
            i++;
            if(action === 1){
                return clearInterval(slider);
            }
    
            if(i == 3) {
                i = 0;
            }
            changePics();
        }
    
        function pauseClick(button){
            var enableButton = function() {
                $('#before-disabled').prop(
                    "disabled", false
                ).attr(
                    'id', 'before'
                );
                $('#next-disabled').prop(
                    "disabled", false
                ).attr(
                    'id', 'next'
                );
            }
    
            $(button).click(function() {
                $('#before').prop(
                    'disabled', true
                ).attr(
                    'id', 'before-disabled'
                );
                $('#next').prop(
                    "disabled", true
                ).attr(
                    'id', 'next-disabled'
                );
                setTimeout(function() { enableButton() }, 3000);
            });
        }
    
        function beforePics(){
    
            changePics();
            pauseClick(this);
            clearInterval(slider);
            
            i--;
            if(i < 0){
                i = 2;
            }
    
            $('#pause').hide();
            $('#play').show();
            return action = 1;
    
        }
    
        function nextPics(){
    
            changePics();
            pauseClick(this);
            clearInterval(slider);
            
            i++;
            if(i > 2) {
                i = 0;
            }
            $('#pause').hide();
            $('#play').show();
            return action = 1;
    
        }
    
        function pausePics(){
    
            clearInterval(slider);
            $(this).hide();
            $('#play').show();
            return action = 1;
    
        }
    
        function playPics(){
    
            startSlider();
            $(this).hide();
            $('#pause').show();
            return action = 0;
    
        }
    
        function changePics() {
            
            $('#component-slider').css({
                'background-image' : 'url(\'web/img/slider/' + tabImg[i] + '.png\')',
                'transition' : 'background-image 2s'
            });
    
        }
    
        /*========== 3) Start the program ===========*/    
    
        startSlider();
    }
    
        /*============ Start the slider ===========*/    
    
loadSlider();

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

$('#press-connect').on('click', showForm);
$('#canceld-connect').on('click', hideForm);

function hideForm() {

    $('#canceld-connect').hide();
    $('#press-connect').show();
    $('#form-connect').css({
        'display' : 'none'
    });

    $('#slider-accessories').show();

}

function showForm() {

    $('#press-connect').hide();
    $('#canceld-connect').show();
    $('#form-connect').css({
        'display' : 'block'
    });
    $('#slider-accessories').hide();

    $('#send-log-pass').on('click', checkInputs);

    function checkInputs() {

        var login = $('#login').val();
        var pass = $('#password').val();

        if(login == '') {
            $('label[for="login"]').html('You may type your login');
        }
        else if(pass == '') {
            $('label[for="password"]').html('You may type your password');
        }
        else{
           return $('#send-data').trigger('click', true);
        }
    }
}
});

