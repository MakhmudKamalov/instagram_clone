@extends('layouts.sidebar')
  
  @section('part-1')
    
  @php
  $path = $user['photo'];
  $base_path = "C:/MAMP/htdocs/laravel-insta/public";
  $relative_path = substr($path, strlen($base_path));
  @endphp
  @endsection
  
@section('content')
  
        <div class="profile_container">
            <div class="profile_info">
                <div class="cart">
                  
                        <div class="img">
                            <img src=".{{ $relative_path }}" alt="">
                        </div>
                        <div class="info">
                          <p class="name">
{{ $user['username'] }}                           
                            <a href="{{ Route('edit-profile') }}" class="btn btn-secondary" style="margin-right: 10px"> Edit profile </a>
                              
                          </p>
                          <div class="general_info">
                            <p><span>{{ $count }}</span> post</p>
                                <p><span>0</span> followers</p>
                                <p><span>0</span> following</p>
                            </div>
                            <p class="nick_name">{{ $user['name'] }}</p>
                            <p class="desc">{{ $user['bio'] }}
                            </p>
                        </div>
                </div>
            </div>
            <div class="highlights">
               
                <div class="highlight highlight_add">
                    <div class="img">
                        <img src="./images/plus.png" alt="">
                    </div>
                    <p>New</p>
                </div>
            </div>
            <hr>
            <div class="posts_profile">
                <ul class="nav-pills w-100 d-flex justify-content-center" id="pills-tab" role="tablist">
                    <li class="nav-item mx-2" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                            <img src="./images/feed.png" alt="posts">
                            POSTS
                        </button>
                    </li>
                    <li class="nav-item mx-2" role="presentation">
                      <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                        <img src="./images/video.png" alt="saved posts">
                        REELS
                      </button>
                    </li>
                    <li class="nav-item mx-2" role="presentation">
                      <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                        <img src="./images/tagged.png" alt="tagged posts">
                        TAGGED
                      </button>
                    </li>
                  </ul>
                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                        <div id="posts_sec" class="post">
                          @foreach ($posts as $p)
                          @php
$path = $p['URL'];
                          @endphp
                             <div class="item">
                              <img class="img-fluid item_img" src="./images/posts/{{$path }}" alt="">

                            </div>
                          @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                        <div id="saved_sec" class="post">
                          @foreach ($posts as $v)
                          @php
                          $video = $v['URL'];
@endphp
@if (strpos($video, '.mp4') !== false)
@php

                          $base_addres = "C:/MAMP/htdocs/laravel-insta/public";
                          $relative_name = substr($video, strlen($base_addres));
                          @endphp
<div class="item">
  <img class="img-fluid item_img" src="{{ $relative_name }}" alt="{{ $relative_name }}">
</div>

@endif
                            
                          @endforeach

                             
                            
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                        <div id="tagged" class="post">
                            {{-- <div class="item">
                                <img class="img-fluid item_img" src="https://i.ibb.co/Zhc5hHp/account4.jpg" alt="">
                            </div>
                             --}}
                        </div>
                    </div>
                    
                  </div>
            </div>
        </div>


       


    
@endsection




