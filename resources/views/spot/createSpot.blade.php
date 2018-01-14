@extends('layouts.app')

@section('content')

  <h1 class="title">Création d'un Spot</h1>

  <form id="addSpotForm" class="col-sm-8 col-md-6 col-md-offset-3 col-sm-offset-2">

    {{ csrf_field() }}

    <div class="info info_primary" role="alert">
      Explication d'un Spot
    </div>

    <div class="form-group">
      <label for="nameSpot">Titre</label>
      <input name="nameSpot" type="text" class="form-control"
      id="nameSpot" placeholder="Entrer le titre du spot">
    </div>

    <div class="form-group">
      <label for="descriptionSpot">Description</label>
      <textarea name="descriptionSpot" type="text"  rows="3" class="form-control vresize"
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
      <label for="frequentationSpot">Fréquentation</label>
      <select name="frequentationSpot" class="form-control" id="frequentationSpot">
        <option>1</option>
        <option>2</option>
      </select>
    </div>

    <div class="form-group">
      <label for="dangerSpot">Danger</label>
      <textarea  name="dangerSpot" type="text"  rows="3" class="form-control vresize"
      id="dangerSpot" placeholder="Entrer des éventuels dangers sur le spot"></textarea>
    </div>

    <div class="form-group">
      <label for="interdictionSpot">Interdiction</label>
      <textarea name="interdictionSpot" type="text"  rows="3" class="form-control vresize"
      id="interdictionSpot" placeholder="Entrer des éventuels commentaires sur les interdictions"></textarea>
    </div>

    <div class="form-group">
      <label for="parkingSpot">Accès Parking</label>
      <textarea name="parkingSpot" type="text"  rows="3" class="form-control vresize"
      id="parkingSpot" placeholder="Entrer des éventuels parking près du spot"></textarea>
    </div>

    <div class="form-group">
      <label for="photoSpot">Photo</label>
      <input name="photoSpot" id="photoSpot" type="file" class="file" data-preview-file-type="text">
    </div>

    <div class="form-map">
      <label for="mapAddSpot">Position du spot</label>
      <div id="mapAddSpot">

      </div>
    </div>

    <div class="form-check">
      <input name="familySpot" type="checkbox" class="form-check-input">
      <label class="form-check-label" for="familleBoolean">Le spot est adapté au famille ? </label>
    </div>

    <button type="button" id="submitSpot" class="btn btn-primary">Submit</button>
  </form>



@endsection

@section('pagescript')
  <script src="{{ asset('js/addSpot.js') }}"></script>
@stop
