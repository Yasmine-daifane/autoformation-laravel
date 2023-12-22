<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// l'avantage du systeme de migration : permettre d'interagir avec la creation des table avec une api php a la place  de using sql  l'avantage c'est que ca il s'adapte quel que soit le systeme de gestion de base donnee . permets aussi de definir la strecture de mes table 
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // i wanna creat a table name admins
        Schema::create('admins', function (Blueprint $table) {
            // champ Id auto increment 
            $table->id();
            // avoir un chaine de caracter 
            $table-> string('title');
               // avoir un chaine de caracter qui sera slug 
               $table-> string('slug')->unique(); 
               $table ->longText('content'); 
            //    la date de creation de chaque admin et la date de mis a jour 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // drop table admins 
        Schema::dropIfExists('admins');
    }
};

// demarer notre migration using this commande :
// php artisan migrate 
// un autre composant les modeles on peut le generer par un lign de command 
// le nom du modele correspondra au nom du table au singulier 
// php artisan make:model Admin
// on peut demander a laravell de crer les deux en meme temps migration + model en faisant : php artisan make:model Admin -m 
// recuperer des infos et le sauvgarder 