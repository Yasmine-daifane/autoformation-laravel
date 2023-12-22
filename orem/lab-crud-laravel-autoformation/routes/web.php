<?php


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
/*
     //  chapitre L'orem   
    //  communiquer avec une base  de donnee avec laravel  
    // l'orem c'st le demunitif de Object Relationnel Mapping  
    // ce  sont des classes qui vont  permettre d'interagir avec les donnee en BD qui vont permettre  de  les representent  sous forme d'objet 
// a la place de creer  la table et creer les infos d'interieur  dans la ravel on a : 
// - on va utiliser le systeme  de migration 
// creer une migration qui va permettre de rajouter les infos  dans notre BD (nomme notre migration)
// php artisan make:migration create_admins_table 


on va creer un nouvelle admin  on intialise notre admin 
on va affexter les propieter de cet objet (admin)
sauvgarder les donner using methode save dans notre BD 
notre BD sqlite view : https://sqliteviewer.app/?ref=vscode#/database.sqlite/table/admins/
le slug est utile just pour la creation de un seul admin une seul fois il est unique 
utilise Post pour recuperer des infos par exemple recuperer tous les admin depuis ma DB using le smethode statique 
mthode die and debug pour regarder a quoi ressemble un objet par exemple le type d'un retour , debouguer une variable 
le return de cette methode est collection alors collection c'est quelque chose qui se comporte comme un tableau ms contient des methodes specifique 
first () methode sur  les collection de laravel qui fais le retourne de 1er element 
 using find () methode recupurer un admin specifique en donne l'id de ce admin 
 findorfail methode  sa va etre pratique si vous ne  voulez pas executer le reste de code s'il n'a pas trouve dans l'enregistrement 
 querybuilder where  va permettre de concevoir des requetes des condition des join  le respnsable de convert  le code a une requete sql valable quel que soit le systeme de GBD que ont utilisent passer de mysql a sqllite  plus facile 
a la place  d'une  requete sql vous pouvez  utilise the code pour recuperer specifique elemnt
recuperer les element superier a 0  
les methodes Raccourcis  create/update/delete  pour  la creation et la mis a jour   va prendre un tableau avec les differentes champs 
il ya une securite dans laravelle  lorsqu'on essai de creer un objet apartir d'un tableau il n'autorise pas il faut preciser dans le modele post

update lors d'un query builder  mis a jour  update () de plusieur element or delete () 



*/

// {"title":"yasmine","slug":"mon int","content":"le admin de cette interface est yasminele admin de cette interface est yasmine",
    // "updated_at":"2023-10-27T14:48:59.000000Z","created_at":"2023-10-27T14:48:59.000000Z","id":4}

Route::get('/', function () {
    return view('welcome');
});


            Route::prefix('/blog')->name('blog.')->group(function()  {
                Route::get('/' ,function (Request $request) {
                    // sauvgarde des donner 
                    // $admin = new \App\Models\Admin();
                    // $admin->title = 'yasmine';
                    //   $admin ->slug = 'me';
                    //    $admin-> content = 'le admin de cette interface est yasminele admin de cette interface est yasmine';
                    //     $admin->save();

                    //      return $admin ;
                      // rucuperer les donner 
                    //    return \App\Models\Admin::all(['title','id', 'content']) ;
                            //    $posts = \App\Models\Admin::all(['title','id', 'content']) ;
                                //  $posts = \App\Models\Admin::paginate(2 ,['id', 'title']) ;
                                //  $posts = \App\Models\Admin::where('id' , '>' , 1)->limit(1)->get();

                        //    $posts = \App\Models\Admin::find(2) ;
                        //    modifier title 
                        //    $posts-> title = 'New title';
                        //    methode classique delete ,save 
                        //    $posts-> delete() ;
                            //  dd($posts[0] ->title );
                            // dd($posts -> first());
                            // $posts = \App\Models\Admin::Create([
                            //     'title'=> 'mon nouveau' ,
                            //     'slug'=> 'neauveau ' ,
                            //     'content' => 'neauveau contenu ' 

                            // ]) ;
                          $posts = \App\Models\Admin::where( 'id' ,'>',0)->update([
                            'title' => 'mon',
                           'content' => 'neauveau contenu ' 

                          ]) ;
                  

                            dd($posts) ;
                            //   return ($posts) ;
                    return [
                        "link" => \route('blog.show',['slug' => 'article' ,'id'=> 16]),
    
                    ];
                   
                })->name('index');
             
                Route::get('/{slug}/{id}', function (string $slug ,string $id, Request $request ) {
                 
    
                    return [
                      "slug" => $slug ,
                      'id' => $id ,
                      'name'  =>$request ->input ('name'),
                
    
                    ];

                })->where([
                 'id' => '[0-9]+',
                 'slug' => '[a-z0-9\-]+'
    
                ])->name('show');
        
         }); 
          
    




           
        








   