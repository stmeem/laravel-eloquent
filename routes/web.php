<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|----------------------------------------------------------------------------
| Eloquent Relation
|----------------------------------------------------------------------------
 */

// One-to-one relationship
Route::get('user/{id}/post', function($id){
  return User::find($id)->post ;
});

// Inverse relationship
Route::get('post/{id}/user', function($id){
    return Post::find($id)->user;
});

// One-to-many relationship
Route::get('/posts', function(){
    $user=User::find(1);
   foreach ($user -> posts as $post) {
       echo $post['title'] . "<br>";
   }
});

//Many-to-many relationship
Route::get('user/{id}/role', function($id) {
    $user= User::find($id)-> roles()->orderBy('id','desc')->get();
    return $user;
//    foreach ($user -> roles as $role) {
//        return $role->name;
//    }
});
