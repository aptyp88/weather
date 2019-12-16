$(document).ready(function () {
    $('#btn-contact-us').on('click', function () {
        let name = $('#contact-name').val();
        let email = $('#contact-email').val();
        let msg = $('#contact-msg').val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            url: '/contact-us/store',
            data: {
                email: email,
                name: name,
                message: msg
            },
            beforeSend: function(){
                $('#loader-wrapper').show();
            },
            success: function(data){
                console.log(data);
                $('.invalid-feedback').remove();
                $('.alert-success').remove();
                $('input[name="email"]').val('');
                $('input[name="name"]').val('');
                $('#contact-msg').val('');
                $('#btn-contact-us').attr('disabled', 'true');
                $('.success').append('<div class="alert alert-success mt-3 text-center" style="width: 70%;margin: 0 auto">Email sent successfuly</div>');
            },
            complete: function(){
                $('#loader-wrapper').hide();
            },
            error: function(err, errorType, exception){
                $.each(err.responseJSON, function(indexm, value){
                    console.log(value);
                    $('.invalid-feedback').remove();
                    $('.alert-success').remove();
                    if(value.email)
                    {
                        $('.has-email').append('<span class="invalid-feedback" role="alert" style="display: block"><strong>'+ value.email +'</strong></span>');
                    }
                    if(value.name)
                    {
                        $('.has-name').append('<span class="invalid-feedback" role="alert" style="display: block"><strong>'+ value.name +'</strong></span>');
                    }
                    if(value.message)
                    {
                        $('.has-message').append('<span class="invalid-feedback" role="alert" style="display: block"><strong>'+ value.message +'</strong></span>');
                    }
                });
            }
        });
    });


    /**
     *  Disabling/enabling submit button
     */
    $('#contact-name, #contact-email, #contact-msg').on('input', function(){
        if($('#contact-name').val().length >= 1 && $('#contact-email').val().length >= 1 && $('#contact-msg').val().length >= 1)
            $('#btn-contact-us').prop('disabled', false);
        else
            $('#btn-contact-us').attr('disabled', 'disabled');
    });
});