<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ViewController extends Controller
{
  //
  protected function explore()
  {
    return view('explore');
  }

  protected function reels()
  {
    $user = session('user');
    $id = $user['id'];
    $posts = Post::where('user_id', $id)->where('URL', 'like', '%' . '.mp4')->get();

    return view('reels', ['user' => $user, 'posts' => $posts]);
  }

  protected function messages()
  {
    return view('messages');
  }
}
