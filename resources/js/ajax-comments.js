$(document).ready(function () {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
        url: '/comments/show',
        data: {

        },
        beforeSend: function(){
            $('#loader-wrapper').show();
        },
        success: function(data){
            console.log(data);
            if(data.html == '')
            {
                $('#all-comments').append('<p style="text-align: center; color:#313e4c;">There are no comments yet.</p>');
                $('.more-comments').remove();
            }
            $('#all-comments').append(data.html);
            if(data.lastPage == data.currentPage)
            {
                $('.more-comments').remove();
            }
            else
            {
                $('#all-comments').append('<input type="hidden" id="pagination" data-current-page="'+data.currentPage+'">');
            }
        },
        complete: function(){
            $('#loader-wrapper').hide();
        },
        error: function(err, errorType, exception){
            $.each(err.responseJSON, function(indexm, value){
                console.log(err);
            });
        }
    });

    $('.more-comments').on('click', function () {
        let currentPage = $('#pagination').data('current-page');
        console.log(currentPage);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            url: '/show-more-comments',
            data: {
                currentPage: currentPage
            },
            beforeSend: function(){
                $('#loader-wrapper').show();
            },
            success: function(data){
                console.log(data);
                $('#all-comments').append(data.html);
                if(data.lastPage == data.currentPage)
                {
                    console.log(true);
                    $('.more-comments').remove();
                }
                else
                {
                    $('#pagination').remove();
                    $('#all-comments').append('<input type="hidden" id="pagination" data-current-page="'+data.currentPage+'">');
                }
            },
            complete: function(){
                $('#loader-wrapper').hide();
            },
            error: function (err, errorType, exception) {
                console.log(err);
            }
        });
    });
});