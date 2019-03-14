<?php
namespace App\Http\Controllers;

use App\Post;
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
}


 ?>
