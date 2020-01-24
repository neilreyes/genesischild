/******/ (function(modules) { // webpackBootstrap
/******/ 	// install a JSONP callback for chunk loading
/******/ 	function webpackJsonpCallback(data) {
/******/ 		var chunkIds = data[0];
/******/ 		var moreModules = data[1];
/******/ 		var executeModules = data[2];
/******/
/******/ 		// add "moreModules" to the modules object,
/******/ 		// then flag all "chunkIds" as loaded and fire callback
/******/ 		var moduleId, chunkId, i = 0, resolves = [];
/******/ 		for(;i < chunkIds.length; i++) {
/******/ 			chunkId = chunkIds[i];
/******/ 			if(installedChunks[chunkId]) {
/******/ 				resolves.push(installedChunks[chunkId][0]);
/******/ 			}
/******/ 			installedChunks[chunkId] = 0;
/******/ 		}
/******/ 		for(moduleId in moreModules) {
/******/ 			if(Object.prototype.hasOwnProperty.call(moreModules, moduleId)) {
/******/ 				modules[moduleId] = moreModules[moduleId];
/******/ 			}
/******/ 		}
/******/ 		if(parentJsonpFunction) parentJsonpFunction(data);
/******/
/******/ 		while(resolves.length) {
/******/ 			resolves.shift()();
/******/ 		}
/******/
/******/ 		// add entry modules from loaded chunk to deferred list
/******/ 		deferredModules.push.apply(deferredModules, executeModules || []);
/******/
/******/ 		// run deferred modules when all chunks ready
/******/ 		return checkDeferredModules();
/******/ 	};
/******/ 	function checkDeferredModules() {
/******/ 		var result;
/******/ 		for(var i = 0; i < deferredModules.length; i++) {
/******/ 			var deferredModule = deferredModules[i];
/******/ 			var fulfilled = true;
/******/ 			for(var j = 1; j < deferredModule.length; j++) {
/******/ 				var depId = deferredModule[j];
/******/ 				if(installedChunks[depId] !== 0) fulfilled = false;
/******/ 			}
/******/ 			if(fulfilled) {
/******/ 				deferredModules.splice(i--, 1);
/******/ 				result = __webpack_require__(__webpack_require__.s = deferredModule[0]);
/******/ 			}
/******/ 		}
/******/
/******/ 		return result;
/******/ 	}
/******/
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// object to store loaded and loading chunks
/******/ 	// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 	// Promise = chunk loading, 0 = chunk loaded
/******/ 	var installedChunks = {
/******/ 		0: 0
/******/ 	};
/******/
/******/ 	var deferredModules = [];
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	var jsonpArray = window["webpackJsonp"] = window["webpackJsonp"] || [];
/******/ 	var oldJsonpFunction = jsonpArray.push.bind(jsonpArray);
/******/ 	jsonpArray.push = webpackJsonpCallback;
/******/ 	jsonpArray = jsonpArray.slice();
/******/ 	for(var i = 0; i < jsonpArray.length; i++) webpackJsonpCallback(jsonpArray[i]);
/******/ 	var parentJsonpFunction = oldJsonpFunction;
/******/
/******/
/******/ 	// add entry module to deferred list
/******/ 	deferredModules.push([24,1]);
/******/ 	// run deferred modules when ready
/******/ 	return checkDeferredModules();
/******/ })
/************************************************************************/
/******/ ([
/* 0 */,
/* 1 */,
/* 2 */,
/* 3 */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "fonts/lg.eot";

/***/ }),
/* 4 */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "images/lg.svg";

/***/ }),
/* 5 */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "fonts/lg.ttf";

/***/ }),
/* 6 */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "fonts/lg.woff";

/***/ }),
/* 7 */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "images/icon-sprites.svg";

/***/ }),
/* 8 */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "images/loading.gif";

/***/ }),
/* 9 */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "images/logo.svg";

/***/ }),
/* 10 */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "images/video-play.png";

/***/ }),
/* 11 */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "images/youtube-play.png";

