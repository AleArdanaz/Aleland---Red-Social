<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title></title>
  </head>
  <body>
    @include('includes/header')
    @guest
    <h2>You must Login</h2>
    @endguest
    @auth
    <div class="" style="text-align:center;margin-top:20px;" >
      <h1>{{$user->name}}</h1>
      <p>Se unio el {{$user->created_at->format('d/m/Y')}}</p>
    </div>
    <div class="row">
      <div class="col-md-6">
        <h2 style="text-align:center;">Posteos!</h2>
        @foreach($userposts as $userpost)
        <div class="" style="text-align:center;margin-top:30px;">
          <p>{{$userpost->body}}</p>
          <p>By <a href="{{route('ir.user', $userpost->user_id)}}">{{$userpost->user->name}}</a> on {{$userpost->created_at->format('d/m/Y')}}</p>
          <a href=""><i class="far fa-heart"></i></a>
          @if(Auth::user() == $userpost->user)
          <a href="{{route('borrar.post' , $userpost->id)}}" style="padding-left:10px;"><i class="far fa-trash-alt"></i></a>
          @endif
        </div>
          @endforeach
      </div>
      <div class="col-md-6" style="text-align:center;">
        <h2 style="text-align:center;">Likes!</h2>
          @foreach($postlikeds as $postliked)
          <div class="" style="margin-top:30px;">
            <p>{{$postliked->body}}</p>
            <p>By <a href="#">{{$postliked->user->name}}</a> on {{$postliked->created_at->format('d/m/Y')}}</p>
            <a href=""><i class="far fa-heart"></i></a>

          </div>
          @endforeach
      </div>
      </div>


    @endauth


  </body>
</html>
