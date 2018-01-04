@extends('layouts.app')

@section('content')

<div class="row">
  <h1 class="title">Création d'un Spot</h1>

  <form class="col-sm-4 col-sm-offset-4">
    <div class="form-group">
      <label for="nomSpot">Titre</label>
      <input type="text" class="form-control" id="nomSpot" placeholder="Entrer le titre du spot">
    </div>

    <div class="form-group">
      <label for="descriptionSpot">Description</label>
      <textarea  type="text"  rows="5" class="form-control vresize" id="descriptionSpot" placeholder="Entrer une description du spot"></textarea>
    </div>

    <div class="form-group">
      <label for="typePlage">Type Plage</label>
      <select class="form-control" id="typePlage">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
    </div>

    <div class="form-group">
      <label for="frequentationSpot">Fréquentation</label>
      <select class="form-control" id="frequentationSpot">
        <option>1</option>
        <option>2</option>
      </select>
    </div>

    <div class="form-group">
      <label for="dangerSpot">Danger</label>
      <textarea  type="text"  rows="3" class="form-control vresize" id="dangerSpot" placeholder="Entrer des éventuels dangers sur le spot"></textarea>
    </div>

    <div class="form-group">
      <label for="interdictionSpot">Interdiction</label>
      <textarea  type="text"  rows="3" class="form-control vresize" id="interdictionSpot" placeholder="Entrer des éventuels commentaires sur les interdictions"></textarea>
    </div>

    <div class="form-group">
      <label for="parkingSpot">Accès Parking</label>
      <textarea  type="text"  rows="3" class="form-control vresize" id="parkingSpot" placeholder="Entrer des éventuels parking près du spot"></textarea>
    </div>

    <div class="form-group">
      <label for="photoSpot">Photo</label>
      <input type="file" class="form-control-file" id="photoSpot">
    </div>

    <div class="form-check">
      <label class="form-check-label" for="familleBoolean">Le spot est adapté au famille ? </label>
      <input type="checkbox" class="form-check-input">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

</div>


@endsection
