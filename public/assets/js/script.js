$(document).ready(function () {
    var check1 = false;
    var check2 = false;
    $('#username').on('keyup', function () {
        if ($(this).val() == 0) {
            $(this).removeClass('is-valid');
            $(this).addClass('is-invalid');
            check1 = false;
        } else {
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
            check1 = true;
        }
    });

    $('#password').on('keyup', function () {
        if ($(this).val() == 0) {
            $(this).removeClass('is-valid');
            $(this).addClass('is-invalid');
            check2 = false;
        } else {
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
            check2 = true;
        }
    });

    $('#username, #password').on('keyup', function () {
        if (check1 == true && check2 == true) {
            $('.btn-login').removeAttr("disabled");
        } else {
            $('.btn-login').attr('disabled', 'disabled');
        }
    });

    $('.edit').on('click', function () {
        var data = $(this).data('id');
        console.log(data);
    });

});