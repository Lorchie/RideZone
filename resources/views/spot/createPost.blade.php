@extends('layouts.app')

@section('content')

  <h1 class="title">Création d'un post</h1>


    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif

    <form id="addPostForm" method="post" action="/submitPost" class="col-sm-4 col-sm-offset-4">

      <div class="info info_primary" role="alert">
        Explication d'un post
      </div>

      {{ csrf_field() }}

      <div class="form-group">
        <label for="bestWindForceMinPost">Force du vent</label>
        <input type="text" class="form-control" name="bestWindForceMax" id="bestWindForceMinPost" placeholder="Entrer la force minimum du vent" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
      </div>

      <div class="form-group">
        <label for="bestWindForceMaxPost">Force du vent</label>
        <input type="text" class="form-control" name="bestWindForceMinus" id="bestWindForceMaxPost" placeholder="Entrer la force minimum du vent" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
      </div>

      <div class="form-group">
        <label for="levelMiniPost">Niveau de la mer</label>
        <input type="text" class="form-control" name="levelMini" id="levelMiniPost" placeholder="Entrer le niveau de la mère minimum" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
      </div>

      <div class="form-group">
        <label for="bestWindDirectionPost">Direction du vent</label>
        <select class="form-control" name="bestWindDirection" id="bestWindDirectionPost">
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
        <textarea  type="text" name="danger" rows="3" class="form-control vresize" id="dangerPost" placeholder="Entrer des éventuels dangers à un instant précis"></textarea>
      </div>

      <button type="submit" id="submitPost" class="btn btn-primary btn-lg btn-block">Publier</button>
    </from>


@endsection

@section('pagescript')
  <script src="{{ asset('js/addPost.js') }}"></script>
@stop

