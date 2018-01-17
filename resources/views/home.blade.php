@extends('layouts.app')


@section('nav_bar')
  <form class="navbar-form navbar-left" role="search">
      <div class="form-group">
          <input id="input_search" type="text" id="" class="form-control has-search-icon"
              placeholder="Chercher une position" style="width: 100%"> <!-- here -->
      </div>
  </form>
@endsection

@section('body')
  <div id="map"></div>

  <button id="button_filter" type="button" class="btn btn-default btn-lg">
    <span class="glyphicon glyphicon-th" aria-hidden="true"></span> Filtre
  </button>

  <!-- <button id="ask_user_position"><img src="{{asset("image/gps-location.png")}}"></button> -->

  <div id="myModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:red;"> SPOT </h4>
        </div>
        <div class="modal-body">
          <form role="form">
            <div class="form-group">
              <h4 style="color:black;"> Nom: </h4>
              <label class="nom" style="color: #1f648b"></label><br>

              <label class="photo" style="color: #1f648b"></label>

              <h4 style="color:black;"> Description: </h4>
              <label class="description" style="color: #1f648b"></label><br>

              <h4 style="color:black;"> Type plage: </h4>
              <label class="type_de_plage" style="color: #1f648b"></label><br>

              <h4 style="color:black;"> Famille: </h4>
              <label class="famille" style="color: #1f648b"></label><br>

              <h4 style="color:black;"> Interdiction: </h4>
              <label class="interdiction" style="color: #1f648b"></label><br>

              <h4 style="color:black;"> Fréquentation: </h4>
              <label class="frequentation" style="color: #1f648b"></label>

              <h4 style="color:black;"> Accées parking: </h4>
              <label class="acces_parking" style="color: #1f648b"></label><br>

              <table class="table_post">

              </table>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <div id="filter_menu" >
    <h2 class="filter_title">Filtre</h2>

    <div class="group_filter">
      <div class="label_filter">Adapté à la famille</div>
      <div class="checkbox_container">
        <button value="1" name="famille" class="custom_checkbox filter_checkbox custom_radio">
          Oui
        </button>
        <button value="0" name="famille" class="custom_checkbox filter_checkbox custom_radio">
          Non
        </button>
      </div>
      <!-- <input type="checkbox" class="filtre" name="for_family" id="for_family"> -->
    </div>

    <div class="group_filter">
      <div class="label_filter">Frequentation</div>
      <div class="checkbox_container">
        <button value="faible" name="frequentation" class="custom_checkbox filter_checkbox">
          Faible
        </button>
        <button value="moyen" name="frequentation" class="custom_checkbox filter_checkbox">
          Moyen
        </button>
        <button value="beaucoup" name="frequentation" class="custom_checkbox filter_checkbox">
          Beaucoup
        </button>
      </div>
    </div>

    <div class="group_filter">
      <div class="label_filter">Type de plage</div>
      <div class="checkbox_container">
        <button value="sable" name="typePlage" class="custom_checkbox filter_checkbox">
          Sable
        </button>
        <button value="galet" name="typePlage" class="custom_checkbox filter_checkbox">
          Galet
        </button>
        <button value="herbe" name="typePlage" class="custom_checkbox filter_checkbox">
          Herbe
        </button>
        <button value="beton" name="typePlage" class="custom_checkbox filter_checkbox">
          Béton
        </button>
        <button value="rocheux" name="typePlage" class="custom_checkbox filter_checkbox">
          Rocheux
        </button>
        <button value="terre" name="typePlage" class="custom_checkbox filter_checkbox">
          Terre
        </button>
      </div>


    </div>

    <div class="group_filter">
      <div class="label_filter">Sport</div>
      <div class="checkbox_container">
        @foreach ($sports as $sport)
            <button value="{{$sport->id}}" name="sport" class="custom_checkbox filter_checkbox">
                {{$sport->nom}}
            </button>
        @endforeach
      </div>
    </div>
    <br>
  </div>


@endsection

@section('pagescript')
  <script src="{{ asset('js/geocomplete.js') }}"></script>
  <script src="{{ asset('js/homeUser.js') }}"></script>
@stop
