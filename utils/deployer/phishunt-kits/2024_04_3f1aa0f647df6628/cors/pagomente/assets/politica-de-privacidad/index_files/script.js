"use strict";

// HEADER APPEARANCE ON SCROLL
// ===========================
document.addEventListener("scroll", function () {
  var header = document.getElementById("header");

  if (window.pageYOffset > 100) {
    header.classList.add("scrolled");
  } else {
    header.classList.remove("scrolled");
  }
});

function getCookie(name) {
  var v = document.cookie.match("(^|;) ?" + name + "=([^;]*)(;|$)");
  return v ? v[2] : null;
}

function setCookie(name, value, days) {
  var d = new Date();
  d.setTime(d.getTime() + 24 * 60 * 60 * 1000 * days);
  document.cookie = name + "=" + value + ";path=/;expires=" + d.toGMTString();
}

function deleteCookie(name) {
  setCookie(name, "", -1);
}

// accept method
function saveCookies () {
  var cookieToCheck = "pfs_cookies_accepted";
  var cookiesNotification = document.getElementById("cookies-notification");
  var cookiesMod = document.getElementById("cookies-modal-container");

  setCookie(cookieToCheck, "true", 7); // days
  cookiesNotification.classList.remove("visible");
  cookiesMod.classList.remove("visible");
}

// accept method
function rejectCookies () {
  var cookieToCheck = "pfs_cookies_accepted";
  var cookiesNotification = document.getElementById("cookies-notification");
  var cookiesMod = document.getElementById("cookies-modal-container");

  deleteCookie(cookieToCheck); // days
  cookiesNotification.classList.remove("visible");
  cookiesMod.classList.remove("visible");
}

function tecnical(cookie){
  if(cookie.checked){
    localStorage.setItem('tecnical', true);
  }else{
    localStorage.setItem('tecnical', false);
  }
}

function aceptGA(cookie) {
  if(cookie.checked){
    localStorage.setItem('traking', true);
  }else{
    localStorage.setItem('traking', false);
  }

}

function aceptComp(cookie){
  if(cookie.checked){
    localStorage.setItem('comp', true);
  }else{
    localStorage.setItem('comp', false);
  }
}

// AVOID SCROLL WHEN MENU IS OPENED
// ===============
var menu = document.getElementById("open-menu");
var closeMenu = document.getElementById("close-menu");
var root = document.documentElement;

menu.addEventListener("click", function () {
  root.classList.add("menu-opened");
});

closeMenu.addEventListener("click", function () {
  root.classList.remove("menu-opened");
});

// CAROUSEL 2 AXIS
// ===============
(function () {
  // TODO: manage multiple carousels of this type in one page
  // test if the carousel is there
  var carousel = document.querySelector(".carousel-2-axis");
  if (!carousel) return;

  var frameSwitch = carousel.getElementsByClassName("frame-switch")[0];
  var frameSwitchLabel = frameSwitch.querySelector(".visible-switch span");
  var texts = carousel.getElementsByClassName("texts-block")[0];

  // HELPER METHODS
  // calculate newFrame
  var nextFrame = function nextFrame() {
    var framesCount = 3;
    var currentFrame = carousel.dataset.currentFrame;


    return currentFrame == framesCount ? 1 : parseInt(currentFrame) + 1;
  };

  // change text of the switch
  var updateSwitch = function updateSwitch(frame) {
    frameSwitchLabel.innerText = frame + "/3";
  };

  // state updating method
  var updateFrame = function updateFrame(event) {
    var targetFrame = event.currentTarget.dataset.targetFrame == "null" ? event.currentTarget.dataset.targetFrame : event.target.dataset.targetFrame;

    if (typeof targetFrame != "undefined") {
      var newFrame = targetFrame !== "null" ? targetFrame : nextFrame();

      carousel.dataset.currentFrame = newFrame;
      updateSwitch(newFrame);
      forceRedraw(carousel);
    }
  };

  // user interactions events
  frameSwitch.addEventListener("click", updateFrame);
  texts.addEventListener("mouseover", updateFrame);

  // swipe support
  var triggerArea = carousel.querySelector(".images-block");

  var swipeManager = new Hammer.Manager(triggerArea, {
    touchAction: "auto",
    recognizers: [[Hammer.Pan, { direction: Hammer.DIRECTION_HORIZONTAL }]]
  });

  var swipeHandler = function swipeHandler(event) {
    var gesture = event.additionalEvent;

    var currentFrame = parseInt(carousel.dataset.currentFrame);

    if (event.isFinal && gesture == "panleft") {
      var _nextFrame = currentFrame < 3 ? currentFrame + 1 : 1;
      carousel.dataset.currentFrame = _nextFrame;
      updateSwitch(_nextFrame);
    }

    if (event.isFinal && gesture == "panright") {
      var _nextFrame2 = currentFrame > 1 ? currentFrame - 1 : 3;
      carousel.dataset.currentFrame = _nextFrame2;
      updateSwitch(_nextFrame2);
    }

    forceRedraw(carousel);
  };

  swipeManager.on("panleft", swipeHandler);
  swipeManager.on("panright", swipeHandler);
})();

