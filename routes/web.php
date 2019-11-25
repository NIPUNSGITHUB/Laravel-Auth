<?php
use App\Ticket;
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

        $tickets = Ticket::all();       
        return view('welcome',compact('tickets'));
 });

Auth::routes(['verify' => true]);
 
Route::group(['middleware' => ['auth','admin'] ], function () {

        Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
        // Route::post('/register','RegisterController@create')->name('register');
        Route::get('/create/ticket','TicketController@create');
        Route::post('/create/ticket','TicketController@store');
        Route::get('/ticket','TicketController@index');
        Route::get('/edit/ticket/{id}','TicketController@edit');
        Route::post('/update/ticket','TicketController@update');
        Route::get('/delete/ticket/{id}','TicketController@destroy');
        
});