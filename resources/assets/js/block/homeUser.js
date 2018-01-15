$( document ).ready(function() {

    initMap();
    var map2;
    var markers = [];

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
                markers.push(marker);
                marker.addListener('click', function() {
                    infowindow.open(map, marker);
                });
            }
        }
    });



    $("#button_filter").click(function () {
        $("#filter_menu").css({"visibility": "visible"});
    });
    $("#button_hide_menu").click(function () {
        $("#filter_menu").css({"visibility": "hidden"});
    });

    $('.filtre').on('change', function () {
        if ($('#for_family').prop('checked')) {
            $familleValue = "1";
        }
        else {
            $familleValue = "0";
        }
        $typePlageValue = [];
        if($('#typePlage').val() == "*") {
            $('.optionPlage').each(function () {
                $typePlageValue.push($(this).val());
            });
        }
        else {
            $typePlageValue = [$('#typePlage').val(),""];

        }
        $frequentationValue = [];
        if($('#frequentationSpot').val() == "*") {
            $('.optionFrequentation').each(function () {
                $frequentationValue.push($(this).val());
            });
        }
        else {
            $frequentationValue = [$('#frequentationSpot').val(),""];

        }
        $disciplineValue = [];
        if($('#discipline').val() == "*") {
            $('.optionDiscipline').each(function () {
                $disciplineValue.push($(this).val());
            });
        }
        else {
            $disciplineValue = [$('#discipline').val(),""];

        }
        $sportValue = [];
        if($('#sport').val() == "*") {
            $('.optionSport').each(function () {
                $sportValue.push($(this).val());
            });
        }
        else {
            $sportValue = [$('#sport').val(),""];

        }

        $.ajax({
            type: "GET",
            url: "/getFilterSpotForMap",
            data: {familleValue: $familleValue,
                     typePlageValue: $typePlageValue,
                     frequentationValue: $frequentationValue,
                        sportValue: $sportValue,
                     disiciplineValue: $disciplineValue


            },
            success: function (data) {
                console.log(data);
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(null);
                }
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
                    markers.push(marker);
                    marker.addListener('click', function() {
                        infowindow.open(map, marker);
                    });
                }
            }
        });
    });

});