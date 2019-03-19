<?php
namespace App\Http\Controllers;

use App\Post;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{

  protected function store(Request $request)
  {
    $validateData =$request->validate([
      'body' => ['required', 'string', 'max:255'],
    ]);

    $post = new Post;
    $post->body = $request->body;
    $request->user()->posts()->save($post);

    return redirect(route('home'));
  }
  public function index()
  {
      $posts = Post::orderBy('created_at', 'DESC')->get();
      return view('home', ['posts' => $posts]);
  }

  public function borrarPost($post_id) {
    $post = Post::where('id', $post_id)->first();
    if (Auth::user() != $post->user) {
      return redirect()->back();
    }
    $post->delete();
    return redirect(route('home'));

  }
  public function likePost($post_id) {
    $alredy_like= Like::where(['user_id' => Auth::user()->id, 'post_id' => $post_id])->first();
    if (empty($alredy_like)) {
      $like = new Like;
      $like->post_id = $post_id;
      $like->user_id = Auth::user()->id;
      $like->save();
      return redirect(route('home'));
    } else {
      echo "Esto ya lo habias likeado";;
    }

}
}


   ?>
