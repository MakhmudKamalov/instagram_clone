<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


  protected function loginPage()
  {
    return view('login');
  }

  protected function logout()
  {
  }

  protected function signUpPage()
  {
    return view('sign_up');
  }

  protected function signUp(Request $request)
  {
    $valid = $request->validate([
      'email' => 'required|email|unique:users',
      'name' => 'required',
      'username' => 'required',
      'password' => 'required|min:8'
    ]);

    User::create([
      'name' => $request->name,
      'username' => $request->username,
      'status' => 0,
      'email' => $request->email,
      'password' => $request->password,
      'bio' => '',
      'photo' => ''
    ]);

    return redirect()->route('login-page');
  }


  protected function home()
  {

    $user = session('user');
    $id = $user['id'];
    $posts = Post::where('user_id', $id)->orderBy('created_at', 'desc')->get();

    return view('home', compact('user', 'posts'));
  }

  protected function loginTekseriw(Request $request)
  {
    $valid = $request->validate([
      'email' => 'required|email',
      'password' => 'required|min:8'
    ]);

    $email = $request->email;
    $password = $request->password;

    $count = User::count();

    if ($count === 0) {
      return back();
    } else {
      $user = User::where('email', $email)->first();

      if ($user['email'] == $email  and  $user['password'] == $password) {
        $id = $user['id'];
        session(['user' => $user]);
        $user = session('user');
        $posts = Post::where('user_id', $id)->orderBy('created_at', 'desc')->get();

        return view('home', ['user' => $user, 'posts' => $posts]);
      } else {
        return back();
      }
    }
  }


  protected function profilePage()
  {
    $user = session('user');
    $id = $user['id'];
    $count = Post::where('user_id', $id)->count();
    $posts = Post::where('user_id', $id)->get('URL');

    return view('profile', compact('user', 'count', 'posts'));
  }

  protected function editProfile()
  {
    $user = session('user');
    return view('edit-profile', compact('user'));
  }


  protected function  updateProfile(Request $request)
  {
    $user = session('user');
    $id = $user['id'];
    $user->update([
      'bio' => $request->bio,
      'status' => $request->status,
      'name' => $request->name,
      'username' => $request->username
    ]);

    // Проверка, был ли отправлен файл
    if (isset($_FILES['foto'])) {
      if ($_FILES['foto']['name'] != '') {

        $file_name = $_FILES['foto']['name'];
        $tmp_name = $_FILES['foto']['tmp_name'];
        $upload_directory = "C:/MAMP/htdocs/laravel-insta/public/images/";

        $target_file = $upload_directory . basename($file_name);
        move_uploaded_file($tmp_name, $target_file);

        $user->update([
          'photo' => $target_file
        ]);
      }
    }
    $count = Post::where('user_id', $id)->count();

    $posts = Post::where('user_id', $id)->get('URL');

    return view('profile', compact('user', 'count', 'posts'));
  }
}
