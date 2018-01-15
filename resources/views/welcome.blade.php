@extends('layouts.app')

@section('content')

  <div class="banner_welcome" > 
  
    <div class="col-sm-6 col-sm-offset-3 presentation">
      <h1 class="title main_title">Bienvenue sur RideZone</h1>


    

      <div class="main_text" role="alert">
        <p>  RideZone est un site regroupant les spots de sport de glisse partout en France !
          Vous y trouverez des infos des autres riders pour chacun des posts afin de rider
          dans les meilleurs conditions. Partager votre expérience avec la communauté en
          ajoutant des posts, des commentaires et des conseils sur votre spot favoris.</p>
        <p>Peace !</p>

      </div>

      <div class="button_connexion">
        <a href="{{ route('login') }}">Connection</a></li>
      </div>
    </div>
  
  
  </div>


  
@endsection
