@extends('layouts.app')

@section('content')

    <h1 class="title">Modification de mon profil</h1>

    <form id="addSpotForm" method="post" action="/submitUpdateUserAccount" class="col-sm-8 col-md-6 col-md-offset-3 col-sm-offset-2" enctype="multipart/form-data">

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
            <div class="form-group">
            <label for="nom">Nom</label>
                <input name="name" type="text" class="form-control"
                       id="nameUser" placeholder="Entrer votre nom" value="{{$nameUser}}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" type="text" class="form-control"
                       id="emailUser" placeholder="Entrer votre email" value="{{$emailUser}}">
            </div>
            <div class="form-group">
                <label for="currentPassword">Mot de passe actuel</label>
                <input name="currentPassword" type="password" class="form-control"
                       id="currentPassword" placeholder="Entrer votre mot de passe acutel">
            </div>
            <div class="form-group">
                <label for="newPassword">Nouveau mot de passe</label>
                <input name="password" type="password" class="form-control"
                       id="newPassword" placeholder="Entrer votre nouveau mot de passe">
            </div>
            <div class="form-group">
                <label for="newPasswordAgain">Nouveau mot de passe</label>
                <input name="password_confirmation" type="password" class="form-control"
                       id="newPasswordAgain" placeholder="Entrer votre nouveau mot de passe">
            </div>

            <div>
                <h3 class="text-center">Modifier mes sports</h3>
                <div class="info info_primary" role="alert">
                    Cocher/décocher pour Ajouter/Supprimer un sport
                </div>
                <div class="well" style="max-height: 300px;overflow: auto;">
                    <ul class="list-group checked-list-box">

                @foreach( $sports as $sport)
                        @if( in_array($sport->id, $dataSport) )
                        <li class="list-group-item" data-checked="true" value="{{$sport->id}}">{{$sport->nom}} </li>
                        @else
                                <li class="list-group-item" value="{{$sport->id}}">{{$sport->nom}} </li>
                            @endif
                @endforeach
                    </ul>
                </div>
            </div>

            <button type="button" id="submitAccount" class="btn btn-primary btn-lg btn-block">Modifier</button>


    </form>

@endsection
@section('pagescript')
    <script src="{{ asset('js/sportUser.js') }}"></script>
@stop