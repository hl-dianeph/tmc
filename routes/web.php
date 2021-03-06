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

Route::get('/', 'FrontendController@index')->name('home');
Route::get('/static/{slug}', 'FrontendController@showStaticPage')->name('static');


Route::get('/categories', 'FrontendController@showCategories')->name('categories.index');
Route::get('/categories/{slug}', 'FrontendController@showCategory')->name('categories.show');

Route::get('/channels/create', 'FrontendController@showCreateChannel')->name('channels.create');
Route::get('/channels/{name}', 'FrontendController@showChannel')->name('channels.show');

Route::get('/search', 'FrontendController@search')->name('search');


Route::get('/handleauth', 'Auth\LoginController@handleAuth');

// Telegram
Route::get('/login/telegram', 'Auth\LoginController@showTelegramLoginForm')->name('login.telegram');
Route::post('/auth/telegram', 'Auth\LoginController@handleTelegramLogin')->name('auth.telegram');

// Route::get('auth/telegram/callback', 'Auth\LoginController@handleProviderCallback');



// AJAX
Route::group(['prefix' => 'ajax'], function() {
	Route::get('/get-channel', 'ChannelController@ajaxGetChannel');
	Route::post('/post-addchannel-step1', 'ChannelController@ajaxPostAddChannelStep1');
	Route::post('/post-addchannel-step2', 'ChannelController@ajaxPostAddChannelStep2');
	Route::post('/post-addchannel-step3', 'ChannelController@ajaxPostAddChannelStep3');
	Route::post('/post-checkchannel-subscription', 'ChannelController@ajaxPostCheckChannelSubscription');
	Route::post('/post-uploadavatar', 'ChannelController@ajaxPostUploadAvatar');
	Route::post('/post-createchannel', 'ChannelController@ajaxPostCreateChannel');
});



// TODO: remove this in production
Route::get('/logout', function(Request $request) {
	Auth::logout();
	$request->session()->invalidate();
	return redirect('/');
});

// Auth
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// backend
Route::prefix('backend')->as('backend.')->middleware(['auth', 'role:administrator'])->group(function() {
	Route::get('/', 'BackendController@index')->name('index');

	// settings
	Route::get('/settings', 'SettingController@index')->name('settings.index');
	Route::post('/settings/account', 'SettingController@updateAccount')->name('settings.account');
	Route::post('/settings/seo', 'SettingController@updateSeo')->name('settings.seo');
	Route::post('/settings/icons', 'SettingController@updateIcons')->name('settings.icons');

	// resources
	Route::resource('categories', 'CategoryController');
	Route::resource('staticPages', 'StaticPageController');
	Route::resource('types', 'TypeController');


	Route::get('/moderation/channels', 'ChannelModerationController@index')->name('channels.moderation.index');
	Route::get('/moderation/channels/{id}/edit', 'ChannelModerationController@edit')->name('channels.moderation.edit');
	Route::put('moderation/channels/{id}', 'ChannelModerationController@moderate')->name('channels.moderation.moderate');
	Route::patch('moderation/channels/{id}', 'ChannelModerationController@moderate')->name('channels.moderation.moderate');
	Route::delete('/moderation/channels/{id}', 'ChannelModerationController@destroy')->name('channels.moderation.destroy');

	Route::resource('channels', 'ChannelController');

});

// Route::get('backend/categories', ['as'=> 'backend.categories.index', 'uses' => 'CategoryController@index']);
// Route::post('backend/categories', ['as'=> 'backend.categories.store', 'uses' => 'CategoryController@store']);
// Route::get('backend/categories/create', ['as'=> 'backend.categories.create', 'uses' => 'CategoryController@create']);
// Route::put('backend/categories/{categories}', ['as'=> 'backend.categories.update', 'uses' => 'CategoryController@update']);
// Route::patch('backend/categories/{categories}', ['as'=> 'backend.categories.update', 'uses' => 'CategoryController@update']);
// Route::delete('backend/categories/{categories}', ['as'=> 'backend.categories.destroy', 'uses' => 'CategoryController@destroy']);
// Route::get('backend/categories/{categories}', ['as'=> 'backend.categories.show', 'uses' => 'CategoryController@show']);
// Route::get('backend/categories/{categories}/edit', ['as'=> 'backend.categories.edit', 'uses' => 'CategoryController@edit']);
