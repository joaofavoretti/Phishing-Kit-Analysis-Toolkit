agent = navigator.userAgent;
is_ie5up = 0;
browserOK = 0;
richCapable = true;
if (navigator.appName == "Netscape" && navigator.appVersion.substring(0, 1) >= 2) {
    browserOK = 1
} else {
    if (navigator.appName == "Microsoft Internet Explorer") {
        if (navigator.appVersion.substring(0, 1) >= 4) {
            browserOK = 1
        }
        if (navigator.appVersion.substring(0, 1) >= 5) {
            is_ie5up = 1
        }
    }
}
if (typeof Array.prototype.push == "undefined") {
    Array.prototype.push = function() {
        b = this.length;
        a = arguments;
        for (var i = 0; i < a.length; i++) {
            this[b + i] = a[i]
        }
        return this.length
    }
}

function popup(url) {
    agent = navigator.userAgent;
    windowName = "Help";
    params = "toolbar=0,location=0,directories=0,status=0,";
    params += "menubar=0,scrollbars=1,resizable=1,width=675,";
    params += "height=400";
    win = window.open(url, windowName, params);
    if (agent.indexOf("Mozilla/2") != -1 && agent.indexOf("Win") == -1) {
        win = window.open(url, windowName, params)
    }
    if (!win.opener) {
        win.opener = window
    }
}

function tapopup(url) {
    SpamBlockerCtrl.OpenWindowURL(url, "", "HEIGHT=470,WIDTH=650,scrollbars,resizable")
}

function updateTabs(num) {
    SpamBlockerCtrl.OnTabClicked(num)
}

function closewin(millis) {
    if (millis == 0) {
        top.close()
    } else {
        self.setTimeout("closewin(0)", millis)
    }
}

function lTrim(str) {
    var whitespace = new String(" \t\n\r");
    var s = new String(str);
    if (whitespace.indexOf(s.charAt(0)) != -1) {
        var j = 0,
            i = s.length;
        while (j < i && whitespace.indexOf(s.charAt(j)) != -1) {
            j++
        }
        s = s.substring(j, i)
    }
    return s
}

function rTrim(str) {
    var whitespace = new String(" \t\n\r");
    var s = new String(str);
    if (whitespace.indexOf(s.charAt(s.length - 1)) != -1) {
        var i = s.length - 1;
        while (i >= 0 && whitespace.indexOf(s.charAt(i)) != -1) {
            i--
        }
        s = s.substring(0, i + 1)
    }
    return s
}

function trim(str) {
    return rTrim(lTrim(str))
}

function createRequest() {
    var request;
    try {
        request = new XMLHttpRequest()
    } catch (trymicrosoft) {
        try {
            request = new ActiveXObject("Msxml2.XMLHTTP")
        } catch (othermicrosoft) {
            try {
                request = new ActiveXObject("Microsoft.XMLHTTP")
            } catch (failed) {
                request = false
            }
        }
    }
    if (!request) {
        richCapable = false
    } else {
        return request
    }
}

function composeLoaded() {
    var myca = document.getElementById("compose_attachments");
    var myattf = document.getElementById("attach_file");
    if (myca) {
        var attHandler60 = new msgAttachHandler(myca);
        attHandler60.newAttachButton(myattf)
    }
}

function makeAsyncRequest(url, div) {
    var request = createRequest();
    request.open("GET", url, true);
    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            if (request.status == 200) {
                if (document.getElementById(div)) {
                    document.getElementById(div).innerHTML = request.responseText;
                    if (div == "webmail_compose") {
                        composeLoaded()
                    }
                }
            } else {
                if (request.status == 404) {} else {}
            }
        }
    };
    request.send(null)
}

function join_objects() {
    var x = [];
    for (var i = 0; arguments && i < arguments.length; i++) {
        for (var k in arguments[i]) {
            x[k] = arguments[i][k]
        }
    }
    return x
}

