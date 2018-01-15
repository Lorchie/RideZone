$( document ).ready(function() {

  initMap();
  var map2;

  function initMap() {

    var map = $("body").before('<div id="map"></div>');

      //remove useless icon
      var remove_poi = [
        {
          "featureType": "poi",
          "elementType": "labels",
          "stylers": [
            { "visibility": "off" }
          ]
        }
      ];


      var latlng = new google.maps.LatLng(47, 1.80);
      var myOptions = {
          zoom: 7,
          center: latlng,
          streetViewControl: false,
          disableDefaultUI: true,
          mapTypeId: google.maps.MapTypeId.ROADMAP
      };
       map2 = new google.maps.Map(document.getElementById("map"),
              myOptions);

  }
    $.ajax({
        type: "GET",
        url: "/getSpotForMap",
        success: function(data) {

            for (var i = 0; i < data.length; i++) {
                var obj = data[i];

                var contentString = 'Nom: ' + obj.nom + '<br>'+ 'Déscription: ' + obj.description + '<br><button type="submit" value="Submit">Voir plus</button>' ;

                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });
                var pos = {lat: obj.latitude, lng: obj.longitude};

                marker = new google.maps.Marker({
                    position: pos,
                    map: map2,
                    title: "ok"
                });
                marker.addListener('click', function() {
                    infowindow.open(map, marker);
                });
            }
        }
    });

  console.log("ok !!!");


    $("#button_filter").click(function() {
            $("#filter_menu").css({"visibility":"visible"});
});
    $("#button_hide_menu").click(function() {
        $("#filter_menu").css({"visibility":"hidden"});
    });

    $('.for_family').on('change', function() {

    })
    $('#frequentationSpot').on('change', function() {

    });
    $('#typePlage').on('change', function() {

    });
    $('#discipline').on('change', function() {

    });
    $('#sport').on('change', function() {

    });

});
