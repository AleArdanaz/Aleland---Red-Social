<?php
namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class UserController extends Controller
{
  public function getAccount(){
    return view('miusuario');
  }

  public function postsUser($id){
    $user = User::find($id);
    $userposts = Post::where('user_id', $id)->orderBy('created_at', 'DESC')->get();
    $likes = Like::where('user_id', $user->id)->get();
    //$postlikeds = Post::where('post_id', $likes->post_id)->get();

    return view('usuario', compact('user','userposts','likes'));
  }
}





 ?>
