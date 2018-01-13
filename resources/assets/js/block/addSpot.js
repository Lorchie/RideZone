$( document ).ready(function() {

  var map;

  initMap();

  function initMap(){
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


      var latlng = new google.maps.LatLng(47, 1.80);
      var myOptions = {
          zoom: 7,
          center: latlng,
          gestureHandling: 'greedy',
          zoomControl:true,
          scrollwheel: true,
          streetViewControl: false,
          disableDefaultUI: true,
          mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      map = new google.maps.Map(document.getElementById("mapAddSpot"),
              myOptions);

      var marker = new google.maps.Marker({
                  position: latlng,
                  map: map,
                  title: 'Hello World!'
            });

            google.maps.event.addListener(map, 'center_changed', function() {
                // 0.1 seconds after the center of the map has changed,
                // set back the marker position.
                window.setTimeout(function() {
                  var center = map.getCenter();
                  marker.setPosition(center);
                }, 0);
            });
  }


  $("#submitSpot").click(function() {
    var center = map.getCenter();
    var lat = center.lat();
    var long = center.lng();

    $("#addSpotForm")
    .append('<input type="hidden" name="lat" value="'+ lat + '" /> ');

    $("#addSpotForm")
    .append('<input type="hidden" name="long" value="'+ long + '" /> ');

    console.log($("#addSpotForm").serializeArray());

    $("#addSpotForm").submit();
  });

});
