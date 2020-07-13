/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
 // -----------------------------------------------------------
// 							SLIDER
// -----------------------------------------------------------

var parent = document.querySelector('.thumbs');
var win = document.querySelector('.window');
var imgs = document.getElementsByClassName('slider-img');
var width = imgs[0].getBoundingClientRect().width;
var len = imgs.length + 1;
var shift = 0;
var k = 1;
var i = 1;
var inter;
parent.append(document.querySelectorAll('.thumbs>*')[0].cloneNode(true));

function next() {
  var back = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;
  clearInterval(inter);
  k = back ? -1 : 1;
  var slide = setInterval(function () {
    if (back) {
      k *= shift >= width * (i - 1) - width / 2 ? 1.2 : 0.85;
      shift += k;

      if (i == 1) {
        i = len;
        shift = width * (i - 1);
      }

      if (shift <= 1.05 * (i - 2) * width) {
        i--;
        shift = (i - 1) * width;
        clearInterval(slide);
      }
    } else {
      k *= shift <= width * i - width / 2 ? 1.2 : 0.85;
      shift += k;

      if (i >= len) {
        i = 1;
        shift = 0;
      }

      ;

      if (shift >= 0.99 * i * width) {
        shift = i * width;
        i++;
        clearInterval(slide);
      }
    }

    parent.style.left = -shift + 'px';
    set((i - 1) % (len - 1));
  }, 10);
  main();
}

function main() {
  shift -= shift % width;
  i = parseInt(shift / width + 1);
  inter = setInterval('next()', 9000);
}

var points = document.querySelectorAll('.points>*');

function set(id) {
  for (var p = 0; p < len - 1; p++) {
    points[p].classList = [];
  }

  points[id].classList = ['active'];
}

main();
var btns = document.querySelectorAll('.sliders .arrow');

var _loop = function _loop(_i) {
  btns[_i].addEventListener('click', function () {
    next(!_i);
  });
};

for (var _i = 0; _i < 2; _i++) {
  _loop(_i);
} // -----------------------------------------------------------
// 							NAVBAR
// -----------------------------------------------------------


var button = document.querySelector('nav.navbar button[aria-controls="navbarSupportedContent"]');
var navcollapse = document.querySelector('nav.navbar #navbarSupportedContent');
console.log(navcollapse.classList);
button.addEventListener('click', function () {
  if (navcollapse.classList.contains('collapse')) navcollapse.classList.remove('collapse');else navcollapse.classList.add('collapse');
});

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\Users\marki\Downloads\OpenServer\domains\marksshop\resources\js\app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! C:\Users\marki\Downloads\OpenServer\domains\marksshop\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });