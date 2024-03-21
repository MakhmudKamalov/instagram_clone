@extends('layouts.sidebar')

@section('part-1')
    
@php
$path = $user['photo'];
$base_path = "C:/MAMP/htdocs/laravel-insta/public";
$relative_path = substr($path, strlen($base_path));
@endphp
@endsection
@section('content')
  

<!--***** posts_container start ****** -->
<div class="main_section">
  <div class="posts_container">
  <form action="{{ Route('update-profile') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="alert alert-secondary">
      <label for="">Photo user</label><br>
      <input type="file"  name="foto" id="">
      <br>
    </div>
    <div class="alert alert-secondary">
      <label for="name">User Name</label><br>
      <input type="text" name="username" value="{{ $user['username'] }}" id=""><br><br>


      <label for="name">Name</label><br>
      <input type="text" name="name" value="{{ $user['name'] }}" id=""><br><br>

      <label for="bio">Bio</label><br>
      <textarea name="bio"  id="">{{ $user['bio'] }}</textarea><br><br>
    <label for="">Конфединциальность</label><br>
    @if ($user['status'] == 1)
    <input type="radio" name="status" value="1" checked id=""><label for="">Открытый</label><br>
    <input type="radio" name="status" value="0" id=""><label for="">Закрытый</label><br>
@elseif ($user['status'] == 0)
<input type="radio" name="status" value="1" id=""><label for="">Открытый</label><br>
<input type="radio" name="status" value="0" checked id=""><label for="">Закрытый</label><br>

@endif
      <br><br>
      <input type="submit" class="btn btn-primary"  value="Save">
    </div>
  </form>
  </div>
</div>
<!--***** posts_container end ****** -->
@endsection