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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'ProizvodiController@pocetnaStrana');


Route::prefix('/adminpanel')->group(function(){
    Route::view('/', 'admin');
    Route::view('/forma', 'forma');
    Route::get('/formaPregled/{jsp}/{tip}', 'AdminController@formaIzmena');  

    Route::get('/slike', 'AdminController@slike');
    Route::post('/slike/upload', 'AdminController@uploadSlike');
    Route::get('/slike/aktivna/{id}', 'AdminController@aktivna');

    Route::get('/narudzbinePregled', 'AdminController@pregledNarudzbina');
    Route::get('/narudzbinePregled/izvrsene', 'AdminController@izvrsene');
    Route::get('/narudzbinePregled/obustavljene', 'AdminController@obustavljene');

    Route::get('/narudzbinePregled/{id}/izvrseno', 'AdminController@narudzbinaIzvrseno');
    Route::get('/narudzbinePregled/{id}/obustavi', 'AdminController@narudzbinaObustavi');


    Route::get('/proizvodiPregled', 'AdminController@pregledProiz');
    Route::post('/proizvodiPregled/filter', 'AdminController@sortProizvoda');
    Route::put('/proizvodiPregled/{jsp}', 'AdminController@izmenaProizvoda');
    Route::get('/proizvodiPregled/obrisi/{jsp}', 'AdminController@brisanjeProizvoda');

    Route::get('/korisniciPregled', 'AdminController@pregledKori');
    Route::post('/korisniciPregled/filter', 'AdminController@sortKorisnika');
    Route::get('/korisniciPregled/admini', 'AdminController@admini');
    Route::get('/korisniciPregled/useri', 'AdminController@useri');
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
    Route::post('/pretraga', 'ProizvodiController@pretraga');
    Route::post('/upisFakture', 'KorpaController@upisFakture');
    Route::get('/{id}', 'ProizvodiController@proizvod');
    Route::get('/{id}/ubaci', 'KorpaController@index');
    Route::get('/{id}/izbaci', 'KorpaController@izbaci');

});

Route::prefix('/korisnik')->group(function(){
    Route::view('/promenaPodataka', 'korisnik.korisnikIzmena');
    Route::view('/promenaLozinke', 'auth.passwords.reset');
    Route::view('/verifikovanje', 'auth.verify');
    Route::get('/narudzbine', 'AdminController@narudzbineKorisnik');


});


Auth::routes();

Route::get('/home', 'ProizvodiController@index')->name('home');
