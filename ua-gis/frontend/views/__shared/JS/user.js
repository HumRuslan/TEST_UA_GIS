$(function(){
    $('#Create').click(function(){
        if ($('#EmailCreate').val() != undefined && $('#PasswordCreate').val() != undefined){
            $.post("/user/create",
                {
                    email: $('#EmailCreate').val(),
                    password: $('#PasswordCreate').val()
                },
                function(data, status){
                    $('#AuthUser').modal('hide');
                    var url = "/post/index";
                    $(location).attr('href',url);
                });
        }
    });

    $('#Login').click(function(){
        if ($('#PasswordAuth').val() != undefined && $('#EmailAuth').val() != undefined){
            $.post("/user/login",
                {
                    email: $('#EmailAuth').val(),
                    password: $('#PasswordAuth').val()
                },
                function(data, status){
                    $('#LoginUser').modal('hide');
                    var url = "/post/index";
                    $(location).attr('href',url);
                });
        }
    });

    $('#logOut').click(function(){
        $.get("/user/logOut", function(data, status){
                var url = "/post/index";
                $(location).attr('href',url);
            });
    });
});