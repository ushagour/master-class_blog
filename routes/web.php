<?php

use Illuminate\Support\Facades\Route;
use App\Tag;
use App\Category;
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

 Route::get('/','FrontEndController@index');
 Route::get('/post/{slug}','FrontEndController@SinglePost')->name('post.single');





 Auth::routes();
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    


    Route::get('/home', 'HomeController@index')->name('home');
    



    #region categries
    Route::get('/category', 'CategoriesController@index')->name('category.index');
    Route::get('/category/create', 'CategoriesController@create')->name('category.create');
    Route::post('/category/store', 'CategoriesController@store')->name('category.store');
    Route::get('/category/edit/{id}', 'CategoriesController@edit')->name('category.edit');
    Route::post('/category/update/{id}', 'CategoriesController@update')->name('category.update');
    Route::get('/category/delete/{id}', 'CategoriesController@destroy')->name('category.destroy');// nb 3lach makhdamach delete methode
    //end region categoies


    #region posts
    Route::get('/post', 'PostController@index')->name('post.index');
    Route::get('/post/create', 'PostController@create')->name('post.create');
    Route::post('/post/store', 'PostController@store')->name('post.store');
    Route::get('/post/edit/{id}', 'PostController@edit')->name('post.edit');
    Route::post('/post/update/{id}', 'PostController@update')->name('post.update');
    Route::get('/post/delete/{id}', 'PostController@destroy')->name('post.delete');// softdelete 
    Route::get('/post/trashed', 'PostController@trashed')->name('post.trashed');
    Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');// restoring softdelete data 
    Route::get('/post/kill/{id}', 'PostController@kill')->name('post.kill');// restoring softdelete data 

    //end region post





    #region tags 
    Route::get('/tag', 'Tagscontroller@index')->name('tag.index');
    Route::get('/tag/create', 'Tagscontroller@create')->name('tag.create');
    Route::post('/tag/store', 'Tagscontroller@store')->name('tag.store');
    Route::get('/tag/edit/{id}', 'Tagscontroller@edit')->name('tag.edit');
    Route::post('/tag/update/{id}', 'Tagscontroller@update')->name('tag.update');
    Route::get('/tag/delete/{id}', 'Tagscontroller@destroy')->name('tag.destroy');

    //end region tags

    #region users
    Route::get('/users', 'UserController@index')->name('users.index');
    Route::get('/user/create', 'UserController@create')->name('user.create');
    Route::post('/user/store', 'UserController@store')->name('user.store');
    Route::post('/user/update/{id}', 'UserController@update')->name('user.update');
    Route::get('/user/delete/{id}', 'UserController@destroy')->name('user.destroy');// nb 3lach makhdamach delete methode
    Route::get('/user/toggle/{id}/{state}', 'UserController@toggle')->name('users.toggle'); 
    
//profile
    Route::get('/profile', 'ProfileController@index')->name('profile.index');
    Route::get('/profile/edit/{id}', 'ProfileController@edit')->name('profile.edit');
    Route::post('/profile/update/{id}', 'ProfileController@update')->name('profile.update');

    //end region users

// region setting
Route::get('/setting', 'SettingController@index')->name('setting.index');
Route::post('/setting/update/{id}', 'SettingController@update')->name('setting.update');

//end region 



});







#test
// testing our relatinsheep elequent with proprtys 
Route::get('/test', function(){
 
return App\User::find(1)->profile->avatar;  //  bghiina nchpofo les tag associer lwahd post by id dyaloo

});
