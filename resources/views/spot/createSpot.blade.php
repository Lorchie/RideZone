@extends('layouts.app')

@section('content')

  <h1 class="title">Création d'un Spot</h1>




  <form id="addSpotForm" method="post" action="/submitSpot" class="col-sm-8 col-md-6 col-md-offset-3 col-sm-offset-2" enctype="multipart/form-data">

    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif


    {{ csrf_field() }}

    <div class="info info_primary" role="alert">
      Explication d'un Spot
    </div>

    <div class="form-group">
      <label for="nom">Titre</label>
      <input name="nom" type="text" class="form-control"
      id="nameSpot" placeholder="Entrer le titre du spot">
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <textarea name="description" type="text"  rows="3" class="form-control vresize"
      id="descriptionSpot" placeholder="Entrer une description du spot"></textarea>
    </div>

    <div class="form-group">
      <label for="typePlage">Type Plage</label>
      <select name="typePlage" class="form-control" id="typePlage">
        <option value="1">Sable</option>
        <option value="2">Galet</option>
        <option value="3">Herbe</option>
        <option value="4">Béton</option>
      </select>
    </div>

    <div class="form-group">
      <label for="frequentation">Fréquentation</label>
      <select name="frequentation" class="form-control" id="frequentationSpot">
        <option value="faible">Faible</option>
        <option value="moyen">Moyen</option>
        <option value="beaucoup">Beaucoup</option>
      </select>
    </div>

    <div class="form-group">
      <label for="danger">Danger</label>
      <textarea  name="danger" type="text"  rows="3" class="form-control vresize"
      id="dangerSpot" placeholder="Entrer des éventuels dangers sur le spot"></textarea>
    </div>

    <div class="form-group">
      <label for="interdiction">Interdiction</label>
      <textarea name="interdiction" type="text"  rows="3" class="form-control vresize"
      id="interdictionSpot" placeholder="Entrer des éventuels commentaires sur les interdictions"></textarea>
    </div>

    <div class="form-group">
      <label for="accesParking">Accès Parking</label>
      <textarea name="accesParking" type="text"  rows="3" class="form-control vresize"
      id="parkingSpot" placeholder="Entrer des éventuels parking près du spot"></textarea>
    </div>

    <div class="form-group">
      <label for="photo">Photo</label>
      <input name="photo" id="photoSpot" type="file">
    </div>

    <div class="form-map">
      <label for="mapAddSpot">Position du spot</label>
      <div id="mapAddSpot">

      </div>
    </div>

    <div class="form-check">
      <input id="family" name="famille" type="checkbox" value="1" class="form-check-input">
      <input id="family_hidden" type='hidden' value='0' name='famille'>
      <label class="form-check-label" for="famille">Le spot est adapté aux familles ? </label>
    </div>

    <button type="button" id="submitSpot" class="btn btn-primary btn-lg btn-block">Publier</button>
  </form>

@endsection

@section('pagescript')
  <script src="{{ asset('js/addSpot.js') }}"></script>
@stop
