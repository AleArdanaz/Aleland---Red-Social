<?php
namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Like;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function getAccount(){
    return view('miusuario');
  }

  public function postUser($id){
    $user = User::find($id);
    $userposts = Post::where('user_id', $id)->orderBy('created_at', 'DESC')->get();
    $likes = Like::where('user_id', $user->id)->get();
    $postlikeds= array();
      $postlikeds = Post::where('id', $likes->post_id)->get();

    return view('usuario', compact('user','userposts','postlikeds'));
  }

  public function postLiked($id){
    $user = User::find($id);
    $like = Like::where('user_id', $user->id)->first();
    $postlikeds = Post::where('post_id', $like->post_id);
    return view('usuario', ['postlikeds' => $postlikeds]);

  }

}





 ?>