/***/ }),
/* 12 */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(13);

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(14)(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),
/* 13 */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),
/* 14 */,
/* 15 */,
/* 16 */
/***/ (function(module, exports) {

var initAccordion = function initAccordion() {
  var tabPanel = document.getElementsByClassName("accord-entry");
  var i;

  for (i = 0; i < tabPanel.length; i++) {
    tabPanel[i].addEventListener("click", function () {
      this.toggleAttribute("active");
    });
  }
};

window.addEventListener("DOMContentLoaded", initAccordion);

/***/ }),
/* 17 */,
/* 18 */,
/* 19 */,
/* 20 */,
/* 21 */,
/* 22 */,
/* 23 */
/***/ (function(module, exports) {



/***/ }),
/* 24 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);

// EXTERNAL MODULE: ./assets/src/fonts/lg.eot
var lg = __webpack_require__(3);

// EXTERNAL MODULE: ./assets/src/fonts/lg.svg
var fonts_lg = __webpack_require__(4);

// EXTERNAL MODULE: ./assets/src/fonts/lg.ttf
var src_fonts_lg = __webpack_require__(5);

// EXTERNAL MODULE: ./assets/src/fonts/lg.woff
var assets_src_fonts_lg = __webpack_require__(6);

// EXTERNAL MODULE: ./assets/src/images/icon-sprites.svg
var icon_sprites = __webpack_require__(7);

// EXTERNAL MODULE: ./assets/src/images/loading.gif
var loading = __webpack_require__(8);

// EXTERNAL MODULE: ./assets/src/images/logo.svg
var logo = __webpack_require__(9);

// EXTERNAL MODULE: ./assets/src/images/video-play.png
var video_play = __webpack_require__(10);

// EXTERNAL MODULE: ./assets/src/images/youtube-play.png
var youtube_play = __webpack_require__(11);

// EXTERNAL MODULE: ./assets/src/styles/main.scss
var main = __webpack_require__(12);

// EXTERNAL MODULE: ./assets/src/scripts/accordion.js
var accordion = __webpack_require__(16);

// EXTERNAL MODULE: ./node_modules/jquery/dist/jquery.js
var jquery = __webpack_require__(0);
var jquery_default = /*#__PURE__*/__webpack_require__.n(jquery);

// EXTERNAL MODULE: ./node_modules/lightGallery/dist/js/lightgallery.js
var lightgallery = __webpack_require__(17);

// EXTERNAL MODULE: ./node_modules/lg-video/dist/lg-video.js
var lg_video = __webpack_require__(18);

// CONCATENATED MODULE: ./assets/src/scripts/lightgallery.js


window.$ = jquery_default.a;
window.jQuery = jquery_default.a;


jquery_default()("#lightgallery").lightGallery({
  selector: ".lightbox",
  youtubePlayerParams: {
    modestbranding: 1,
    showinfo: 0,
    rel: 0,
    controls: 0
  }
});
// EXTERNAL MODULE: ./node_modules/slideout/index.js
var node_modules_slideout = __webpack_require__(1);
var slideout_default = /*#__PURE__*/__webpack_require__.n(node_modules_slideout);

// CONCATENATED MODULE: ./assets/src/scripts/slideout.js


var slideout_initMobileNavi = function initMobileNavi() {
  var slideout = new slideout_default.a({
    panel: document.querySelector(".site-container"),
    menu: document.querySelector("#mobile-menu"),
    padding: 256,
    tolerance: 70,
    easing: "ease-in-out",
    side: "right",
    touch: false
  });
  var fixed = document.querySelector(".site-header");
  var toggleButton = document.querySelector(".toggle-button");
  var closeMobNavi = document.querySelector(".close-mob-navi");
  var mobileNaviButtons = document.querySelectorAll("#nav-mobile-menu > ul li > a");
  mobileNaviButtons.forEach(function (element) {
    element.addEventListener("click", function (event) {
      slideout.close();
    });
  });

  if (toggleButton) {
    toggleButton.addEventListener("click", function () {
      slideout.toggle();
    });
  }

  if (closeMobNavi) {
    closeMobNavi.addEventListener("click", function () {
      slideout.close();
    });
  }

  slideout.on("translate", function (translated) {
    fixed.style.transform = "translateX(" + translated + "px)";
  });
  slideout.on("beforeopen", function () {
    fixed.style.transition = "transform 300ms ease";
    fixed.style.transform = "translateX(256px)";
  });
  slideout.on("beforeclose", function () {
    fixed.style.transition = "transform 300ms ease";
    fixed.style.transform = "translateX(0px)";
  });
  slideout.on("open", function () {
    fixed.style.transition = "";
  });
  slideout.on("close", function () {
    fixed.style.transition = "";
  });
};

window.addEventListener("DOMContentLoaded", slideout_initMobileNavi);
// EXTERNAL MODULE: ./node_modules/lodash/lodash.js
var lodash = __webpack_require__(2);
var lodash_default = /*#__PURE__*/__webpack_require__.n(lodash);

// CONCATENATED MODULE: ./assets/src/scripts/stickyheader.js


var checkHeader = lodash_default.a.throttle(function () {
  var scrollPosition = Math.round(window.scrollY);

  if (scrollPosition > 174) {
    document.querySelector(".site-header").classList.add("sticky");
  } else {
    document.querySelector(".site-header").classList.remove("sticky");
  }
}, 300);

window.addEventListener("scroll", checkHeader);
// EXTERNAL MODULE: ./node_modules/swiper/dist/js/swiper.esm.bundle.js + 2 modules
var swiper_esm_bundle = __webpack_require__(25);

// CONCATENATED MODULE: ./assets/src/scripts/swiper.js


var initialize = function initialize() {
  console.log('Swiper initialized');
};

window.addEventListener("DOMContentLoaded", initialize);
// EXTERNAL MODULE: ./assets/src/scripts/tabs.js
var tabs = __webpack_require__(23);

// CONCATENATED MODULE: ./assets/src/index.js
// Fonts



 // Images














/***/ })
/******/ ]);
//# sourceMappingURL=main.js.map