function expiresdate() {
    var exp = new Date();
    exp.setTime(exp.getTime() + 31536000);
    return exp.toGMTString()
}
var TREE2_TPL = {
    target: "_self",
    cookie_ext: "expires=" + expiresdate() + ";",
    icon_48: "/wam/images/earthlink/icon_tf.gif",
    icon_52: "/wam/images/earthlink/icon_tf.gif",
    icon_56: "/wam/images/earthlink/icon_tf.gif",
    icon_60: "/wam/images/earthlink/icon_tf.gif",
    icon_16: "/wam/images/earthlink/icon_fld.gif",
    icon_20: "/wam/images/earthlink/icon_fld.gif",
    icon_24: "/wam/images/earthlink/icon_fldo.gif",
    icon_28: "/wam/images/earthlink/icon_fldo.gif",
    icon_80: "/wam/images/earthlink/icon_fldo.gif",
    icon_0: "/wam/images/earthlink/icon_fld.gif",
    icon_4: "/wam/images/earthlink/icon_fldo.gif",
    icon_2: "/wam/images/earthlink/icons/joinbottom.gif",
    icon_3: "/wam/images/earthlink/icons/join.gif",
    icon_18: "/wam/images/earthlink/icons/plusbottom.gif",
    icon_19: "/wam/images/earthlink/icons/plus.gif",
    icon_26: "/wam/images/earthlink/icons/minusbottom.gif",
    icon_27: "/wam/images/earthlink/icons/minus.gif",
    b_rootcollapse: true,
    icon_50: "/wam/images/earthlink/icons/rplus.gif",
    icon_51: "/wam/images/earthlink/icons/rplus.gif",
    icon_58: "/wam/images/earthlink/icons/rminus.gif",
    icon_59: "/wam/images/earthlink/icons/rminus.gif",
    icon_e: "/wam/images/earthlink/icons/empty.gif",
    icon_l: "/wam/images/earthlink/icons/line.gif",
    style_48: "mout2",
    style_52: "mout2",
    style_56: "mout2",
    style_60: "mout2",
    style_112: "mover2",
    style_116: "mover2",
    style_120: "mover2",
    style_124: "mover2",
    style_16: "mout2",
    style_20: "mout2",
    style_24: "mout2",
    style_28: "mout2",
    style_80: "mover2",
    style_84: "mover2",
    style_88: "mover2",
    style_92: "mover2",
    style_0: "mout2",
    style_4: "mout2",
    style_64: "mover2",
    style_68: "mover2"
};
var iconset_suspect = {
    i0: "/wam/images/earthlink/icon_susp.gif",
    i4: "/wam/images/earthlink/icon_susp.gif",
    i64: "/wam/images/earthlink/icon_susp.gif",
    i68: "/wam/images/earthlink/icon_susp.gif"
};
var iconset_spam = {
    i0: "/wam/images/earthlink/icon_spam.gif",
    i4: "/wam/images/earthlink/icon_spam.gif",
    i64: "/wam/images/earthlink/icon_spam.gif",
    i68: "/wam/images/earthlink/icon_spam.gif"
};
var iconset_sent_spam = {
    i0: "/wam/images/earthlink/icon_spam.gif",
    i4: "/wam/images/earthlink/icon_spam.gif",
    i64: "/wam/images/earthlink/icon_spam.gif",
    i68: "/wam/images/earthlink/icon_spam.gif"
};
var iconset_inbox = {
    i0: "/wam/images/earthlink/icon_in.gif",
    i4: "/wam/images/earthlink/icon_in.gif",
    i64: "/wam/images/earthlink/icon_in.gif",
    i68: "/wam/images/earthlink/icon_in.gif"
};
var iconset_sent = {
    i0: "/wam/images/earthlink/icon_sent.gif",
    i4: "/wam/images/earthlink/icon_sent.gif",
    i64: "/wam/images/earthlink/icon_sent.gif",
    i68: "/wam/images/earthlink/icon_sent.gif"
};
var iconset_drafts = {
    i0: "/wam/images/earthlink/icon_dft.gif",
    i4: "/wam/images/earthlink/icon_dft.gif",
    i64: "/wam/images/earthlink/icon_dft.gif",
    i68: "/wam/images/earthlink/icon_dft.gif"
};
var iconset_trash = {
    i0: "/wam/images/earthlink/icon_del.gif",
    i4: "/wam/images/earthlink/icon_del.gif",
    i64: "/wam/images/earthlink/icon_del.gif",
    i68: "/wam/images/earthlink/icon_del.gif"
};
var iconset_oldmail = {
    i0: "/wam/images/earthlink/icon_oldmail.gif",
    i4: "/wam/images/earthlink/icon_oldmail.gif",
    i64: "/wam/images/earthlink/icon_oldmail.gif",
    i68: "/wam/images/earthlink/icon_oldmail.gif"
};

function msgMoreActions(id) {
    var selObject = document.getElementById(id);
    var value = selObject.options[selObject.selectedIndex].value;
    selObject[0].selected = true;
    if (value == "") {
        return false
    } else {
        var start = 0;
        if (value.indexOf("|") != "") {
            start = value.indexOf("|") + 1
        }
        var url = value.substring(start);
        if (value.match("_blank")) {
            window.open(url, "_blank")
        } else {
            if (value.match("_top")) {
                window.open(url, "_top")
            } else {
                window.open(url, "_self")
            }
        }
    }
}

function msgActionsSelector(id, url, name) {
    var selObject = document.getElementById(id);
    var value = selObject.options[selObject.selectedIndex].value;
    url = url + "&" + name + "=" + value;
    selObject[0].selected = true;
    if (value == "") {
        return false
    } else {
        window.open(url, target = "_top")
    }
}

function msgAttachHandler(target) {
    this.target = target;
    this.numAttach = 0;
    this.separator = "; ";
    this.newAttachButton = function(e, linktarget, linkconfirm) {
        if (e.tagName == "INPUT" && e.type == "file") {
            e.name = "attach" + this.numAttach;
            e.handler = this;
            this.numAttach++;
            this.current = e;
            e.onchange = function() {
                var e2 = document.createElement("input");
                e2.type = "file";
                e2.onkeypress = function() {
                    return false
                };
                this.parentNode.appendChild(e2);
                this.handler.newAttachButton(e2);
                this.handler.addAttachment(this);
                this.style.position = "absolute";
                this.style.left = "-1500px"
            }
        }
        if (e.tagName == "INPUT" && e.type == "checkbox") {
            e.handler = this;
            this.current = e;
            this.numAttach++;
            this.addAttachment(e, linktarget, linkconfirm)
        }
    };
    this.reset = function() {
        var daddy = this.target;
        while (daddy.hasChildNodes()) {
            var kid = daddy.firstChild;
            if (kid.thefile != null) {
                if (daddy.firstChild != daddy.lastChild) {
                    var f = kid.thefile;
                    f.parentNode.removeChild(f)
                } else {
                    var f = kid.thefile;
                    f.value = "";
                    f.style.position = "";
                    f.style.left = ""
                }
            }
            daddy.removeChild(kid)
        }
    };
    this.addAttachment = function(e, linktarget, linkconfirm) {
        var li = document.createElement("span");
        li.className = "file";
        li.thefile = e;
        var remove = document.createElement("a");
        remove.className = "remove";
        var removeText = document.createTextNode("Remove");
        remove.appendChild(removeText);
        if (e.type == "file") {
            remove.onclick = function() {
                var myfile = this.parentNode.thefile;
                var myli = this.parentNode;
                myfile.handler.zapFilename(myli);
                myfile.parentNode.removeChild(myfile);
                myfile.handler.numAttach--;
                return false
            }
        }
        if (e.type == "checkbox") {
            remove.onclick = function() {
                var myfile = this.parentNode.thefile;
                var myli = this.parentNode;
                myfile.handler.zapFilename(myli);
                myfile.checked = false;
                myfile.handler.numAttach--;
                return false
            }
        }
        var nametxt = document.createTextNode(basename(e.value));
        if (linktarget) {
            var linka = document.createElement("a");
            linka.setAttribute("target", "_blank");
            linka.setAttribute("href", linktarget);
            linka.setAttribute("class", "file");
            linka.appendChild(nametxt);
            linka.onclick = linkconfirm ? linkconfirm : (function() {
                return true
            });
            li.appendChild(linka)
        } else {
            li.appendChild(nametxt)
        }
        li.appendChild(remove);
        this.target.appendChild(document.createTextNode(this.separator));
        this.target.appendChild(li);
        this.zapFilename(null);
        this.target.className = "";
        return li
    };
    this.confirmAttachClick = function(e) {
        return true
    };
    this.zapFilename = function(node) {
        if (node) {
            var semi = node.previousSibling;
            if ((semi) && (semi.nodeType == 3) && (semi.nodeValue == this.separator)) {
                semi.parentNode.removeChild(semi)
            }
            node.parentNode.removeChild(node)
        }
        var first = this.target.firstChild;
        if (first && (first.nodeType == 3) && (first.nodeValue == this.separator)) {
            first.parentNode.removeChild(first)
        }
    };
    this.target.handler = this
}

