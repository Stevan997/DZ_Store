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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/adminpanel')->group(function(){
    Route::view('/', 'admin');
    Route::view('/forma', 'forma');
    Route::get('/formaPregled/{jsp}/{tip}', 'AdminController@formaIzmena');  


    Route::get('/proizvodiPregled', 'AdminController@pregledProiz');
    Route::post('/proizvodiPregled/filter', 'AdminController@sortProizvoda');
    Route::put('/proizvodiPregled/{jsp}', 'AdminController@izmenaProizvoda');
    Route::get('/proizvodiPregled/obrisi/{jsp}', 'AdminController@brisanjeProizvoda');

    Route::get('/korisniciPregled', 'AdminController@pregledKori');
    Route::post('/korisniciPregled/filter', 'AdminController@sortKorisnika');
    Route::put('/korisniciPregled/{id}', 'AdminController@izmenaKorisnika');
    Route::get('/korisniciPregled/admin/{id}', 'AdminController@adminKorisnik');
    Route::get('/korisniciPregled/obrisi/{id}', 'AdminController@obrisiKorisnika');
    Route::post('/', 'AdminController@podaci');
    Route::get('/success', 'AdminController@povratak');
});

Route::prefix('/prodavnica')->group(function(){
    Route::get('/', 'ProizvodiController@index');
    Route::get('/korpa', 'KorpaController@prikazi');
    Route::post('/filter', 'ProizvodiController@sort');
    Route::get('/{id}', 'ProizvodiController@proizvod');
    Route::get('/{id}/ubaci', 'KorpaController@index');
    Route::get('/{id}/izbaci', 'KorpaController@izbaci');

});

Route::prefix('/korisnik')->group(function(){
    Route::view('/promenaPodataka', 'korisnik.korisnikIzmena');
    Route::view('/promenaLozinke', 'auth.passwords.reset');
    Route::view('/verifikovanje', 'auth.verify');

});


Auth::routes();

Route::get('/home', 'ProizvodiController@index')->name('home');
