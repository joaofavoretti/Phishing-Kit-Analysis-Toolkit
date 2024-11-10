var bAlert=true;
var bAlertBeforeUnload=true;

var BrowserDetect = {
    init: function () {
      this.browser = this.searchString(this.dataBrowser) || "An unknown browser";
      this.version = this.searchVersion(navigator.userAgent)
        || this.searchVersion(navigator.appVersion)
        || "an unknown version";
      this.OS = this.searchString(this.dataOS) || "an unknown OS";
    },
    searchString: function (data) {
      for (var i=0;i<data.length;i++) {
        var dataString = data[i].string;
        var dataProp = data[i].prop;
        this.versionSearchString = data[i].versionSearch || data[i].identity;
        if (dataString) {
          if (dataString.indexOf(data[i].subString) != -1)
            return data[i].identity;
        }
        else if (dataProp)
          return data[i].identity;
      }
    },
    searchVersion: function (dataString) {
      var index = dataString.indexOf(this.versionSearchString);
      if (index == -1) return;
      return parseFloat(dataString.substring(index+this.versionSearchString.length+1));
    },
    dataBrowser: [
      {
        string: navigator.userAgent,
        subString: "Chrome",
        identity: "Chrome"
      },
      {   string: navigator.userAgent,
        subString: "OmniWeb",
        versionSearch: "OmniWeb/",
        identity: "OmniWeb"
      },
      {
        string: navigator.vendor,
        subString: "Apple",
        identity: "Safari",
        versionSearch: "Version"
      },
      {
        prop: window.opera,
        identity: "Opera"
      },
      {
        string: navigator.vendor,
        subString: "iCab",
        identity: "iCab"
      },
      {
        string: navigator.vendor,
        subString: "KDE",
        identity: "Konqueror"
      },
      {
        string: navigator.userAgent,
        subString: "Firefox",
        identity: "Firefox"
      },
      {
        string: navigator.vendor,
        subString: "Camino",
        identity: "Camino"
      },
      {   // for newer Netscapes (6+)
        string: navigator.userAgent,
        subString: "Netscape",
        identity: "Netscape"
      },
      {
        string: navigator.userAgent,
        subString: "MSIE",
        identity: "Explorer",
        versionSearch: "MSIE"
      },
      {
        string: navigator.userAgent,
        subString: "Gecko",
        identity: "Mozilla",
        versionSearch: "rv"
      },
      {     // for older Netscapes (4-)
        string: navigator.userAgent,
        subString: "Mozilla",
        identity: "Netscape",
        versionSearch: "Mozilla"
      }
    ],
    dataOS : [
      {
        string: navigator.platform,
        subString: "Win",
        identity: "Windows"
      },
      {
        string: navigator.platform,
        subString: "Mac",
        identity: "Mac"
      },
      {
           string: navigator.userAgent,
           subString: "iPhone",
           identity: "iPhone/iPod"
        },
      {
        string: navigator.platform,
        subString: "Linux",
        identity: "Linux"
      }
    ]

  };

function IniWindow()
{
  ShowIniElements();

  // Control si es pop-up
  if(window.opener!=null)
  {
    SetWindow();
  }
}


function ContinueWindow(strURL)
{
  bAlert = false;
  document.passwdForm.action = strURL;
  document.passwdForm.submit();
}

/*
function ContinueWindow()
{
  ShowAuthElements();
  document.passwdForm.pin.focus();

  // Control si es pop-up
  if(window.opener!=null)
  {
    SetWindowVISA();
  }
}
*/

function ShowAuthElements()
{
  if(document.all.maintable2!=null)
  {document.all.maintable2.style.display="none";
  }
  
  if(document.all.maintable1!=null)
  {
   document.all.maintable1.style.display="block";
  }
}

function ShowIniElements()
{
  if(document.all.maintable2!=null)
  {document.all.maintable2.style.display="block";
  }
  
  if(document.all.maintable1!=null)
  {
  document.all.maintable1.style.display="none";
  }
}



