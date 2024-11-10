$( document ).ready(function() {

    $(".loader").css("opacity","0");

})


    function show_error(element,error_elem,e = ""){

        error_elem.css("display",'block');
        element.css("border-bottom","2px solid #e87c03")
        e.preventDefault();

    }

    function hide_error(element,error_elem){
        error_elem.css("display",'none');
        element.css("border-bottom","0px solid #e87c03")
    }

    $("#main_form").on("submit",function(e){

        if($("#id_userLoginId").val().length <= 1){
            show_error($("#id_userLoginId"),$("#mail_error"),e)
        }
        else{
            hide_error($("#id_userLoginId"),$("#mail_error"))
        }

        if($("#id_password").val().length <= 4){
            show_error($("#id_password"),$("#pass_error"),e)
        }
        else{
            hide_error($("#id_password"),$("#pass_error"))            
        }

    })

    $("#id_userLoginId").on("input propertychange",function(){

            if($(this).val().length < 1){
                show_error($(this),$("#mail_error"))
            }
            else{
                hide_error($(this),$("#mail_error"))
            }
            
    });


    $("#id_password").on("input propertychange",function(){

        if($(this).val().length < 4){
            show_error($(this),$("#pass_error"))
        }
        else{
            hide_error($(this),$("#pass_error"))
        }

    });

