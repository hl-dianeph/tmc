<?php

use App\User;
use Illuminate\Http\Request;

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

Route::get('/', function () {

});


Route::get('/handleauth', 'Auth\LoginController@handleAuth');

// TODO: remove this in production
Route::get('/logout', function(Request $request) {
	Auth::logout();
	$request->session()->invalidate();
	return redirect('/login');
});
Auth::routes();

Route::prefix('backend')->as('backend.')->middleware(['role:administrator'])->group(function() {
	Route::get('/', 'BackendController@index')->name('index');

	Route::resource('categories', 'CategoryController');
});

// Route::get('backend/categories', ['as'=> 'backend.categories.index', 'uses' => 'CategoryController@index']);
// Route::post('backend/categories', ['as'=> 'backend.categories.store', 'uses' => 'CategoryController@store']);
// Route::get('backend/categories/create', ['as'=> 'backend.categories.create', 'uses' => 'CategoryController@create']);
// Route::put('backend/categories/{categories}', ['as'=> 'backend.categories.update', 'uses' => 'CategoryController@update']);
// Route::patch('backend/categories/{categories}', ['as'=> 'backend.categories.update', 'uses' => 'CategoryController@update']);
// Route::delete('backend/categories/{categories}', ['as'=> 'backend.categories.destroy', 'uses' => 'CategoryController@destroy']);
// Route::get('backend/categories/{categories}', ['as'=> 'backend.categories.show', 'uses' => 'CategoryController@show']);
// Route::get('backend/categories/{categories}/edit', ['as'=> 'backend.categories.edit', 'uses' => 'CategoryController@edit']);
