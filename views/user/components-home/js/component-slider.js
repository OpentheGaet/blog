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

