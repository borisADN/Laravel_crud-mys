<?php
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', fn () => view('welcome'));

Route::resource('post', PostController::class);
/*Cette ligne de code crée plusieurs routes pour le contrôleur PostController. 
Les routes générées permettent de gérer les opérations CRUD pour une ressource appelée "post". 
Voici un aperçu des routes créées :*/
/*Avantages d'Utiliser Route::resource
Gain de Temps : Génère automatiquement toutes les routes CRUD nécessaires.
Convention over Configuration : Encourage l'utilisation de conventions standard, ce qui rend le code plus lisible et maintenable.
Simplicité : Réduit la quantité de code nécessaire pour déclarer les routes.
En résumé, Route::resource('post', PostController::class) permet de déclarer rapidement et 
facilement toutes les routes nécessaires pour les opérations CRUD sur une ressource "post", en 
utilisant les conventions RESTful de Laravel.

pour voir toute les commandes php artisan route:list
*/ 

