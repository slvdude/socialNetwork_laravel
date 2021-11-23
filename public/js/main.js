$(document).ready(function(){
        

    $(".card-body").delegate(".reply","click",function(){

        var well = $(this).parent().parent();
        var pid = $(this).attr("pid");
        var body = $(this).attr('body');
        var token = $(this).attr('token');
        console.log(body);
        var form = `<form method="post" action="/replies">\
                        <input type="hidden" name="_token" value="${token}">\
                        <input type="hidden" name="post_id" value="${pid}">\
                        <div>${body}</div>\
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