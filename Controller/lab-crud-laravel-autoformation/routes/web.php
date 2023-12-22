<?php

use App\Http\Controllers\BlogController;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// les controlleur sont une manier d'organiser le code de regrouper les methode  qui ont un trai a la meme logique
// deux partie de mvc partie modele qui permet de recuperer les informations et d'interragire avec la BD sous formes d'objet
// controller  : Nous utilisons un contrôleur pour définir une classe qui inclut des actions (fonctions) contenant la logique pour récupérer des données depuis le modèle et les transmettre à la vue


Route::get('/', function () {
    return view('welcome');
});


            Route::prefix('/blog')->name('blog.')->controller(BlogController::class)->group(function()  {
              
                      
               Route::get('/' ,'index')->name ('index');
                   
           
             
                Route::get('/{slug}/{id}', 'Show')->where([
                 'id' => '[0-9]+',
                 'slug' => '[a-z0-9\- ]+'
    
                ])->name('show');
        
         }); 

       
          
    



           
        








   