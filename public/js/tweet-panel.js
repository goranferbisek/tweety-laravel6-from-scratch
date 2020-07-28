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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/tweet-panel.js":
/*!*************************************!*\
  !*** ./resources/js/tweet-panel.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var maxCharacters = 140;
var dropZone = document.querySelector('.drop-zone');
var publishForm = document.querySelector('#publish-form');
var uploadInfo = document.querySelector('.upload-info');
var imageInput = document.querySelector('.tweet-image');
dropZone.addEventListener('dragover', function (e) {
  e.preventDefault();
  uploadInfo.classList.add('text-green-600');
});
dropZone.addEventListener('drop', function (e) {
  e.preventDefault();
  uploadInfo.classList.remove('text-red-600');

  if (e.dataTransfer.files.length) {
    imageInput.files = e.dataTransfer.files;
    uploadInfo.innerHTML = 'image uploaded';
    uploadInfo.classList.remove('text-green-600');
  }
});
['dragleave', 'dragend'].forEach(function (type) {
  dropZone.addEventListener(type, function (e) {
    uploadInfo.classList.remove('text-green-600');
  });
});
publishForm.addEventListener('submit', function (e) {
  e.preventDefault();
  var data = new FormData();
  data.append('body', dropZone.value);

  if (imageInput.files.length) {
    data.append('image', imageInput.files[0]);
  }

  axios.post('/tweets', data).then(function (response) {
    location.reload();
  })["catch"](function (error) {
    console.log(error.response.data);
    var errorMsg = error.response.data.errors.image[0];
    uploadInfo.classList.add('text-red-600');
    uploadInfo.innerHTML = "".concat(errorMsg, " Try again...");
  });
});
/* CHARACTER COUNT */

var counterDiv = document.querySelector('.counter-div');
var counter = document.querySelector('.counter');
var charCount;
dropZone.addEventListener('keyup', function (e) {
  //e.preventDefault();
  charCount = dropZone.value.length;
  counter.innerText = charCount;

  if (charCount > 0) {
    counterDiv.classList.remove('hidden');
  } else {
    counterDiv.classList.add('hidden');
  }
});

/***/ }),

/***/ 1:
/*!*******************************************!*\
  !*** multi ./resources/js/tweet-panel.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/goran/code/laravel/projects/tweety-laravel6-from-scratch/resources/js/tweet-panel.js */"./resources/js/tweet-panel.js");


/***/ })

/******/ });