// CAROUSEL BASIC
// not so basic in the end, includes overlay with videos :)
// ==============
(function () {
  // TODO: manage multiple carousels of this type in one page
  // test if the carousel is there
  var carousel = document.querySelector(".carousel-basic");
  if (!carousel) return;

  var frameSwitches = carousel.getElementsByClassName("frame-switches")[0];
  var controls = carousel.getElementsByClassName("controls")[0];
  var closeOverlayBtn = carousel.querySelector(".video-overlay .close-x");

  // update state
  var changeFrame = function changeFrame(e) {
    var targetFrame = e.target.dataset.targetFrame;


    if (typeof targetFrame != "undefined") {
      carousel.dataset.currentFrame = targetFrame;
    }
  };

  // display overlay
  var toggleOverlayState = function toggleOverlayState() {
    carousel.dataset.showOverlay = carousel.dataset.showOverlay === "false";
  };

  // start video
  var startVideo = function startVideo(video) {
    var videoSource = video.getAttribute("src");
    video.setAttribute("src", videoSource + "?autoplay=1");
  };
  // stop video
  var stopVideo = function stopVideo(video) {
    var videoSource = video.getAttribute("src");
    video.setAttribute("src", videoSource.split("?")[0]);
  };

  // user interactions events
  frameSwitches.addEventListener("click", function (e) {
    changeFrame(e);
    forceRedraw(carousel);
  });

  // swipe support
  var triggerArea = carousel.querySelector(".visuals-container");

  var swipeManager = new Hammer.Manager(triggerArea, {
    touchAction: "auto",
    recognizers: [[Hammer.Pan, { direction: Hammer.DIRECTION_HORIZONTAL }]]
  });

  var swipeHandler = function swipeHandler(event) {
    var gesture = event.additionalEvent;

    var currentFrame = parseInt(carousel.dataset.currentFrame);

    if (event.isFinal && gesture == "panleft") {
      carousel.dataset.currentFrame = currentFrame < 3 ? currentFrame + 1 : 1;
    }

    if (event.isFinal && gesture == "panright") {
      carousel.dataset.currentFrame = currentFrame > 1 ? currentFrame - 1 : 3;
    }
    forceRedraw(carousel);
  };

  swipeManager.on("panleft", swipeHandler);
  swipeManager.on("panright", swipeHandler);

  // show overlay
  controls.addEventListener("click", function (e) {
    //e.preventDefault();
    if (e.target.classList.contains("play")) {
      toggleOverlayState();
      var frame = carousel.dataset.currentFrame;
      var activePlayer = carousel.querySelector(".video-content iframe[data-frame-id=\"" + frame + "\"]");
      startVideo(activePlayer);
      forceRedraw(carousel);
      bodyScrollLock();
    }
  });
  // hide overlay
  closeOverlayBtn.addEventListener("click", function (e) {
    e.preventDefault();
    toggleOverlayState();
    var frame = carousel.dataset.currentFrame;
    var activePlayer = carousel.querySelector(".video-content iframe[data-frame-id=\"" + frame + "\"]");
    stopVideo(activePlayer);
    forceRedraw(carousel);
    bodyScrollLock();
  });
})();

