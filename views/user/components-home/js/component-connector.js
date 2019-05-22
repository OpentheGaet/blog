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