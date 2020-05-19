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

Route::get('/', ['as' => 'home_path', function () {
		return view('index', ['cat' => '']);
}]);

Route::get('biorazionale', function () {    
    return view('biorazionale');
});
Route::get('biorazionale/vite', function () {    
    return view('vite');
});
Route::get('biorazionale/pesco', function () {    
    return view('pesco');
});
Route::get('biorazionale/fragola', function () {    
    return view('fragola');
});

Route::get('sds/{code?}', 'ProdottiController@SdsQrCode');

Route::get('schede-di-sicurezza/{code?}', 'ProdottiController@SdsQrCode');

Route::get('schede-sicurezza', function () {    
    return view('schede-sicurezza');
});

Route::get('prodotti', function () {    
    return view('prodotti', ['cat' => '']);
})->name('prodotti');

Route::get('categoria/{cat}', 'ProdottiController@CategoriaProdotti');

Route::get('prodotti/{cat}/{prodotto}', 'ProdottiController@checkParametriUrl');

Route::post('ricerca-prodotti', 'ProdottiController@checkParametriRicerca');
Route::post('ricerca', 'ProdottiController@checkRicercaSemplice');
    
Route::get('news', 'NewsController@all');

Route::get('news/news-agricoltura', function () {    
    return view('mondo-agricoltura');
});

Route::get('news/novita-normative', function () {    
    return view('novita-normative');
});
Route::get('news/news-sumitomo', function () {    
    return view('mondo-sumitomo');
});

Route::get('privacy-policy', function () {    
    return view('privacy-policy');
});

Route::get('cookies', function () {    
    return view('cookies');
});

Route::get('csr', function () {    
    return view('csr');
});
Route::get('progetti-csr', function () {    
    return view('progetti-csr');
});
    
Route::get('biorazionale#adversity', function () {    
    return view('biorazionale');
});

Route::get('rete-vendita-siapa', function () {    
    return view('rete-vendita-siapa');
});

Route::get('rete-vendita-sumitomo', function () {    
    return view('rete-vendita-sumitomo');
});

Route::get('chi-siamo', function () {    
    return view('chi-siamo');
});

Route::get('sicurezza', function () {    
    return view('sicurezza');
});

Route::get('contatti', function () {    
    return view('contatti');
});

Route::get('centri-antiveleni', function () {    
    return view('centri-antiveleni');
});

Route::get('/sendContatto', 'EmailController@sendContatti');
Route::get('/sendFrode', 'EmailController@sendFrodi');

Route::get('news/{id}', 'NewsController@DettaglioNotizia');

Route::get('sumidata/prodotti/{nome}/{slug}/{pdf}', 'ProdottiController@QrCode');

Route::get('proxy/api', 'ProxyController@pdfDownload');

Route::get('proxy/apiMultiple', 'ProxyController@pdfDownloadMultipleData');