// CAROUSEL ON WIRE
(function () {
  // TODO: manage multiple carousels of this type in one page
  // test if the carousel is there
  var carousel = document.querySelector(".carousel-on-wire");
  if (!carousel) return;

  // change frame
  var toggleProduct = function toggleProduct(targetProduct) {
    // const { targetProduct } = e.target.dataset;

    if (targetProduct) {
      // add transition class
      var transitionClass = targetProduct == "one" ? "from-two" : "from-one";

      carousel.classList.add(transitionClass);
      carousel.dataset.selectedProduct = targetProduct;

      // clean up
      setTimeout(function () {
        carousel.classList.remove("from-one");
        carousel.classList.remove("from-two");
      }, 1040);
    }
  };
  //  user interactions events
  carousel.addEventListener("click", function (event) {
    var targetProduct = event.target.dataset.targetProduct;

    toggleProduct(targetProduct);
  }, false);

  // swipe support
  var triggerAreaOne = carousel.querySelector(".card--one .card-image");
  var triggerAreaTwo = carousel.querySelector(".card--two .card-image");

  var swipeManagerOne = new Hammer.Manager(triggerAreaOne, {
    touchAction: "auto",
    recognizers: [[Hammer.Pan, { direction: Hammer.DIRECTION_HORIZONTAL }]]
  });

  var swipeManagerTwo = new Hammer.Manager(triggerAreaTwo, {
    touchAction: "auto",
    recognizers: [[Hammer.Pan, { direction: Hammer.DIRECTION_HORIZONTAL }]]
  });

  var swipeHandler = function swipeHandler(event) {
    var selectedProduct = carousel.dataset.selectedProduct;


    if (event.isFinal) {
      var nextFrame = selectedProduct === "one" ? "two" : "one";
      toggleProduct(nextFrame);
    }

    forceRedraw(carousel);
  };

  swipeManagerOne.on("pan", swipeHandler);
  swipeManagerTwo.on("pan", swipeHandler);
})();

// CAROUSEL ON MOBILE ONLY
(function () {
  var carousel = document.querySelector(".carousel-on-mobile");
  if (!carousel) return;

  var carouselSize = carousel.querySelectorAll("li").length;

  // switch frame
  var switchFrame = function switchFrame() {
    var activeFrame = carousel.dataset.activeFrame;

    var nextFrame = activeFrame < carouselSize ? parseInt(activeFrame) + 1 : 1;

    // update frame
    carousel.dataset.activeFrame = nextFrame;

    // update switch label
    if (carouselControlLabel) {
      carouselControlLabel.innerHTML = nextFrame + "/" + carouselSize;
    }
  };

  //  user interactions events
  var carouselControl = document.querySelector(".carousel-on-mobile + .frame-switch");

  var carouselControlLabel = carouselControl ? carouselControl.querySelector(".visible-switch span") : null;

  var internalCarouselControls = document.querySelectorAll(".carousel-on-mobile li .frame-switch");

  if (!internalCarouselControls.length) {
    carouselControl.addEventListener("click", switchFrame);
  } else {
    [].slice.call(internalCarouselControls).forEach(function (ctrl) {
      ctrl.addEventListener("click", function (event) {
        switchFrame(event);
      });
    });
  }

  // swipe support
  var triggerArea = carousel;

  var swipeManager = new Hammer.Manager(triggerArea, {
    touchAction: "auto",
    recognizers: [[Hammer.Pan, { direction: Hammer.DIRECTION_HORIZONTAL }]]
  });

  var swipeHandler = function swipeHandler(event) {
    var gesture = event.additionalEvent;

    var activeFrame = parseInt(carousel.dataset.activeFrame);

    // update switch label
    var updateSwitchLabel = function updateSwitchLabel(newFrame) {
      if (carouselControlLabel) {
        carouselControlLabel.innerHTML = newFrame + "/" + carouselSize;
      }
    };

    // update carousel
    var updateCarouselState = function updateCarouselState(newFrame) {
      carousel.dataset.activeFrame = newFrame;
    };

    if (event.isFinal && gesture == "panleft") {
      var newFrame = activeFrame < carouselSize ? activeFrame + 1 : 1;
      updateCarouselState(newFrame);
      updateSwitchLabel(newFrame);
    }

    if (event.isFinal && gesture == "panright") {
      var _newFrame = activeFrame > 1 ? activeFrame - 1 : carouselSize;
      updateCarouselState(_newFrame);
      updateSwitchLabel(_newFrame);
    }

    forceRedraw(carousel);
  };

  swipeManager.on("panleft", swipeHandler);
  swipeManager.on("panright", swipeHandler);
})();

