@extends('layouts.app')

@section('content')



@endsection
@section('body')
  <button id="button_filter"> <img src="{{asset('image/filter.png')}}"></button>
  <br>
  <div id="filter_menu" >
    <label>Adapté à la famille</label>
    <input type="radio" class="for_family" name="for_family" value="for_family">
    <button id="button_hide_menu"><img src="{{asset("image/double-left-chevron.png")}}"></button>
    <br>
    <label>Frequentation</label>
    <select name="frequentationSpot" id="frequentationSpot">
      <option>1</option>
      <option>2</option>
    </select>
    <br>
    <label>Type de plage</label>
    <select name="typePlage" id="typePlage">
      <<option value="1">Sable</option>
      <option value="2">Galet</option>
      <option value="3">Herbe</option>
      <option value="4">Béton</option>
    </select>
    <br>
    <label>Discipline</label>
    <select name="discipline" id="discipline">
      <option>1</option>
      <option>2</option>
    </select>
    <br>
    <label>Sport</label>
    <select name="sport" id="sport">
      <option>1</option>
      <option>2</option>
    </select>
  </div>
  <br>
  <button id="ask_user_position"><img src="{{asset("image/gps-location.png")}}"></button>

@endsection

@section('pagescript')
  <script src="{{ asset('js/homeUser.js') }}"></script>
@stop
