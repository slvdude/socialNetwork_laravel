$(document).ready(function(){
    let loaded = false;   
    //form displaying
    $('.card-body').delegate('.reply','click',function() {
        let bg = $(this).parent().parent();
        let pid = $(this).attr('pid');
        let name = $(this).attr('name');
        let body = $(this).attr('body');
        let token = $(this).attr('token');
        let form = `<form method="post" action="/replies" class="f1">\
                        <input type="hidden" name="body" value="${body}">\
                        <input type="hidden" name="_token" value="${token}">\
                        <input type="hidden" name="post_id" value="${pid}">\
                        Reply to <b>${name}</b>\
                        <div class="form-group">\
                            <textarea class="form-control" rows="3" name="reply" placeholder="Enter your reply" ></textarea>\
                        </div>\
                        <div class="form-group">\
                            <input class="btn btn-primary" type="submit" value="Submit">\ 
                        </div>\
                    </form>`;
        bg.find('.reply-form').append(form);        
    });
    //loading posts
    $('#load').click(function(e){
        if(loaded === true) return;
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            url: "/load",
            data: {'id': $(this).attr('uid')},
            method: 'get',
            dataType: "json",
            success: function(response){
                loaded = true;
                console.log(response);
                $('.loaded-data').append(response.view);
            }
        });
    });
});