// COMMUNITY MODULE
(function () {
  // test if the module is there
  var module = document.querySelector(".module-community");
  if (!module) return;

  // controls
  var gallery = module.getElementsByClassName("module-community__gallery")[0];
  var closeOverlayBtn = module.querySelector(".video-overlay .close-x");

  // overlay
  var videoOverlay = module.querySelector(".video-overlay");
  var videoOverlayBackdrop = module.querySelector(".video-overlay-backdrop");

  // events
  gallery.addEventListener("click", function (event) {
    var targetVideo = event.target.dataset.targetVideo;

    if (targetVideo) {
      module.dataset.selectedVideo = targetVideo;
      toggleOverlayState();
      var activePlayer = module.querySelector(".video-content iframe[data-frame-id=\"" + targetVideo + "\"]");
      forceRedraw(videoOverlay);
      forceRedraw(videoOverlayBackdrop);
      startVideo(activePlayer);
    }
  });

  closeOverlayBtn.addEventListener("click", function () {
    var selectedVideo = module.dataset.selectedVideo;

    toggleOverlayState();
    var activePlayer = module.querySelector(".video-content iframe[data-frame-id=\"" + selectedVideo + "\"]");
    forceRedraw(videoOverlay);
    forceRedraw(videoOverlayBackdrop);
    stopVideo(activePlayer);
  });

  // toggle overlay
  var toggleOverlayState = function toggleOverlayState() {
    module.dataset.showOverlay = module.dataset.showOverlay === "false";
  };
  // start video
  var startVideo = function startVideo(video) {
    var videoSource = video.getAttribute("src");
    video.setAttribute("src", videoSource + "?autoplay=1");
  };
  // stop video
  var stopVideo = function stopVideo(video) {
    var videoSource = video.getAttribute("src");
    video.setAttribute("src", videoSource.split("?")[0]);
  };
})();

// FAQ - Accordion items state manager
// ==================================
(function () {
  var accordion = document.querySelector(".faq-list");
  if (!accordion) return;

  // event handler methods
  var toggleItemState = function toggleItemState(item) {
    return item.classList.toggle("active");
  };

  var toggleAccordeonState = function toggleAccordeonState(_ref) {
    var target = _ref.target;

    var clickedItemIndex = target.dataset.itemIndex;
    var activeItem = accordion.querySelector(".accordion-item.active");

    if (!clickedItemIndex) {
      return;
    } else {
      var activeItemIndex = activeItem ? activeItem.dataset.itemIndex : -1;
      if (activeItem) toggleItemState(activeItem);
      if (clickedItemIndex != activeItemIndex) toggleItemState(target);
    }
  };

  // attach listener
  accordion.addEventListener("click", toggleAccordeonState);
})();

