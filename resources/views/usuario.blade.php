<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title></title>
  </head>
  <body>
    @include('includes/header')
    @guest
    <h2>You must Login</h2>
    @endguest
    @auth
    <h1>{{$user->name}}</h1>
    <p>Se unio el {{$user->created_at}}</p>

    @foreach($userposts as $userpost)

    <div class="card-body">
      <p>{{$userpost->body}}</p>
      <p>By <a href="{{route('ir.user', $userpost->user_id)}}">{{$userpost->user->name}}</a> on {{$userpost->created_at->format('d/m/Y')}}</p>
      <div class="interacciones">
        <a href=""><i class="far fa-heart"></i></a>
        @if(Auth::user() == $userpost->user)
        <a href="{{route('borrar.post' , $userpost->id)}}" style="padding-left:10px;"><i class="far fa-trash-alt"></i></a>
        @endif
      </div>
    </div>

    @endforeach
    @endauth
  </body>
</html>
