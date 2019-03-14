<?php
namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function getAccount(){
    return view('miusuario');
  }

  public function postUser($id){
    $user = User::find($id);
    $userposts = Post::where('user_id', $id)->orderBy('created_at', 'DESC')->get();
    return view('usuario', ['user' => $user],['userposts' => $userposts ]);
  }

  public function index(){

  }
}





 ?>
