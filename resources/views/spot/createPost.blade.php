@extends('layouts.app')

@section('content')

<div class="row">
  <h1 class="title">Création d'un post</h1>

  <form class="col-sm-4 col-sm-offset-4">

    <div class="info info_primary" role="alert">
      Explication d'un post
    </div>

    <div class="form-group">
      <label for="nomSpot">Titre</label>
      <input type="text" class="form-control" id="nomSpot" placeholder="Entrer le titre du spot">
    </div>

    <div class="form-group">
      <label for="bestWindForcePost">Force du vent</label>
      <input type="text" class="form-control" id="bestWindForcePost" placeholder="Entrer la force du vent" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
    </div>

    <div class="form-group">
      <label for="levelMiniPost">Niveau de la mer</label>
      <input type="text" class="form-control" id="levelMiniPost" placeholder="Entrer le niveau de la mère minimum" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
    </div>

    <div class="form-group">
      <label for="bestWindDirectionPost">Direction du vent</label>
      <select class="form-control" id="bestWindDirectionPost">
        <option>N</option>
        <option>NE</option>
        <option>E</option>
        <option>SE</option>
        <option>S</option>
        <option>SO</option>
        <option>O</option>
        <option>NO</option>
      </select>
    </div>


    <div class="form-group">
      <label for="dangerPost">Danger</label>
      <textarea  type="text"  rows="3" class="form-control vresize" id="dangerPost" placeholder="Entrer des éventuels dangers à un instant précis"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

</div>


@endsection
