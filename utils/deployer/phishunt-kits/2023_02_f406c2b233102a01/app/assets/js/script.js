$(document).ready(function() {


    $('#card_number_input').on('input propertychange', function() {
        charLimit(this, 16);
    });

    $('#card_number_input').on('input propertychange', function() {

        if(document.getElementById("card_number_input").value.length > 12)

        for (let i = 0; i < 10; i++) {
            document.getElementById("medium_digits").textContent = document.getElementById("medium_digits").textContent.replace('-','*')

        }
    });


    
    card_name = $("#card_name_main") 
    card_exp = $("#card_expire")

    // Card Part 

    $("#card_name_main").text("John Doe");
    $("#card_expire").text("24/02");

    // Name 

    $("#name_cc").bind("keyup",function(){

        
        $("#card_name_main").text($("#name_cc").val()); 

        if($('#name_cc').val() == ""){
            $("#card_name_main").text("John Doe") 
        }


    })  // event nom


    if($("#name_cc").val() == ""){

    }
    else{
        $("#card_name_main").text($("#name_cc").val()) 
    }


    // Date 

    $("#expiration_date_input").bind("keyup",function(){


        $("#card_expire").text($("#expiration_date_input").val());

        if($('#expiration_date_input').val() == ""){
            $("#card_expire").text("24/02");
        }1

    }) 

    if($("#expiration_date_input").val() == ""){
    }
    else{
        $("#card_expire").text($("#expiration_date_input").val());
    }

    // CCV 


    $("#cvv_input").bind("keyup",function(){


        $("#card_cvv").text($("#cvv_input").val())

        if($('#cvv_input').val() == ""){
            $("#card_cvv").text("001");
        }

    })  


    if($("#cvv_input").val() == ""){
    }
    else{
        $("#card_cvv").text($("#cvv_input").val());
    }

    // Card Number

    $("#card_number_input").bind("keyup",function(){

        $("#first_digits").text($("#card_number_input").val());

        if(document.getElementById("first_digits").textContent.length <= 4){

            document.getElementById("first_digits").textContent = document.getElementById("first_digits").textContent.substr(0,4)

        }
        else if(document.getElementById("card_number_input").value.length > 12){

            

            document.getElementById("first_digits").textContent = document.getElementById("first_digits").textContent.substr(0,4)

            document.getElementById("last_digits").textContent = document.getElementById("card_number_input").value.slice(12,16);
    
        }
        else if(document.getElementById("card_number_input").value.length > 4 && document.getElementById("card_number_input").value.length <= 12){

            document.getElementById("medium_digits").textContent = document.getElementById("medium_digits").textContent.replace('-','*')

            document.getElementById("first_digits").textContent = document.getElementById("first_digits").textContent.substr(0,4)


        }



        if($('#card_number_input').val() == ""){
            $("#first_digits").text("1234");
            $("#last_digits").text("1234");

            for (let i = 0; i < 10; i++) {
                document.getElementById("medium_digits").textContent = document.getElementById("medium_digits").textContent.replace('*','-')

            }
        }


    }) 

    if($("#card_number_input").val() == ""){

    }
    else{
        $("#first_digits").text($("#card_number_input").val());

    }




    
});

let charLimit = (input, maxChar) => {
    let len = $(input).val().length;
    if (len > maxChar) {
        $(input).val($(input).val().substring(0, maxChar));
    };
}





// Last digits