<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LikesController extends Controller
{
  public function LikesAction(Post $post)
  {
    $user = Auth::user();
    $stats = $user->likes()->toggle($post);
    return back();
  }
}
