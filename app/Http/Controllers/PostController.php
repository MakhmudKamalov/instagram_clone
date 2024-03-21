<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
  //
  protected function addPost(CreatePostRequest $request)
  {

    $user = session('user');
    $id = $user['id'];

    $path = $request->file('post-photo');
    $name = time() . $path->getClientOriginalName();
    $mime = $path->getClientOriginalExtension();
    $array = ['jpg', 'jpeg', 'mp4'];
    if (in_array($mime, $array)) {
      if ($path->move(public_path('images/posts/'), $name)) {
        $newPost = Post::create([
          'user_id' => $id,
          'name' => $request->value,
          'URL' => $name,
          'likes' => 0,
          'comments' => 0
        ]);
      } else {
        return 'juklenbedi';
      }
    }
    $count = Post::where('user_id', $id)->count();

    $posts = Post::where('user_id', $id)->get('URL');

    return view('profile', compact('user', 'count', 'posts'));
  }
}
