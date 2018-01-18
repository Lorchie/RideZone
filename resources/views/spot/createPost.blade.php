@extends('layouts.app')

@section('content')

  <h1 class="title">Création d'un post pour le spot {{$data['spot']->nom}} </h1>



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



      {{ csrf_field() }}

      <input name="spot_id" type="hidden" value="{{$data['spot']->id}}">

      <div class="form-group">
        <label for="bestWindForceMinPost">Force du vent maximum</label>
        <input type="text" class="form-control" name="bestWindForceMax" id="bestWindForceMinPost" placeholder="Entrer la force minimum du vent" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
      </div>

      <div class="form-group">
        <label for="bestWindForceMaxPost">Force du vent minimum</label>
        <input type="text" class="form-control" name="bestWindForceMinus" id="bestWindForceMaxPost" placeholder="Entrer la force minimum du vent" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
      </div>

      <div class="form-group">
        <label for="levelMiniPost">Difficulté ( 0 à 5 )</label>
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

      <div class="form-group">
        <label for="dangerPost">Sport</label>
        <select name="sport_id" class="form-control">
          @foreach ($data['sports'] as $sport)
              <option value="{{$sport->id}}" name="sport">{{$sport->nom}}</option>
          @endforeach
        </select>
      </div>



      <button type="submit" id="submitPost" class="btn btn-primary btn-lg btn-block">Publier</button>
    </form>


@endsection

@section('pagescript')
  <script src="{{ asset('js/addPost.js') }}"></script>
@stop
