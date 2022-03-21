<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function showToFavorite()
    {
        $posts = session()->get('favorite') ?? [];
        return view('backend.favorite.list',compact('posts'));
    }


    public function addToFavorite($id)
    {
        $post = Post::findOrFail($id);
        $favorite = session('favorite', []);
        if (isset($favorite[$id])) {
            $favorite[$id] ['quantity']++;
        } else {
            $favorite[$id] = array(
                'id' => $post->id,
                'content' => $post->content,
                'user_id' => $post->user->name,
                'image' => $post->image,
                'quantity' => 1
            );
        }

        session()->put('favorite', $favorite);
        return redirect()->back()->with('success', 'added to favorite successfully!');
    }

    public function deleteToFavorite($id)
    {
        $post = session()->get('favorite');
        if ($post[$id]['quantity'] > 1) {
            $post[$id]['quantity']--;
        } else {
            unset($post[$id]);
        }
        session()->put('favorite', $post);
        return redirect()->back();
    }
}
