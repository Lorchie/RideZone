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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 37);
/******/ })
/************************************************************************/
/******/ ({

/***/ 37:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(38);


/***/ }),

/***/ 38:
/***/ (function(module, exports) {

$(document).ready(function () {

    initMap();
    var map2;

    function initMap() {

        var map = $("body").before('<div id="map"></div>');

        //remove useless icon
        var remove_poi = [{
            "featureType": "poi",
            "elementType": "labels",
            "stylers": [{ "visibility": "off" }]
        }];

        var latlng = new google.maps.LatLng(47, 1.80);
        var myOptions = {
            zoom: 7,
            center: latlng,
            streetViewControl: false,
            disableDefaultUI: true,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map2 = new google.maps.Map(document.getElementById("map"), myOptions);
    }
    $.ajax({
        type: "GET",
        url: "/getSpotForMap",
        success: function success(data) {
            console.log(data);
            for (var i = 0; i < data.length; i++) {
                var obj = data[i];
                var pos = { lat: obj.latitude, lng: obj.longitude };
                marker = new google.maps.Marker({
                    position: pos,
                    map: map2,
                    title: "ok"
                });
            }
        }
    });

    console.log("ok !!!");

    $("#button_filter").click(function () {
        console.log("fsd");
        $("#filter_menu").css({ "visibility": "visible" });
    });

    $("#button_hide_menu").click(function () {
        $("#filter_menu").css({ "visibility": "hidden" });
    });

    $('.for_family').on('change', function () {});
    $('#frequentationSpot').on('change', function () {});
    $('#typePlage').on('change', function () {});
    $('#discipline').on('change', function () {});
    $('#sport').on('change', function () {});
});

/***/ })

/******/ });