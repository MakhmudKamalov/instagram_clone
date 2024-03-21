@extends('layouts.sidebar')
@section('part-1')

@php
$path = $user['photo'];
$base_path = "C:/MAMP/htdocs/laravel-insta/public";
$relative_path = substr($path, strlen($base_path));
@endphp  
@endsection

@section('content')
  
        <div class="reels">
          @foreach ($posts as $v)
          @php
          $video = $v['URL'];
@endphp
          {{-- Reels --}}
          <div class="reel">
            <div class="video">
            <video src="./storage/{{ $video }}" autoplay="" loop="">
            </video>
            <div class="content">
                <div class="sound">
                    <img class="volume-up" src="./images/volume-up.png">
                    <img class="volume-mute" src="./images/volume-mute.png">
                </div>
                <div class="play">
                    <img src="./images/play-button-arrowhead.png">
                </div>
                <div class="info">
                    <div class="profile">
                        <h4><a href="{{ Route('profile-page') }}">
                                <img src="{{ $relative_path }}">
                                {{ $user['name'] }}
                            </a></h4>
                        <span>.</span>
                        <button class="follow_text">Follow</button>
                    </div>
                    <div class="desc">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Officiis... <span class="show_text">more</span>
                        </p>
                        <div class="more">
                            <div class="music">
                                <img src="./images/music.png">
                                <span>nameOfMusic</span>
                            </div>
                            <div class="position">
                                <img src="./images/map.png">
                                <span>nukus</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="likes">
            <div class="like">
                <img class="not_loved" src="./images/love.png">
                <img class="loved" src="./images/heart.png">
                <p> 55.9K</p>
            </div>
            <div class="messsage">
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#message_modal">
                    <img src="./images/bubble-chat.png">
                    <p class="m-0">555</p>
                </button>
            </div>
            <div class="send">
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#send_message_modal">
                    <img src="./images/send.png">
                </button>
            </div>
            <div class="save not_saved">
                <img class="hide saved" src="./images/save_black.png">
                <img class="not_saved" src="./images/save-instagram.png">
            </div>
            <div class="more">
                <img src="./images/show_more.png">
            </div>
            <div class="profile">
              <a href="{{ Route('profile-page') }} ">
                <img src="{{ $relative_path }}">
              </a>
            </div>
        </div></div>


        
          {{--End Reels --}}
          <br>
          
          
          @endforeach
        </div>
        @endsection

