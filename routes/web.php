<?php

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

/**
 * Rutas de AUTH con llamadas a sus propias rouths.
 */
Auth::routes();

Route::get('/api/messages/{messages}/responses','MessagesController@responses');

/**
 * Inician rutas de de navegación
 */
Route::get('/','PagesController@home');

Route::get('/home', 'Homecontroller@index');

Route::get('/auth/facebook','SocialAuthController@facebookLogin');

Route::get('/auth/facebook/callback','SocialAuthController@callback');

Route::post('/auth/facebook/register','SocialAuthController@facebookRegister');

/**
 *  Inician rutas de mensajes
 */
Route::get('/messages/{message}','MessagesController@show');

Route::post('/messages/create','MessagesController@store');

Route::get('/messages','MessagesController@search');

/**
 * Inician rutas de users.
 */

Route::get('/{username}/follows','UsersController@follows');

Route::get('/{username}/followers','UsersController@followers');

Route::get('/{username}','UsersController@index');

/**
 * Inician rutas de usuarios\mensajes
 */


/**
 * Agrupamos middlewares.
 */
Route::group(['middleware' => 'auth'],function (){
    /**
     *  Inician rutas protegidas de mensajes
     */
    Route::post('/messages/create','MessagesController@store');
    Route::get('/conversations/{conversation}','ConversationsController@show');
    /**
     * Inician rutas protegidas de usuarios\mensajes
     */
    Route::post('{username}/dms','UsersController@sendPrivateMessage');
    /**
     * Inician rutas protegidas de users
     */
    Route::post('/{username}/follow', 'UsersController@follow');
    Route::post('/{username}/unfollow', 'UsersController@unfollow');

    /**
     * Rutas para nuestra api con auth.
     */
    Route::get('/api/notifications', 'UsersController@notifications');



});


