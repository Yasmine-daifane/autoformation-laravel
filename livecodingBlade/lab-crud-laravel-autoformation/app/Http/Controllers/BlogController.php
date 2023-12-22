<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View as ViewView;

class BlogController extends Controller
{
    public function index():View {
       
        return View('blog.index' ,[
      
            'posts' =>Admin::paginate(2) 
        ]);
    }
    // public function show(string $slug ,string $id):RedirectResponse | Admin 
 
    public function show(string $slug ,string $id):RedirectResponse | View {
        $post= Admin::findOrFail($id);
        if ($post->slug !== $slug) {
            // dd($post->slug , $slug);
            return to_route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
            // dd($test);
        }
        
    // return $post;
    return view('blog.show' ,[
        'post'=> $post

    ]);

       
    }
}
//  lister les article lo'sque fais l'appele d'une vue ont a la possibilite de lui envoyer des variable pour generer les choses 
