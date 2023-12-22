<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// proveint de eloquent le nom de l'orem dans laravel 
// en va utiliser cet objet pour communiquer  facilement avec notre BD
// preciser  les champs qui seront remplissable  en utilisation propriete protegé  fillable  en va le donner un table contennat l'ensemble des infos
// guarded il fais l'inverse  definit les champs qui ne sont pas remplissable  

class Admin extends Model
{
    // un trait qui permet de generer des donnee
    use HasFactory;
   protected  $fillable = [

     'title',
     'slug',
     'content',


   ];
//   protected  $guarded =[] ;
 
}
// "title" => "mon nouveau"
// "slug" => "neauveau "
// "content" => "neauveau contenu "
// "updated_at" => "2023-10-30 13:02:25"
// "created_at" => "2023-10-30 13:02:25"
// "id" => 6