<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogFilterRequest;
use App\Models\Admin;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View as ViewView;

class BlogController extends Controller
{
    public function index(BlogFilterRequest $request ):View {
        dd($request->validated()) ;
        
        // return View('blog.index' ,[
      
        //     'posts' =>Admin::paginate(2) 
        // ]);

    //   $validator =   Validator::make([
    //         'title' =>'yahhhhhh'
            
        // ], [
            //  'title' => 'required|min:8'
            // 'title' => [Rule::unique('admins')->ignore(2)]
        // ]);
        // dd($validator -> fails());
        // dd($validator -> errors());
        // dd($validator ->validate
        // ());

       
    
    } 

    public function create(){
        return view('test.create');

    }

    public fuction store (request $request) {

        $table = post::create ([
         'test' =>$request -> input('test'), 
    
         'name' =>$request -> input('name'), 
         'content' =>$request -> input('Content'), 
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