// FAQ - SIDE NAV MANAGER
// ================
(function () {
  var menu = document.querySelector(".side-nav");
  var headerOffset = 360;

  if (!menu) return;

  // scroll to section
  var scrollToSection = function scrollToSection(targetSection) {
    if (!targetSection) return;

    // scrolling into view
    var targetElement = document.getElementById(targetSection);

    // in case we change section name in the menu, but not the accordion
    if (!targetElement) throw new Error("Can find section '" + targetSection + "' on this page");

    // This uses a polyfill included in the faq.pug - https://github.com/iamdustan/smoothscroll
    // scroll to target element position minus offset of the sidebar nav
    window.scroll({
      top: targetElement.offsetTop - headerOffset,
      left: 0,
      behavior: "smooth"
    });
  };

  // update nav item state
  var changeActiveLink = function changeActiveLink(newTarget) {
    menu.querySelector(".custom-link.active").classList.remove("active");
    menu.querySelector(".custom-link[href=\"#" + newTarget + "\"]").classList.add("active");
  };

  // listeners
  menu.addEventListener("click", function (event) {
    event.preventDefault();
    var targetSection = event.target.dataset.targetSection;


    scrollToSection(targetSection);
    changeActiveLink(targetSection);
  });

  var sidebarScrollTimeout = void 0;

  window.addEventListener("scroll", function () {
    // sidebarScrollTimeout is used for debouncing scroll events

    // if there's a timer, cancel it
    if (sidebarScrollTimeout) {
      window.cancelAnimationFrame(sidebarScrollTimeout);
    }

    // set new timer
    sidebarScrollTimeout = window.requestAnimationFrame(function () {
      var sections = [].slice.call(document.querySelectorAll(".page-title")).map(function (el) {
        return {
          el: el.id,
          offset: el.offsetTop
        };
      });
      var lastSection = sections[sections.length - 1];
      var windowOffset = window.pageYOffset;
      var targetSection = null;

      if (windowOffset < sections[0].offset) {
        targetSection = sections[0].el;
      } else if (windowOffset + headerOffset >= lastSection.offset) {
        targetSection = lastSection.el;
      } else {
        var activeSection = sections.reduce(function (acc, section, idx, array) {
          if (windowOffset + headerOffset >= section.offset && windowOffset + headerOffset < array[idx + 1].offset) {
            acc = idx;
          }
          return acc;
        }, 0);

        targetSection = sections[activeSection].el;
      }

      if (targetSection) changeActiveLink(targetSection);

      // reposition nav menu
      var sidebar = document.querySelector(".sidebar");
      var sectionsHeight = document.querySelector(".content-page").scrollHeight;

      // at the bottom
      if (windowOffset > sectionsHeight - 100) {
        sidebar.classList.add("attached");
      } else {
        sidebar.classList.remove("attached");
      }

      // at the top
      if (windowOffset > 200) {
        sidebar.classList.add("fixed");
      } else {
        sidebar.classList.remove("fixed");
      }
    });
  });
})();

// AMINATIONS MANAGER
// looks for elements that have .is-animated class and
// adds .have-animated class once the element is above the page's trigger line
// ==================
(function () {
  //check that animated modules are present on the page
  var animatedModules = document.getElementsByClassName("is-animated");
  if (!animatedModules.length) return;

  // evaluation methods
  var evaluateElements = function evaluateElements() {
    [].slice.call(animatedModules).forEach(function (element) {
      if (isAboveTriggerLine(element) && element.getBoundingClientRect().top > 0) {
        element.classList.add("have-animated");
      }
    });
  };

  var isAboveTriggerLine = function isAboveTriggerLine(targetElement) {
    return targetElement.getBoundingClientRect().top < window.innerHeight * 0.86;
  };

  // on load
  evaluateElements();

  // on scroll
  var animationsScrollTimer = void 0; // <-- used for scroll events debouncing

  document.addEventListener("scroll", function () {
    // if there's a timer, cancel it
    if (animationsScrollTimer) {
      window.cancelAnimationFrame(animationsScrollTimer);
    }

    // set new timer
    animationsScrollTimer = window.requestAnimationFrame(evaluateElements);
  });
})();

// =======
// HELPERS
// =======

// Force Redraw
// IE11 doesn't redraw the page after DOM is manipulated by JS
var forceRedraw = function forceRedraw(element) {
  element.classList.add("force-redraw");
  setTimeout(function () {
    element.classList.remove("force-redraw");
  }, 100);
};

