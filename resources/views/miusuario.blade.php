<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    @include('includes/header')
    @guest
    <h2>You must Login</h2>
    @endguest
  </body>
</html>
