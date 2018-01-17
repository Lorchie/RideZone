$( document ).ready(function() {

    var markers = [];
    var map2;
    initMap();

    initSearch();

  function initSearch()
  {
    var input = $("#input_search")[0];
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map2);

    var infowindow = new google.maps.InfoWindow();
       var marker = new google.maps.Marker({
         map: map2,
         anchorPoint: new google.maps.Point(0, -29)
       });

    autocomplete.addListener('place_changed', function() {
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
            map2.setZoom(17);  // Why 17? Because it looks good.
        }
        marker.setIcon(/** @type {google.maps.Icon} */({
          size: new google.maps.Size(71, 71),
          origin: new google.maps.Point(0, 0),
          anchor: new google.maps.Point(17, 34),
          scaledSize: new google.maps.Size(35, 35)
        }));
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        var address = '';
        if (place.address_components) {
          address = [
            (place.address_components[0] && place.address_components[0].short_name || ''),
            (place.address_components[1] && place.address_components[1].short_name || ''),
            (place.address_components[2] && place.address_components[2].short_name || '')
          ].join(' ');
        }

        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map2, marker);
      });

  }


  function initMap() {


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
                initMarker(data);
            }
        }
    });

    function initMarker(data) {
        for (var i = 0; i < data.length; i++) {

            var infowindow = new google.maps.InfoWindow();
            var obj = data[i];
            var contentString = 'Nom: ' + obj.nom + '<br>'+ 'Déscription: ' + obj.description + '<br><button class="test" data-toggle="#myModal" data-spot="' + obj.id + '"> Voir plus </button>' ;
            var pos = {lat: obj.latitude, lng: obj.longitude};

            var marker = new google.maps.Marker({
                position: pos,
                map: map2,
                info: contentString,
                title: "ok"
            });

            google.maps.event.addListener(marker,'click',function(){
                infowindow.setContent(this.info);
                infowindow.open(map, this);

                $('.test').bind('click', function () {
                    $.ajax({
                        type: "GET",
                        url: "/getSpot/"+$(this).attr('data-spot'),
                        success: function(data) {
                            $spot=data[0];
                            $post=data[1];


                            console.log($post);
                            $("#myModal").find($('.nom')).html($spot.nom);
                            $("#myModal").find($('.description')).html($spot.description);
                            $("#myModal").find($('.photo')).html($spot.photo);
                            $("#myModal").find($('.interdiction')).html($spot.interdiction);
                            $("#myModal").find($('.type_de_plage')).html($spot.typePlage);

                            if($spot.famille ==0 ){
                                $stringFamille = "oui";
                            }else {$stringFamille = "non";}

                            $("#myModal").find($('.famille')).html($stringFamille);
                            $("#myModal").find($('.frequentation')).html($spot.frequentation);
                            $("#myModal").find($('.danger')).html($spot.danger);
                            $("#myModal").find($('.acces_parking')).html($spot.accesParking);
                            $("#myModal").modal();
                        }
                    });
                });

            });
            markers.push(marker);
        }
    }


    $("#button_filter").click(function () {
        $("#filter_menu").css({"left": "0"});
    });

    $("#map").click(function() {
      $("#filter_menu").css({"left": "-250px"});
    });


    $("#button_hide_menu").click(function () {
        $("#filter_menu").css({"visibility": "hidden"});
    });

    $('body').on('click', '.filter_checkbox', function (){
        //Affichage Checked/Uncheched
        if($(this).hasClass("checked"))
        {
          $(this).removeClass("checked");

        }
        else {
          if($(this).hasClass("custom_radio"))
          {
            var name_radio = $(this).attr("name");
            $("[name='" + name_radio + "']").removeClass("checked");
          }

          $(this).addClass("checked");
        }


        var data = {};

        var div = $(".checked[name='famille']");

        if(div.length)
        {
          data.famille = $(".checked[name='famille']").val();
        }

        $typePlageValue = [];
        $("[name='typePlage']").each(function() {
            if($(this).hasClass("checked"))
            {
              $typePlageValue.push($(this).val());
            }

            data.typePlage = $typePlageValue;
        });

        $frequentationValue = [];
        $("[name='frequentation']").each(function() {
            if($(this).hasClass("checked"))
            {
              console.log("fsd");
              $frequentationValue.push($(this).val());
            }

            data.frequentation = $frequentationValue;
        });

        $sportValue = [];
        $("[name='sport']").each(function() {
            if($(this).hasClass("checked"))
            {
              console.log("fsd");
              $frequentationValue.push($(this).val());
            }

            data.frequentation = $frequentationValue;
        });

        console.log(data);

        // if($('#typePlage').val() == "*") {
        //     $('.optionPlage').each(function () {
        //         $typePlageValue.push($(this).val());
        //     });
        // }

        $.ajax({
            type: "GET",
            url: "/getFilterSpotForMap",
            data: data,
            success: function (data) {
                console.log(data);
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(null);
                }
                for (var i = 0; i < data.length; i++) {
                    initMarker(data);
                }
            }
        });




    });

});
