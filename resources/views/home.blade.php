@extends('layouts.sidebar')
@section('part-1')
@php
$path = $user['photo'];
$base_path = "C:/MAMP/htdocs/laravel-insta/public";
$relative_path = substr($path, strlen($base_path));
@endphp
  
@endsection
@section('content')
        <div class="second_container">
            <!--***** posts_container start ****** -->
            <div class="main_section">
                <div class="posts_container">
                    <div class="stories ">
                      <div class="item ">
                        <div class="owl-item active" style="width: 62.857px; margin-right: 5px;"><div class="item_s">
                          <img src="{{ $relative_path }}">
                          <p>{{ $user->name }}</p>
                        </div></div>
                      </div>
                    </div>
                    <div class="posts">
                      {{-- Post --}}
                      @foreach ($posts as $p)
                      @php
$created_at = strtotime($p['created_at']); // Преобразуем строку во временную метку
$current_time = time(); // Получаем текущую временную метку
$elapsed_seconds = $current_time - $created_at; // Вычисляем разницу в секундах

if ($elapsed_seconds < 60) {
    $elapsed = $elapsed_seconds . 's'; // Секунды
} elseif ($elapsed_seconds < 3600) {
    $elapsed = floor($elapsed_seconds / 60) . 'm'; // Минуты
} elseif ($elapsed_seconds < 86400) {
    $elapsed = floor($elapsed_seconds / 3600) . 'h'; // Часы
} else {
    $elapsed = floor($elapsed_seconds / 86400) . 'd'; // Дни
}
                      $post_pat = $p['URL'];
                    @endphp
                      <div class="post">
                        <div class="info">
                          <div class="person">
                              <img src="{{ $relative_path }}">
                              <a href="#">{{ $user['name'] }}</a>
                              <span class="circle">.</span>
                              <span>{{  $elapsed }}</span>
                          </div>
                          <div class="more">
                              <img src="./images/show_more.png" alt="show more">
                          </div>
                        </div>
                        <div class="image">
                          <img src="./images/posts/{{ $post_pat }}">
                        </div>
                        <div class="desc">
                          <div class="icons">
                              <div class="icon_left d-flex">
                                  <div class="like">
                                      <img class="not_loved" src="./images/love.png">
                                      <img class="loved" src="./images/heart.png">
                                  </div>
                                  <div class="chat">
                                      <button type="button" class="btn p-0" data-bs-toggle="modal" data-bs-target="#message_modal">
                                          <img src="./images/bubble-chat.png">
                                      </button>
                                  </div>
                                  <div class="send">
                                      <button type="button" class="btn p-0" data-bs-toggle="modal" data-bs-target="#send_message_modal">
                                          <img src="./images/send.png">
                                      </button>
                                  </div>
                              </div>
                              <div class="save not_saved">
                                  <img class="hide saved" src="./images/save_black.png">
                                  <img class="not_saved" src="./images/save-instagram.png">
                              </div>
                          </div>
                          <div class="liked">
                              <a class="bold" href="#">{{ $p['likes'] }} likes</a>
                          </div>
                          <div class="post_desc">
                              <p>
                                  <a class="bold" href="#">{{ $user['name'] }}</a>
{{ $p['name'] }} </p>
                              <p><a class="gray" href="#">View all 2 comments</a></p>
                              <input type="text" placeholder="Add a comments...">
                          </div>
                        </div>
                          </div>
                      @endforeach

                      {{-- End of Post --}}
                          
                    </div>
                </div>
            </div>
            <!--***** posts_container end ****** -->

            <!--***** followers_container start ****** -->
            <div class="followers_container">
                <div>
                    <div class="cart">
                        <div>
                            <div class="img">
                                <img src="{{ $relative_path }}" alt="">
                            </div>
                            <div class="info">
                                <p class="name">Zineb_essoussi</p>
                                <p class="second_name">Zim Ess</p>
                            </div>
                        </div>
                        <div class="switch">
                            <a href="#">Switch</a>
                        </div>
                    </div>
                    <div class="suggestions">
                        <div class="title">
                            <h4>Suggestions for you</h4>
                            <a class="dark" href="#">See All</a>
                        </div>
                        <div class="cart">
                            <div>
                                <div class="img">
                                    <img src="{{ $relative_path }}" alt="">
                                </div>
                                <div class="info">
                                    <p class="name">Zineb_essoussi</p>
                                    <p class="second_name">Zim Ess</p>
                                </div>
                            </div>
                            <div class="switch">
                                <button class="follow_text" href="#">follow</button>
                            </div>
                        </div>
                        <div class="cart">
                            <div>
                                <div class="img">
                                    <img src="{{ $relative_path }}" alt="">
                                </div>
                                <div class="info">
                                    <p class="name">Zineb_essoussi</p>
                                    <p class="second_name">Zim Ess</p>
                                </div>
                            </div>
                            <div class="switch">
                                <button class="follow_text" href="#">follow</button>
                            </div>
                        </div>
                        <div class="cart">
                            <div>
                                <div class="img">
                                    <img src="{{ $relative_path }}" alt="">
                                </div>
                                <div class="info">
                                    <p class="name">Zineb_essoussi</p>
                                    <p class="second_name">Zim Ess</p>
                                </div>
                            </div>
                            <div class="switch">
                                <button class="follow_text" href="#">follow</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--***** followers_container end ****** -->

        </div>
        @endsection
