$('#send-reg-pass').on('click', AJAXcreate);

function AJAXcreate()
{
    var login = $('#login').val();
    var pass1 = $('#pass-1').val();
    var pass2 = $('#pass-2').val();

    if (login == '') {
        $('label[for="login"]').html('You may type your login');
        return;
    }
    else if (pass1 == '') {
        $('label[for="pass-1"]').html('You may type your password');
        return;
    }
    else if (pass2 == '') {
        $('label[for="pass-2"]').html('You may type your password');
        return;
    }
    else if (pass1 != pass2) {
        $('label[for="pass-1"]').html('You may type the same password');
        $('label[for="pass-2"]').html('You may type the same password');
        return;
    }
    else {
        var button = '<button id="send-data" hidden="true">SEND</button>';
        $(this).after(button);
        $('#send-data').trigger('click');
        return;
    }
}