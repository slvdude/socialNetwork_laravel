$(document).ready(function(){
        

    $(".card-body").delegate(".reply","click",function(){
        let well = $(this).parent().parent();
        let pid = $(this).attr("pid");
        let name = $(this).attr("name");
        let body = $(this).attr('body');
        let token = $(this).attr('token');
        let form = `<form method="post" action="/replies">\
                        <input type="hidden" name="body" value="${body}">\
                        <input type="hidden" name="_token" value="${token}">\
                        <input type="hidden" name="post_id" value="${pid}">\
                        Reply to <b>${name}</b>\
                        <div class="form-group">\
                            <textarea class="form-control" name="reply" placeholder="Enter your reply" ></textarea>\
                        </div>\
                        <div class="form-group">\
                            <input class="btn btn-primary" type="submit">\ 
                        </div>\
                    </form>`;

        well.find(".reply-form").append(form);
    });
});