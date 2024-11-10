var carderr = { firstname : false, lastname : false, ccnum : false, expdate : false, ccv : false}


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