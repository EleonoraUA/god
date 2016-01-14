$(document).ready(function () {
    /*
     $('.js').click(function(event){
     var item = $(this).html();
     event.preventDefault();
     $.ajax({
     type: 'GET',
     dataType: 'json',
     url: '/web/4/god/core/ajax.php?article=' + item,
     success: function(result) {
     $('.content').html(result.content);
     history.pushState(null, null, "/web/4/god/main/" + item);
     },
     error: function(jqXHR, textStatus, errorThrown) {
     console.log(textStatus);
     }
     });
     });
     */
    /*$('input[name=preview]').click(function (event) {
        event.preventDefault();
        var item = $('textarea[name=article]').html();
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '/web/4/god/core/preview.php?edit=' + item,
            success: function (result) {
                $('header').append(item);
            }
        });
    });*/
    $('#form_login').submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "http://localhost/web/4/god/core/form.php",
            data: $(this).serialize(),
            success: function (result) {
                if (result.admin == 1) window.location.href = 'http://localhost/web/4/god/admin';
                if (result.admin == null) window.location.href = 'http://localhost/web/4/god/main/home';
                if (result.admin == 2) $('#form_login').append(result.message);
            }
        });

    });
    /*
     $('.faq_a').click(function(event){
     event.preventDefault();
     var page = $(this).html();
     $.ajax({
     type: 'GET',
     dataType: 'json',
     url: '/web/4/god/core/faq.php?page=' + page,
     success: function(result) {
     $('.mes').html(result.content);
     history.pushState(null, null, "/web/4/god/main/FAQ/" + page);
     }
     });
     });
     */
    window.addEventListener("popstate", function (event) {
        console.log("fired");
        updateContent(event.state);
    });
});