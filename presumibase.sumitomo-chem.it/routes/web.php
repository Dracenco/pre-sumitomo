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
    return view('index', ['mostra' => 'no', 'app' => '']);
});

Route::post('login-temp', 'LoginController@checkToken' );
Route::get('logout', 'LoginController@Logout' );

Route::middleware(['checksession'])->group(function(){

    Route::get('dashboard', function () {
        return view('dashboard', ['mostra' => 'no', 'app' => '']);
    })->name('dashboard');

    Route::get('prodotti/{cat?}', function ($cat='all') {
        return view('prodotti', ['mostra' => 'si', 'app' => 'sumibase', 'cat' => $cat]);
    })->name('prodotti');

    Route::get('elenco-prodotti/{startwith?}', function ($startwith='') {
        return view('prodotti', ['mostra' => 'si', 'app' => 'sumibase', 'startwith' => $startwith]);
    })->name('elenco-prodotti');

    Route::get('prodotto/{cat}/{prodotto}/{idprodotto}', 'ProdottiController@checkParametriUrl');
    Route::get('modifica-prodotto/{cat}/{prodotto}/{idprodotto}', 'ProdottiController@ModificaProdotto');
    Route::get('gestione-colture/{cat}/{prodotto}/{idprodotto}', 'ProdottiController@GestioneColture');
    Route::get('duplica-prodotto/{cat}/{prodotto}/{idprodotto}', 'ProdottiController@DuplicaProdotto');
    Route::get('codici-prodotto/{cat}/{prodotto}/{idprodotto}', 'ProdottiController@ArchivioCodiciProdotto');
    Route::get('nuovo-codice/{cat}/{prodotto}/{idprodotto}', 'ProdottiController@CreaCodice');
    Route::get('nuova-versione/{cat}/{prodotto}/{idprodotto}/{id}/{version}/{lcode}/{companyId}', 'ProdottiController@CreaVersione');
    Route::get('modifica-versione/{lcode}/{companyId}/{version}/{productVersionId}/{cat}/{prodotto}/{idprodotto}/{id}', 'ProdottiController@ModificaVersione');
    Route::get('storico-prodotto/{cat}/{prodotto}/{idprodotto}', 'ProdottiController@StoricoProdotto');
    Route::get('comunicazioni-prodotto/{cat}/{prodotto}/{idprodotto}', 'ProdottiController@ComunicazioniProdotto');
    Route::get('duplica-codice/{cat}/{prodotto}/{idprodotto}/{idcodice}/{sap_code}/{version}', 'ProdottiController@DuplicaCodiceProdotto');
    Route::get('ministero/{cat}/{prodotto}/{idprodotto}', 'ProdottiController@MinisteroProdotto');
    Route::get('modifica-coltura/{cat}/{prodotto}/{idprodotto}/{idcoltura}', 'ProdottiController@ModificaColtura');
    Route::get('modifica-avversita/{cat}/{prodotto}/{idprodotto}/{idcoltura}/{idavversita}', 'ProdottiController@ModificaAvversita');
    Route::get('prodotto-nuova-coltura/{cat}/{prodotto}/{idprodotto}', 'ProdottiController@NuovaColtura');
    Route::get('coltura-nuova-avversita/{cat}/{prodotto}/{idprodotto}/{idcoltura}', 'ProdottiController@NuovaAvversita');
    Route::get('duplica-coltura/{cat}/{prodotto}/{idprodotto}/{idcoltura}', 'ProdottiController@DuplicaColtura');

    Route::get('nuovo-prodotto', function () {
        return view('nuovo-prodotto', ['mostra' => 'si', 'app' => 'sumibase', 'cat' => 'null']);
    })->name('nuovo-prodotto');

    Route::get('gestione-campi', function () {
        return view('gestione-campi', ['mostra' => 'si', 'app' => 'sumibase', 'cat' => 'null']);
    })->name('gestione-campi');;

    Route::get('report', function () {
        return view('report', ['mostra' => 'si', 'app' => 'sumibase', 'cat' => 'null']);
    })->name('report');


    /*sito*/
    Route::get('sito/', function () {
        return view('sito/index', ['mostra' => 'si', 'app' => 'sito']);
    });
    Route::get('sito/frodi', function () {
        return view('sito/frodi', ['mostra' => 'si', 'app' => 'sito']);
    })->name('frodi');

    Route::get('sito/contatti', function () {
        return view('sito/contatti', ['mostra' => 'si', 'app' => 'sito']);
    })->name('contatti');

    Route::get('sito/modifica-centro/{id}', 'GestioneSitoController@ModificaCentroAntiveleno');

    Route::get('sito/catalogo', function () {
        return view('sito/catalogo', ['mostra' => 'si', 'app' => 'sito']);
    })->name('catalogo');

    Route::get('sito/rete-vendita', function () {
        return view('sito/rete-vendita', ['mostra' => 'si', 'app' => 'sito']);
    })->name('rete-vendita');

    Route::get('sito/area-vendita', function () {
        return view('sito/area-vendita', ['mostra' => 'si', 'app' => 'sito']);
    })->name('area-vendita');

    Route::get('sito/nuova-area-vendita', function () {
        return view('sito/nuova-area-vendita', ['mostra' => 'si', 'app' => 'sito']);
    })->name('nuova-area-vendita');

    Route::get('sito/modifica-agente/{id}', 'AgentiController@ModificaAgente');

    Route::get('sito/nuovo-agente', function () {
        return view('sito/nuovo-agente', ['mostra' => 'si', 'app' => 'sito']);
    })->name('nuovo-agente');

    Route::get('sito/modifica-area/{id}', 'AreaController@ModificaArea');
    Route::get('sito/gestione-zona/{id}', 'AreaController@GestioneZona');

    Route::get('sito/nuova-zona/{id}', 'AreaController@NuovaZona');
    Route::get('sito/modifica-zona/{id}/{idzona}', 'AreaController@ModificaZona');
    
    Route::get('sito/home-page', function () {
        return view('sito/home-page', ['mostra' => 'si', 'app' => 'sito']);
    })->name('home-page');

    Route::get('sito/notizie', function () {
        return view('sito/notizie', ['mostra' => 'si', 'app' => 'sito']);
    })->name('notizie');
    Route::get('sito/prodotti', function () {
        return view('sito/prodotti', ['mostra' => 'si', 'app' => 'sito']);
    })->name('prodotti');

    Route::get('sito/chi-siamo', function () {
        return view('sito/chi-siamo', ['mostra' => 'si', 'app' => 'sito']);
    })->name('chi-siamo');
    Route::get('sito/sicurezza', function () {
        return view('sito/sicurezza', ['mostra' => 'si', 'app' => 'sito']);
    })->name('sicurezza');

    Route::get('sito/biorazionale', function () {
        return view('sito/biorazionale', ['mostra' => 'si', 'app' => 'sito']);
    })->name('biorazionale');

    Route::get('sito/schede-difesa', function () {
        return view('sito/schede-difesa', ['mostra' => 'si', 'app' => 'sito']);
    })->name('schede-difesa');
    Route::get('sito/centri-antiveleni', function () {
        return view('sito/centri-antiveleni', ['mostra' => 'si', 'app' => 'sito']);
    })->name('centri-antiveleni');


    Route::get('sito/privacy', function () {
        return view('sito/privacy', ['mostra' => 'si', 'app' => 'sito']);
    })->name('privacy');
    Route::get('sito/cookies', function () {
        return view('sito/cookies', ['mostra' => 'si', 'app' => 'sito']);
    })->name('cookies');

    Route::get('sito/mondo-agricoltura', function () {
        return view('sito/mondo-agricoltura', ['mostra' => 'si', 'app' => 'sito']);
    })->name('mondo-agricoltura');
    Route::get('sito/mondo-sumitomo', function () {
        return view('sito/mondo-sumitomo', ['mostra' => 'si', 'app' => 'sito']);
    })->name('mondo-sumitomo');
    Route::get('sito/mondo-professionisti', function () {
        return view('sito/mondo-professionisti', ['mostra' => 'si', 'app' => 'sito']);
    })->name('mondo-professionisti');
    Route::get('sito/notizie-csr', function () {
        return view('sito/notizie-csr', ['mostra' => 'si', 'app' => 'sito']);
    })->name('notizie-csr');

    Route::get('sito/modifica-notizia/{id}', 'GestioneSitoController@ModificaNotizia');

    Route::get('sito/crea-pagina', function () {
        return view('sito/crea-pagina', ['mostra' => 'si', 'app' => 'sito']);
    })->name('crea-pagina');
    Route::get('sito/crea-sezione', function () {
        return view('sito/crea-sezione', ['mostra' => 'si', 'app' => 'sito']);
    })->name('crea-sezione');


    //Route::post('lista-codici', 'ProdottiController@listaCodici');

});
