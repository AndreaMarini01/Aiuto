<?php

use App\Http\Controllers\aziendaController;
use App\Http\Controllers\faqController;
use App\Http\Controllers\filterController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\promozioniController;
use App\Http\Controllers\publicController;
use App\Http\Controllers\staffController;
use App\Http\Controllers\statsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [publicController::class, 'home'])->name('home');

Route::get('/home', [publicController::class, 'home'])->name('home');






Route::get('/info', [publicController::class, 'info'])->name('info');

//Route::get('/faq', [publicController::class, 'faq'])->name('faq');




//Rotte per il login, signup e logout
Route::get('/login', [loginController::class, 'login'])->name('login');
Route::post('/login', [loginController::class, 'loginPost'])->name('loginPost');
Route::get('/signup', [loginController::class, 'signup'])->name('signup');
Route::post('/signup', [loginController::class, 'signupPost'])->name('signupPost');
Route::post('/logout', [loginController::class, 'logout'])->name('logout');


//Rotta per i filtri
Route::get('/listaPromozioni/filtered', [filterController::class, 'filter'])->name('filtri');
Route::get('/listaPromozioni/filtered2', [filterController::class, 'filter2'])->name('filtri2');
Route::get('/listaPromozioni/filtered3', [filterController::class, 'filter3'])->name('filtri3');


//Rotte per il CRUD delle promozioni
Route::get('/listaPromozioni', [promozioniController::class, 'listaPromozioni'])->name('listaPromozioni');
Route::get('/visualPromozione', [promozioniController::class, 'visualPromozione'])->name('visualPromozione');
Route::post('/eliminaPromozione', [promozioniController::class, 'eliminaPromozione'])->name('eliminaPromozione');
Route::post('/editPromozione', [promozioniController::class, 'editPromozione'])->name('editPromozione');
Route::post('/creaPromozione', [promozioniController::class, 'creaPromozione'])->name('creaPromozione');
Route::get('/promozioneCreator', [promozioniController::class, 'promozioneCreator'])->name('promozioneCreator');
Route::get('/modificaPromozione', [promozioniController::class, 'modificaPromozione'])->name('modificaPromozione');


//Rotte per il profilo
Route::get('/profile', [profileController::class, 'profilo'])->name('profile');
Route::get('/modificaProfilo', [profileController::class, 'modificaProfilo'])->name('modificaProfilo');
Route::post('/modificaProfilo',[profileController::class, 'modificaProfiloPost'])->name('modificaProfiloPost');

//Rotte per il CRUD delle aziende
Route::get('/info', [aziendaController::class, 'listaAziende'])->name('listaAziende'); //Lista delle Aziende
Route::get('/azienda', [aziendaController::class, 'visualAzienda'])->name('azienda'); //Visualizzazione Azienda Singola
#Route::post('/aziendaDiego', [aziendaController::class, 'visualAzienda'])->name('aziendaDiego');
Route::get('/aziendaCreator', [aziendaController::class, 'aziendaCreator'])->name('aziendaCreator'); //va alla pagina di creazione dell'azienda
Route::post('/aziendaCreator', [aziendaController::class, 'creaAzienda'])->name('createAzienda'); //crea l'azienda
Route::post('/aziendaDelete/{id}', [aziendaController::class, 'eliminaAzienda'])->name('aziendaDelete'); //Eliminazione Azienda
Route::post('/saveAzienda/{id}', [aziendaController::class, 'editAzienda'])->name('saveAzienda');//salva le modifiche per l'azienda (sarebbe (ModificaAziendaDiego in metodo Post)
Route::get('/modificaAzienda', [aziendaController::class, 'modificaAzienda'])->name('modificaAzienda'); //va alla pagina di modifica dell'azienda

//faq
Route::get('/faq', [faqController::class, 'faq'])->name('faq');
Route::get('/faqedit/{id}', [faqController::class, 'faqedit'])->name('faqedit')->middleware('auth');
Route::get('/faqdelete/{id}', [faqController::class, 'faqdelete'])->name('faqdelete')->middleware('auth');
Route::get('/saveFaq/{id}', [faqController::class, 'savefaq'])->name('salvaFaq')->middleware('auth');
Route::get('/createfaq', [faqController::class, 'faqCreate'])->name('creaFaq')->middleware('auth');

//Statistiche
Route::get('/statistiche',[statsController::class, 'stats'])->name('statistiche');

//Coupon Utente liv1
Route::get('/salvaCoupon', [promozioniController::class, 'salvaCoupon'])->name('salvaCoupon');
Route::get('/couponSalvati', [promozioniController::class, 'couponSalvati'])->name('couponSalvati');

//CRUDStaff
Route::get('/listaStaff', [staffController::class, 'listaStaff'])->name('listaUtenti');
Route::get('/eliminaStaff', [staffController::class, 'eliminaStaff'])->name('eliminaStaff');
Route::post('/editStaff', [staffController::class, 'editStaff'])->name('editStaff');
Route::post('/creaStaff', [staffController::class, 'creaStaff'])->name('creaStaff');
Route::get('/staffCreator', [staffController::class, 'staffCreator'])->name('staffCreator');
Route::get('/modificaStaff', [staffController::class, 'modificaStaff'])->name('modificaStaff');
