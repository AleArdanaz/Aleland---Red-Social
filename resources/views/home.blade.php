<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">



    <title></title>
  </head>
  <body>

    @include('includes/header')
    @auth
    <div class="container" style="padding-top:40px;">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
            <h2>Posteos</h2>
          </div>
          <div class="postear" style="padding:10px;">
            <form class="" action="{{route('crear.post')}}" method="post">
              @csrf
              <div class="form-group">
                <textarea name="body" rows="5" placeholder="What r u thinking?" style="width:100%;"></textarea>
                @include('includes/errores')
              </div>
              <input type="submit" name="postear" value="Enviar Post" style="margin-top:5px;">
            </form>
          </div>
          @foreach($posts as $post)
          <div class="card-body">
            <p>{{$post->body}}</p>
            <p>By <a href="{{route('ir.user', $post->user_id)}}">{{ $post->user['name'] }}</a> on {{$post->created_at->format('d/m/Y')}}</p>
            <div class="interacciones">
              <a href=""><i class="far fa-heart"></i></a>
              @if(Auth::user() == $post->user)
              <a href="{{route('borrar.post' , $post->id)}}" style="padding-left:10px;"><i class="far fa-trash-alt"></i></a>
              @endif
            </div>
          </div>
          @endforeach
          </div>
        </div>
      </div>
    </div>
    @endauth
    @guest
    <h2>You must Login</h2>
    @endguest
  </body>
</html>