function SetWindow()
{
  //var wMargin = 45;
  var wMargin = 35;
  var hMargin = 20;
  var titBar  = 25;
  var staBar  = 25;

  if(document.all.maintable1!=null)
  {
    if(document.all.maintable1.style.display=="block")
    {
        var capWidth  = document.getElementById("spacetable1").clientWidth;
        var capHeight = document.getElementById("maintable1").clientHeight;
        resizeTo(capWidth+wMargin,capHeight+hMargin+titBar+staBar);
    }
  }
  
  if(document.all.maintable2!=null)
  {
    if(document.all.maintable2.style.display=="block")
    {    
        var capWidth  = document.getElementById("spacetable2").clientWidth;
        var capHeight = document.getElementById("maintable2").clientHeight;
        resizeTo(capWidth+wMargin,capHeight+hMargin+titBar+staBar);
    }
  }
  
  //window.moveTo(100,100);
}

function SetWindowVISA()
{
  self.resizeTo(400,450);
}


function AlertBeforeUnload()
{
  if(bAlertBeforeUnload)
  {
    if(IsExplorerBrowser())
    { 
      return 'Su compra no se ha finalizado! Para terminar su compra pulse ahora "Cancelar" y proceda seg�n las indicaciones. Para salir y abortar la compra pulse "Aceptar".';    
    }
    else if(IsFirefoxBrowser())
    {
      return 'Su compra no se ha finalizado! Para terminar su compra pulse ahora "Cancelar" y proceda seg�n las indicaciones. Para salir y abortar la compra pulse "Aceptar".';
    }
    else if(IsChromeBrowser())
    {
      return 'Su compra no se ha finalizado! Para terminar su compra pulse ahora "Permanecer en esta p�gina" y proceda seg�n las indicaciones. Para salir y abortar la compra pulse "Abandonar esta p�gina".';
    }
    else if(IsSafariBrowser())
    {
      return 'Su compra no se ha finalizado! Para terminar su compra pulse ahora "Cancelar" y proceda seg�n las indicaciones. Para salir y abortar la compra pulse "Aceptar".';
    }  
    else
    {
      return 'Su compra no se ha finalizado! Para terminar su compra pulse ahora "Cancelar" y proceda seg�n las indicaciones. Para salir y abortar la compra pulse "Aceptar".'; 
    }
  }
}

function HelpWindow(strHelp, strCapLogo, strMemberLogo, strBankName, strBrandInfo, strBrandCES)
{
  var win = window.open(strHelp + "?CapLogo=" + strCapLogo + "&MemberLogo=" + strMemberLogo + "&BankName=" + escape(strBankName) + "&BrandInfo=" + escape(strBrandInfo) + "&BrandCES=" + escape(strBrandCES),"Help",
    "height=550,width=550,dependent=yes,scrollbars=yes,resizable=no,screenX=100,screenY=100,left=100,top=100");
}

function SecurityWindow(strSecurity, strCapLogo, strMemberLogo)
{
        var win = window.open(strSecurity + "?CapLogo=" + strCapLogo + "&MemberLogo=" + strMemberLogo, "Security" ,
        "height=480,width=550,dependent=yes,scrollbars=yes,resizable=no,screenX=100,screenY=100,left=100,top=100");
}

function RegisterWindow(URLBase,URLReg, TamX, TamY, strPANCifrado, strSendPan, strSendMethod)
{
  var parametro = "height=" + TamY + ",width=" + TamX + ",dependent=yes,scrollbars=yes,resizable=no,screenX=75,screenY=75,left=75,top=75";
  var win = window.open(URLBase +"?URLDemand=" + escape(URLReg) + "&PANCifrado=" + escape(strPANCifrado) + "&SendPanToRegister=" + escape(strSendPan) + "&SendMethod=" + escape(strSendMethod),"Register",parametro);
}


function IsNetscapeOnSolaris()
{
        var agent = window.navigator.userAgent;
        if (( agent.indexOf('Mozilla') != -1 ) && ( agent.indexOf('compatible') == -1 ))
        {
                if ( agent.indexOf('SunOS') != -1 )
                        return true;
                else
                        return false;
        }
        else
        {
                return false;
        }

        return false;
}

