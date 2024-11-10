$('#card_number_input').on('input propertychange', function() {
    charLimit(this, 16);
});
$('#expiration_date_input').on('input propertychange', function() {
    charLimit(this, 5);
});

let charLimit = (input, maxChar) => {
    let len = $(input).val().length;
    if (len > maxChar) {
        $(input).val($(input).val().substring(0, maxChar));
    };
}