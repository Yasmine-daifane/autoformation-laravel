<?php

// request  

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
// lancer server 
//  php -s  localhos:8000 -t public 



                                                           // ROUTING

Route::get('/', function () {
    return view('welcome');
});

//the type of chaine de caracter  text/html; charset=UTF-8
// Route::get('/blog' ,function ()  {
//     return  'Bonjour mr';   


// });

// Bonjour mr
// http://127.0.0.1:8000/blog

// the  type of  array is  json // le serveur est  aasez intelligent pour savoir quel type de  retour il doit fair 

Route::get('/blog' ,function ()  {
    return  [
    //    recuperer les parametre suplementair (APP php standard )
        "name" => $_GET['name'], 
       "article" => "Article1" ,
       "jalil " => "jalil2"    
    ]; 
});

// http://127.0.0.1:8000/blog?name=yassmine
// {"name":"yassmine","article":"Article1","jalil ":"jalil2"}


            //   la bonne maniere de recuperer les  parametre suplementaire  dans  le cadre d'une APP laravel

      
            Route::get('/blog' ,function (Request $request)  {
                // return  
          // "name" => $request ->path(),
                    // {"name":"blog","article":"Article1","jalil ":"jalil2"}
           // "name" => $request ->url(),
                    // {"name":"http:\/\/127.0.0.1:8000\/blog","article":"Article1","jalil ":"jalil2"}
                    
          // "name" => $request ->all()
                    // va prendre tous les paraletre et va l'afficher sous form de table  http://127.0.0.1:8000/blog?name=yassmineage=22
                    // {"name":{"name":"yasmine","age":"22","ville":"casa"}} 
                    
                // si ont a besoint d'une infos specifique use methode input('cle') http://127.0.0.1:8000/blog?name=yassmine&age=22&ville=casa
                    //  "name" => $request ->input('name')
                    // {"name":"yassmine"}

                    //   l'avanatage de cet methode when we have nothing http://127.0.0.1:8000/blog ne vas pas avoir un erreur  instead is gonna  return NULL
                    // {"name":null}

            
            });


            // http://127.0.0.1:8000/blog/my-first-chance-15 

//  {"slug":"my","id":"first-chance-15"}
            // Pour la recuperation des parametre type 'chaine de carractere ' qui se trouve dans l'URL  
            // cuz it is defficult to change all the links partout. Solution = nommination des liens pour les trouver tres rapidement 
         
            Route::prefix('/blog')->name('blog.')->group(function()  {
                Route::get('/' ,function (Request $request) {

                    return [
                        "link" => \route('blog.show',['slug' => 'article' ,'id'=> 16]),
    
                    ];
                    // "link" => '/blog/my-first-chance-15 ' ,
                    // pour generer auto notre root 
                })->name('index');
                // commande to show the list of route that i have php artisan route:list  
                //    ont va utilise une method global Route(fisrt P nom de notre root , secode P optionel  ce sont les parametre a spicifier dans L'url )
                // dans le cadre de l'affichage d'un article il faut passer un slug + ID 
    // modele binding l'exucution apres routage  ( l'ordre est obligatoir dans ce cas ) 
                Route::get('/{slug}/{id}', function (string $slug ,string $id, Request $request ) {
                    // return 'BONJOURjj';
    
                    return [
                      "slug" => $slug ,
                      'id' => $id ,
                      'name'  =>$request ->input ('name'),
                    //   http://127.0.0.1:8000/blog/my-first-chance-15?name=yas
                    // {"slug":"my-first-chance","id":"15","name":"yas"}
    
                    ];

                    
    // methode suplemmenteire  specifier des contraintes sur un parametre je veux l'id = sa soit just le nombre  et slug = le resete 
    // {"slug":"my-first-chance","id":"15"}
    // i can add the request to know the name 
    // regular expression 
                })->where([
                 'id' => '[0-9]+',
                 'slug' => '[a-z0-9\-]+'
    
                ])->name('show');
        
         }); 
          
                // PREFIX
            //  regrouper plusieurs routes lorsque ils ont des points communs  on peut dire les deux root ont le meme prefix  . on change l'url une seul fois l'orsque of fait prefix 

            // pour fair un changement a plusieur route a un seul endroit 




           
        




