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

    var markers = [];
    var map2;
    initMap();

    initSearch();

    function initSearch() {
        var input = $("#input_search")[0];
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map2);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
            map: map2,
            anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function () {
            infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                // User entered the name of a Place that was not suggested and
                // pressed the Enter key, or the Place Details request failed.
                window.alert("No details available for input: '" + place.name + "'");
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map2.fitBounds(place.geometry.viewport);
            } else {
                map2.setCenter(place.geometry.location);
                map2.setZoom(17); // Why 17? Because it looks good.
            }
            marker.setIcon( /** @type {google.maps.Icon} */{
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(35, 35)
            });
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

            var address = '';
            if (place.address_components) {
                address = [place.address_components[0] && place.address_components[0].short_name || '', place.address_components[1] && place.address_components[1].short_name || '', place.address_components[2] && place.address_components[2].short_name || ''].join(' ');
            }

            infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
            infowindow.open(map2, marker);
        });
    }

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

            for (var i = 0; i < data.length; i++) {
                var obj = data[i];

                var contentString = 'Nom: ' + obj.nom + '<br>' + 'Déscription: ' + obj.description + '<br><button type="submit" value="Submit">Voir plus</button>';

                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });
                var pos = { lat: obj.latitude, lng: obj.longitude };

                marker = new google.maps.Marker({
                    position: pos,
                    map: map2,
                    title: "ok"
                });
                markers.push(marker);
                marker.addListener('click', function () {
                    infowindow.open(map, marker);
                });
            }
        }
    });

    $("#button_filter").click(function () {
        $("#filter_menu").css({ "visibility": "visible" });
    });
    $("#button_hide_menu").click(function () {
        $("#filter_menu").css({ "visibility": "hidden" });
    });

    $('.filtre').on('change', function () {

        $familleLabel = "famille";
        if ($('.for_family').val() == "on") {
            $familleValue = "1";
        } else {
            $familleValue = "0";
        }
        $typePlageLabel = "typePlage";
        $typePlageValue = [];
        if ($('#typePlage').val() == "*") {
            $('.optionPlage').each(function () {
                $typePlageValue.push($(this).val());
            });
        } else {
            $typePlageValue = [$('#typePlage').val(), ""];
        }
        $frequentationLabel = "frequentation";
        $frequentationValue = [];
        if ($('#frequentationSpot').val() == "*") {
            $('.optionFrequentation').each(function () {
                $frequentationValue.push($(this).val());
            });
        } else {
            $frequentationValue = [$('#frequentationSpot').val(), ""];
        }

        $disciplineLabel = "";
        $disciplineValue = [];
        if ($('#discipline').val() == "*") {
            $('.optionDiscipline').each(function () {
                $disciplineValue.push($(this).val());
            });
        } else {
            $disciplineValue = [$('#discipline').val(), ""];
        }
        $sportLabel = "";
        $sportValue = [];
        if ($('#sport').val() == "*") {
            $('.optionSport').each(function () {
                $sportValue.push($(this).val());
            });
        } else {
            $disciplineValue = [$('#sport').val(), ""];
        }

        $.ajax({
            type: "GET",
            url: "/getFilterSpotForMap",
            data: { familleLabel: $familleLabel, familleValue: $familleValue,
                typePlageLabel: $typePlageLabel, typePlageValue: $typePlageValue,
                frequentationLabel: $frequentationLabel, frequentationValue: $frequentationValue },
            success: function success(data) {

                console.log(markers);

                for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(null);
                }
                for (var i = 0; i < data.length; i++) {
                    var obj = data[i];

                    var contentString = 'Nom: ' + obj.nom + '<br>' + 'Déscription: ' + obj.description + '<br><button type="submit" value="Submit">Voir plus</button>';

                    var infowindow = new google.maps.InfoWindow({
                        content: contentString
                    });
                    var pos = { lat: obj.latitude, lng: obj.longitude };

                    marker = new google.maps.Marker({
                        position: pos,
                        map: map2,
                        title: "ok"
                    });

                    markers.push(marker);
                    marker.addListener('click', function () {
                        infowindow.open(map, marker);
                    });
                }
            }
        });
    });
});

/***/ })

/******/ });