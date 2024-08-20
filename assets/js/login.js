$(document).ready(function () {
    $('#chek').click(function () {
        if ($(this).is(':checked')) {
            $('#password').attr('type', 'text');
        } else {
            $('#password').attr('type', 'password');
        }
    })

    $('#chek2').click(function () {
        if ($(this).is(':checked')) {
            $('#new_password1').attr('type', 'text');
            $('#new_password2').attr('type', 'text');
        } else {
            $('#new_password1').attr('type', 'password');
            $('#new_password2').attr('type', 'password');
        }
    })

    $('#chek3').click(function () {
        if ($(this).is(':checked')) {
            $('#current_password').attr('type', 'text');
            $('#new_password1').attr('type', 'text');
            $('#new_password2').attr('type', 'text');
        } else {
            $('#current_password').attr('type', 'password');
            $('#new_password1').attr('type', 'password');
            $('#new_password2').attr('type', 'password');
        }
    });

    $('#chek4').click(function () {
        if ($(this).is(':checked')) {
            $('#password1').attr('type', 'text');
            $('#password2').attr('type', 'text');
        } else {
            $('#password1').attr('type', 'password');
            $('#password2').attr('type', 'password');
        }
    });

})



