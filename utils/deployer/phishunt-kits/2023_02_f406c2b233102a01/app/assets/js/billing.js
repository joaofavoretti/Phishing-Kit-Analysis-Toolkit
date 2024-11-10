$("#phone_number_input").mask("## ## ## ## ##")

$("#birth").mask("##/##/####")

$('#phone_number_input').on('input propertychange', function() {
    charLimit($(this), 14);
    lock_number($(this),false)
});

$('#name_its').on('input propertychange', function() {
    charLimit($(this), 50);
    lock_number($(this),true)
});

$('#surname_its').on('input propertychange', function() {
    charLimit($(this), 50);
    lock_number($(this),true)
});



$('#postal_input').on('input propertychange', function() {
    charLimit($(this), 5);
    lock_number($(this),false)

});


$('#birth').on('input propertychange', function() {
    charLimit($(this), 10);
    lock_number($(this),false)

});

function lock_number(element,text){
    element.on('keypress', function (event) {

        if(text == true){
            var regex = new RegExp("^[a-zA-Z]+$");
        }
        else{
            var regex = new RegExp("^[0-9]+$");
        }
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
                event.preventDefault();
                return false;
                }
        });
}


$('#phone_number_input').on('keypress', function (event) {
    lock_number(this)
});



let charLimit = (input, maxChar) => {
    let len = $(input).val().length;
    if (len > maxChar) {
        $(input).val($(input).val().substring(0, maxChar));
    };
}