function basename(str) {
    var lastslash = -1;
    var av = navigator.appVersion.toUpperCase();
    if (av.indexOf("WIN") >= 0) {
        lastslash = str.lastIndexOf("\\")
    } else {
        lastslash = str.lastIndexOf("/")
    }
    var ret = str;
    if (lastslash > 0) {
        ret = str.substring(lastslash + 1)
    }
    return ret
}

function statusMessage(kind, msg) {
    this.defaultOpacity = this.opacity = 90;
    this.delta = 5;
    this.eventList = ["mousedown", "keydown", "mousemove"];
    this.originalX = this.originalY = 0;
    this.vanish = function(evt) {
        if (!evt) {
            var evt = window.event
        }
        if (evt.type == "mousemove") {
            var x = evt.screenX;
            var y = evt.screenY;
            if ((this.originalX == 0) && (this.originalY == 0)) {
                this.originalX = x;
                this.originalY = y;
                return false
            }
            if ((Math.abs(this.originalX - x) < 8) && (Math.abs(this.originalY - y) < 8)) {
                return false
            }
        }
        this.ignoreEvents();
        this.originalX = this.originalY = 0;
        this.fade()
    };
    this.fade = function() {
        if (this.element) {
            this.element.style.opacity = this.opacity / 100;
            this.element.style.MozOpacity = this.opacity / 100;
            this.element.style.KhtmlOpacity = this.opacity / 100;
            this.element.style.filter = "alpha(opacity=" + this.opacity + ")";
            this.opacity = this.opacity - this.delta;
            if (this.opacity > 10) {
                var myfn = createMethodReference(this, "fade");
                setTimeout(myfn, 30)
            } else {
                this.nuke()
            }
        }
    };
    this.resetOpacity = function() {
        this.opacity = this.defaultOpacity;
        this.element.style.opacity = this.defaultOpacity / 100;
        this.element.style.MozOpacity = this.defaultOpacity / 100;
        this.element.style.KhtmlOpacity = this.defaultOpacity / 100;
        this.element.style.filter = "alpha(opacity=" + this.defaultOpacity + ")"
    };
    this.ignoreEvents = function() {
        for (var i in this.eventList) {
            var evt = this.eventList[i];
            if (window.removeEventListener) {
                window.removeEventListener(evt, this.eventHandler, false)
            } else {
                if (window.detachEvent) {
                    document.body.detachEvent("on" + evt, this.eventHandler)
                }
            }
        }
    };
    this.awaitEvents = function() {
        this.eventHandler = createMethodReference(this, "vanish");
        for (var i in this.eventList) {
            var evt = this.eventList[i];
            if (window.addEventListener) {
                window.addEventListener(evt, this.eventHandler, false)
            } else {
                if (window.attachEvent) {
                    document.body.attachEvent("on" + evt, this.eventHandler)
                }
            }
        }
    };
    this.nuke = function() {
        try {
            this.ignoreEvents()
        } catch (e) {}
        this.element.parentNode.removeChild(this.element)
    };
    var div = document.createElement("div");
    div.className = "msgbox60 " + kind + "Box60";
    this.element = div;
    var round = document.createElement("div");
    round.className = "msgbox60round";
    var p = document.createElement("p");
    var txt1 = document.createTextNode(msg);
    p.appendChild(txt1);
    div.appendChild(round);
    div.appendChild(p);
    div.appendChild(round.cloneNode(false));
    var msgCenter = document.getElementById("msgCenter60");
    if (msgCenter != null) {
        msgCenter.appendChild(div)
    } else {
        document.body.appendChild(div)
    }
    var ypos = getScrollHeight() + 135;
    div.style.top = ypos + "px";
    this.resetOpacity();
    if (kind == "info") {
        infoMsgRef = this
    } else {
        if (kind == "error") {
            errorMsgRef = this
        }
    }
    setTimeout("clearMsg('" + kind + "')", 5000);
    this.awaitEvents()
}
var infoMsgRef = null;
var errorMsgRef = null;

