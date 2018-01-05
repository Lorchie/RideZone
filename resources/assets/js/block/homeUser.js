$( document ).ready(function() {

  initMap();
  console.log("yes");


  function initMap() {

    var map = $("body").before('<div id="map"></div>')

      //remove useless icon
      var remove_poi = [
        {
          "featureType": "poi",
          "elementType": "labels",
          "stylers": [
            { "visibility": "off" }
          ]
        }
      ]

      map = new google.maps.Map(document.getElementById('map'), {
      mapTypeControl: false,
      styles: remove_poi,
      streetViewControl: false,
      disableDefaultUI: true
    });

      var latlng = new google.maps.LatLng(47, 1.80);
      var myOptions = {
          zoom: 7,
          center: latlng,
          streetViewControl: false,
          disableDefaultUI: true,
          mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      var map = new google.maps.Map(document.getElementById("map"),
              myOptions);
  }

});