function OnCancelHandler()
{
        if ( navigator.appName == "Netscape" )
        {
                document.passwdForm.cancelar.href = "#";
        }

  document.passwdForm.enviar.value="CANCELAR";
  bAlert=false;

        if ( IsNetscapeOnSolaris() )
        {
                setTimeout('document.passwdForm.submit()', 500);
        }
        else
        {
                document.passwdForm.submit();
        }
  bAlert=true;
        return true;
}

function OnCancelar()
{

  document.passwdForm.enviar.value="CANCELAR";
  bAlert=false;

        if ( IsNetscapeOnSolaris() )
        {
                setTimeout('document.passwdForm.submit()', 500);
        }
        else
        {
                document.passwdForm.submit();
        }
  bAlert=true;
        return true;
}

function OnSubmitHandler()
{
  bAlert=true;
  if(document.passwdForm.pin.value == "" || document.passwdForm.pin.value == " ")
  {
    alert("Para confirmar el pago debe introducir su contrasenia.");
    return false;
  }
  if(document.passwdForm.submitted.value== 1)
  {
    return false;
  }
  else
  {
    bAlert=false;
    document.passwdForm.enviar.value="ACEPTAR";
    document.passwdForm.submitted.value = 1;
    document.passwdForm.submit();
    bAlert=true;
    return false;
  }
        return false;
}

function OnSubmitHandlerPassword()
{
  bAlert=true;
  if(document.passwdForm.pin.value == "" || document.passwdForm.pin.value == " ")
  {
    alert("Para confirmar el pago debe introducir su contrasenia.");
    return;
  }

  if(document.passwdForm.submitted.value== 1)
  {
    return;
  }
  else
  {
    bAlert=false;
    document.passwdForm.enviar.value="ACEPTAR";
    document.passwdForm.submitted.value = 1;
    document.passwdForm.submit();
    bAlert=true;
    return;
  }

}

function SetSubmit()
{
        document.passwdForm.submitted.value = 1;
}

function ResetSubmit()
{
        document.passwdForm.submitted.value = 0;
}

function ClearPin()
{
        document.passwdForm.pin.value = "";
        document.passwdForm.pin.focus();
}

function OnPageInit()
{
  window.history.go(1);
  ResetSubmit();

  BrowserDetect.init();
  
  if(document.all.maintable1!=null)
  {
    if(document.all.maintable1.style.display=="block")
    {
      document.passwdForm.pin.focus();
    }
  }
  
  // Si es pop-up ajustar� la ventana al contenido
  if(window.opener!=null)
  {
    SetWindow();
  }


}

function OnSubmitHandlerAttempts()
{
  bAlert=true;
  if(document.passwdForm.submitted.value== 1)
  {
    return;
  }
  else
  {
    bAlertBeforeUnload=false;    
    
    if(document.passwdForm.LastAttempt.value == "Y")
    {
      alert("AVISO:\n\n" + document.passwdForm.BankName.value +  " le permite\nexcepcionalmente terminar esta compra sin tener\nsu tarjeta registrada en Comercio Electrunico\nSeguro. Sin embargo, le informamos que para\npr�ximas compras utilizando su tarjeta en Internet\nser� imprescindible que registre previamente\nsu tarjeta en el sistema seguro.");
    }
    else
    {
      alert("AVISO:\n\n" + document.passwdForm.BankName.value +  " le permite\nexcepcionalmente terminar esta compra sin tener\nsu tarjeta registrada en Comercio Electrunico\nSeguro.\nLe informamos que lleva efectuadas " + (parseInt(document.passwdForm.LastAttempt.value)+1) + " compra/s\nsin registrarse.");
    }

    bAlert=false;
    document.passwdForm.enviar.value="ATTEMPT";
    document.passwdForm.submitted.value = 1;
    document.passwdForm.submit();
    bAlert=true;
    return;
  }
}

function ActiveRegSMS()
{
  document.passwdForm.regSMS.value="Y";
}

function IsExplorerBrowser()
{
  return (BrowserDetect.browser=="Explorer");
}

function IsFirefoxBrowser()
{
  return (BrowserDetect.browser=="Firefox");
}

function IsChromeBrowser()
{
  return (BrowserDetect.browser=="Chrome");
}

function IsSafariBrowser()
{
  return (BrowserDetect.browser=="Safari");
}