function clearMsg(kind) {
    if (kind == "info" && infoMsgRef != null) {
        infoMsgRef.fade();
        infoMsgRef = null
    } else {
        if (kind == "error" && errorMsgRef != null) {
            errorMsgRef.fade();
            errorMsgRef = null
        }
    }
}

function createMethodReference(object, method) {
    return function() {
        object[method].apply(object, arguments)
    }
}

function aeaChangeSignature(fromSelect) {
    if (fromSelect === null) {
        fromSelect = document.getElementById("composeFromAddresses")
    }
    if (fromSelect !== null && fromSelect !== undefined) {
        try {
            var fromOptions = fromSelect.options;
            var foundDefaultAddress = false;
            for (var i = 0; i < fromOptions.length; i++) {
                var option = fromOptions[i];
                if (foundDefaultAddress == true) {
                    break
                }
                if (option.id == "defaultFromAddress" && option.selected == true) {
                    for (j = 0; j < document.getElementsByName("signatureid").length; j++) {
                        var signaturesSelect = document.getElementsByName("signatureid")[j];
                        for (k = 0; k < signaturesSelect.options.length; k++) {
                            var signatureOption = signaturesSelect.options[k];
                            if (signatureOption.id == "defaultSignature") {
                                signatureOption.selected = true;
                                foundDefaultAddress = true;
                                break
                            }
                        }
                    }
                } else {
                    for (j = 0; j < document.getElementsByName("signatureid").length; j++) {
                        var signaturesSelect = document.getElementsByName("signatureid")[j];
                        signaturesSelect.options[0].selected = true
                    }
                }
            }
        } catch (error) {}
    }
}

function isNodeDescendentOfNode(node, parentNode) {
    var result = false;
    if (node != null && parentNode != null) {
        if (node.parentNode == parentNode) {
            result = true
        } else {
            result = isNodeDescendentOfNode(node.parentNode, parentNode)
        }
    }
    return result
}

function getScrollHeight() {
    var y = 0;
    if (typeof(window.pageYOffset) == "number") {
        y = window.pageYOffset
    } else {
        if (document.body && document.body.scrollTop) {
            y = document.body.scrollTop
        } else {
            if (document.documentElement && document.documentElement.scrollTop) {
                y = document.documentElement.scrollTop
            }
        }
    }
    return y
}

function getScrollXY() {
    var scrOfX = 0,
        scrOfY = 0;
    if (typeof(window.pageYOffset) == "number") {
        scrOfY = window.pageYOffset;
        scrOfX = window.pageXOffset
    } else {
        if (document.body && (document.body.scrollLeft || document.body.scrollTop)) {
            scrOfY = document.body.scrollTop;
            scrOfX = document.body.scrollLeft
        } else {
            if (document.documentElement && (document.documentElement.scrollLeft || document.documentElement.scrollTop)) {
                scrOfY = document.documentElement.scrollTop;
                scrOfX = document.documentElement.scrollLeft
            }
        }
    }
    return [scrOfX, scrOfY]
}

function getWindowSize() {
    var myWidth = 0,
        myHeight = 0;
    if (typeof(window.innerWidth) == "number") {
        myWidth = window.innerWidth;
        myHeight = window.innerHeight
    } else {
        if (document.documentElement && (document.documentElement.clientWidth || document.documentElement.clientHeight)) {
            myWidth = document.documentElement.clientWidth;
            myHeight = document.documentElement.clientHeight
        } else {
            if (document.body && (document.body.clientWidth || document.body.clientHeight)) {
                myWidth = document.body.clientWidth;
                myHeight = document.body.clientHeight
            }
        }
    }
    return [myWidth, myHeight]
}

function sizePreviewIFrame() {
    alert("window height = " + getWindowSize()[1]);
    var iframeElement = document.getElementById("iePreview60");
    if (iframeElement) {
        var newHeight = getWindowSize()[1] + getScrollXY()[1] - 100;
        if (newHeight > 200) {
            iframeElement.height = newHeight
        }
    } else {
        alert("iframeElement is null")
    }
};