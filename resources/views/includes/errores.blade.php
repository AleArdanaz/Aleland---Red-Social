@if ($errors->any())
  <div class="">
    <ul style="margin-left:0px;padding-left:0px;">
      @foreach($errors->all() as $error)
      <li style="list-style:none;margin-left:0px;">{{$error}}</li>
      @endforeach
    </ul>
  </div>
@endif