// Lock Body Scroll
var bodyScrollLock = function bodyScrollLock() {
  var htmlClasses = document.getElementsByTagName("html")[0].classList;

  // for regular browsers
  htmlClasses.toggle("scroll-lock");

  // for iOS browsers
  var isAppleDevice = function isAppleDevice() {
    return !!navigator.platform && /iPad|iPhone|iPod/.test(navigator.platform);
  };

  if (isAppleDevice) {
    // store scroll offset - document.body.scrollTop
    var currentScrollOffset = document.body.scrollTop;
    var savedScrollOffset = document.body.getAttribute("data-saved-scroll-offset");

    if (!savedScrollOffset || savedScrollOffset == "null") {
      document.body.setAttribute("data-saved-scroll-offset", currentScrollOffset);
      document.body.style.position = "fixed";
    } else {
      document.body.setAttribute("data-saved-scroll-offset", null);
      document.body.style.position = "relative";
      document.body.scrollTop = savedScrollOffset;
    }
  }
};

// Lazy Image Loading
// HOW-TO:
// add .lazy-image class to the <img> or the element on which background-image is set
// add src url in [data-src] attribute of that element
// leave standard [src] attribute on <img> tag empty

(function () {
  //check that lazy images are present on the page
  var lazyImages = [].slice.call(document.getElementsByClassName("lazy-image"));
  if (!lazyImages.length) return;

  var pixelsInAdvance = 160;

  // processing method
  var evaluateList = function evaluateList() {
    lazyImages.forEach(function (image, idx) {
      if (image != null && image.getBoundingClientRect().top > 0 && // display: none sets top to 0
      image.getBoundingClientRect().top < window.innerHeight + window.pageYOffset + pixelsInAdvance) {
        // <img>
        if (image.tagName == "IMG") {
          image.src = image.dataset.src;
          // <other-tags>
        } else {
          image.style.backgroundImage = "url(" + image.dataset.src + ")";
        }
        lazyImages[idx] = null; // remove image from the list once it's loaded
      }
    });
  };

  // on load
  evaluateList();

  // on scroll
  var animationsScrollTimer = void 0; // <-- used for scroll events debouncing

  document.addEventListener("scroll", function () {
    // if there's a timer, cancel it
    if (animationsScrollTimer) {
      window.cancelAnimationFrame(animationsScrollTimer);
    }

    // set new timer
    animationsScrollTimer = window.requestAnimationFrame(evaluateList);
  });
})();

function openConf(){
  var cookiesModContent = document.getElementById("cookies-content");
  var cookiesMod = document.getElementById("cookies-modal-container");
    cookiesModContent.classList.add("visible");
    cookiesMod.style.zIndex = 10000;
    cookiesMod.classList.add("visible");

}


