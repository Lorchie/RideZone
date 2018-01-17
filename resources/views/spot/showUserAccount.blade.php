@extends('layouts.app')

@section('content')
<div class="col-sm-8 col-md-6 col-md-offset-3 col-sm-offset-2">

    <div id="infoUser" class="label-default">

        <h2><label class="label"> Nom : {{$nameUser}} </label></h2>
        <h2><label class="label"> Email : {{$emailUser}} </label></h2>

    </div>
    <br>
    <div id="infoSportUser text-center">
        <h3 class="text-center"><label class="label"> Vos Sports : </label></h3>
        <br>
        <table class="table table-striped text-center ">
                @foreach( $sports as $sport)
                <tr class="active">
                    <th class="text-center text-muted">
                        {{$sport->nom}}
                    </th>
                </tr>
                @endforeach
        </table>
    </div>
    <br>
    <button type="button" id="showUpdateUserAccount" class="btn btn-default  center-block"><a id="linkModifyUser" href="/showUpdateUserAccount"> Modifier </a></button>

</div>






@endsection