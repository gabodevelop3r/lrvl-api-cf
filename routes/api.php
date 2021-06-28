<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\PostController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\CommentController;
use App\Http\Controllers\Api\AuthControllert;
use App\Http\Controllers\Api\V1\PostRelationShipController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// rutas api version 1
Route::group([
    
    'prefix'=>'v1', # version de la api
    'middleware'=>["auth:api"] # autenticacion de passport en las rutas de la api

],function(){

    Route::apiResources([
            'posts'=> PostController::class,
            'users'=> UserController::class,
            'comments'=> CommentController::class, 
    ]);
    

    Route::apiResource('posts',PostController::class);

    Route::get('/posts/{post}/relationship/author',[PostRelationShipController::class, 'author'])->name('post.relationship.author');
    Route::get('/posts/{post}/author',[PostRelationShipController::class, 'author'])->name('post.author');

    Route::get('/posts/{post}/relationship/comments',[PostRelationShipController::class, 'comments'])->name('post.relationship.comments');
    Route::get('/posts/{post}/comments',[PostRelationShipController::class, 'comments'])->name('post.comments');
    

});

// rutas api version 2
Route::group([
    
    'prefix'=>'v2', # version de la api
    'namespace'=>'Api\V2', # ubicacion de nuestros controllers

],function(){

   

});

/* rutas para crear y loguear usuario */
Route::post('login',[AuthControllert::class, 'login']);
Route::post('signup',[AuthControllert::class, 'signup']);