// Cookies notfication manager
(function () {
  var cookieToCheck = "pfs_cookies_accepted";

  var check2 = document.getElementById('ch2');
  var check3 = document.getElementById('ch3');

  if(localStorage.getItem('tecnical') == 'true'){
    check2.checked = true;
  }else{
    check2.checked = false;
  }

  if(localStorage.getItem('traking') == 'true'){
    check3.checked = true;
  }else{
    check3.checked = false;
  }

  // methods
  var getCookie = function getCookie(name) {
    var v = document.cookie.match("(^|;) ?" + name + "=([^;]*)(;|$)");
    return v ? v[2] : null;
  };

  var setCookie = function setCookie(name, value, days) {
    var d = new Date();
    d.setTime(d.getTime() + 24 * 60 * 60 * 1000 * days);
    document.cookie = name + "=" + value + ";path=/;expires=" + d.toGMTString();
  };

  var deleteCookie = function deleteCookie(name) {
    setCookie(name, "", -1);
  };

  var closeModal = function closeModal(){
    var cookiesModContent = document.getElementById("cookies-content");
    var cookiesMod = document.getElementById("cookies-modal-container");
    if(cookiesModContent.classList.contains("visible")){
      cookiesModContent.classList.remove("visible");
      cookiesMod.style.zIndex = 0;
      cookiesMod.classList.remove("visible");
    }
  }

  var nothing = function nothing($event){
    console.log($event);
  }

  // validation pages management
  // by default add cookie on all pages unles <main> has .no-cookies class
  var classList = document.getElementsByTagName("main")[0].classList;

  if ([].slice.call(classList).indexOf("no-cookies") != -1) {
    deleteCookie(cookieToCheck);
  } /* BUG FIX: Cookie setted without check, remove else branch
	else {
    setCookie(cookieToCheck, "true", 7);
  }*/
  // check if cookies are accepted
  var cookiesAccepted = getCookie(cookieToCheck);
  var cookiesNotification = document.getElementById("cookies-notification");
  var cookiesMod = document.getElementById("cookies-modal-container");
  var cookiesModBg = document.getElementById("cookies-modal-bg");
  var cookiesModBack = document.getElementById("cookies-modal");
  var cookiesModContent = document.getElementById("cookies-content");

  cookiesModBg.addEventListener("click", closeModal, false);

  if (!cookiesAccepted) {
    cookiesNotification.classList.add("visible");
    //cookiesMod.classList.add("visible");

  }

  // accept method
  cookiesNotification.querySelector("#accept-cookies").addEventListener("click", function () {
    setCookie(cookieToCheck, "true", 7); // days
    cookiesNotification.classList.remove("visible");
    cookiesMod.classList.remove("visible");
  });
  
  //config button 
  cookiesNotification.querySelector("#manage-cookies").addEventListener("click", function () {
    cookiesMod.classList.add("visible");
    cookiesModContent.classList.add("visible");
    cookiesMod.style.zIndex = "9999";
  });

  if(document.querySelector(".config-cookies-btn") != null){
    //config button statics pages
    document.querySelector(".config-cookies-btn").addEventListener("click", function () {
      //cookiesMod.classList.add("visible");
      cookiesModContent.classList.add("visible");
    });
  }

})();

(function (){

  var radioButton = document.getElementsByName("privacy-radio-options");
  radioButton[0].addEventListener("click", function () {
    console.log('todos');

    var rad1 = document.getElementsByName("item1-radio-options")
    var rad2 = document.getElementsByName("item2-radio-options")
    var rad3 = document.getElementsByName("item3-radio-options")
    var rad4 = document.getElementsByName("item4-radio-options")

    rad1[0].checked = true;
    rad2[0].checked = true;
    rad3[0].checked = true;
    rad4[0].checked = true;


  });

  radioButton[2].addEventListener("click", function () {

    var rad1 = document.getElementsByName("item1-radio-options")
    var rad2 = document.getElementsByName("item2-radio-options")
    var rad3 = document.getElementsByName("item3-radio-options")
    var rad4 = document.getElementsByName("item4-radio-options")

    rad1[1].checked = true;
    rad2[1].checked = true;
    rad3[1].checked = true;
    rad4[1].checked = true;
  });
  console.log(radioButton);



})();



// Input pattern Manager
// HOW-TO:
// add [data-input-pattern] prop to any input its value should be in patterns object
// add more regex patterns as needed
(function () {
  //check that inputs with pattern are present on the page
  var inputsWithPattern = document.querySelectorAll("[data-input-pattern]");
  if (!inputsWithPattern.length) return;

  // method
  function setInputFilter(textbox, inputFilter) {
    ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function (event) {
      textbox.addEventListener(event, function () {
        if (inputFilter(this.value)) {
          this.oldValue = this.value;
          this.oldSelectionStart = this.selectionStart;
          this.oldSelectionEnd = this.selectionEnd;
        } else if (this.hasOwnProperty("oldValue")) {
          this.value = this.oldValue;
          this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
        }
      });
    });
  }

  // validation patterns
  var patterns = {
    five_integers: function five_integers(value) {
      return (/^\d{0,5}$/.test(value)
      );
    }
  };

// add listeners
  [].slice.call(inputsWithPattern).forEach(function (input) {
    var inputPattern = input.dataset.inputPattern;

    if (typeof patterns[inputPattern] != "undefined") {
      setInputFilter(input, patterns[inputPattern]);
    } else {
      console.error("Input pattern '" + inputPattern + "' is not defined");
    }
  });
})();
