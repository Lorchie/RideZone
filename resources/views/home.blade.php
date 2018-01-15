@extends('layouts.app')

@section('content')

@endsection
@section('body')
  <button id="button_filter"> <img src="{{asset('image/filter.png')}}"></button>
  <br>
  <div id="filter_menu" >
    <label>Adapté à la famille</label>
    <input type="checkbox" class="filtre" name="for_family" id="for_family">
    <button id="button_hide_menu"><img src="{{asset("image/double-left-chevron.png")}}"></button>
    <br>
    <label>Frequentation</label>
    <select name="frequentationSpot" class="filtre" id="frequentationSpot">
      <option value="*"> </option>
      <option class="optionFrequentation" value="faible">1</option>
      <option class="optionFrequentation" value="2">2</option>
    </select>
    <br>
    <label>Type de plage</label>
    <select name="typePlage" class="filtre" id="typePlage">
      <option value="*"> </option>
      <option class="optionPlage" value="Sable">Sable</option>
      <option class="optionPlage" value="Galet">Galet</option>
      <option class="optionPlage" value="Herbe">Herbe</option>
      <option class="optionPlage" value="Béton">Béton</option>
    </select>
    <br>
    <label>Discipline</label>
    <select name="discipline" class="filtre" id="discipline">
      <option value="*"> </option>
      <option  class="optionDiscipline" value="1">1</option>
      <option class="optionDiscipline" value="2">2</option>
    </select>
    <br>
    <label>Sport</label>
    <select name="sport" class="filtre" id="sport">
      <option value="*"> </option>
      <option class="optionSport" value="1">1</option>
      <option class="optionSport" value="2">2</option>
    </select>
  </div>
  <br>
  <button id="ask_user_position"><img src="{{asset("image/gps-location.png")}}"></button>

@endsection

@section('pagescript')
  <script src="{{ asset('js/geocomplete.js') }}"></script>
  <script src="{{ asset('js/homeUser.js') }}"></script>
@stop
