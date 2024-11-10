var timeleft = 5;
var downloadTimer = setInterval(function(){
timeleft--;
document.getElementById("countdowntimer").textContent = timeleft;
if(timeleft <= 0){
    window.location.href = "../steps/loading_finished.php";

}
if(timeleft <= 0)
    clearInterval(downloadTimer);
    console.log(timeleft)
},1000);