<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\PostinganController;
use App\Http\Controllers\API\RuteController;
use App\Http\Controllers\API\AlasanController;
use App\Http\Controllers\API\VehicleController;
use App\Http\Controllers\API\MetodePembayaranController;
use App\Http\Controllers\API\TripController;
use App\Http\Controllers\API\TarifController;
use App\Http\Controllers\API\JenisMotoController;
use App\Http\Controllers\API\PickupTripController;
use App\Http\Controllers\API\PickupTarifController;
use App\Http\Controllers\API\UserController;




// user
route::post('login',[UserController::class,'login'])->name('Login');  
route::post('register',[UserController::class,'register'])->name('Register');  
route::get('user/{id}',[UserController::class,'showuser'])->name('APIUser');  
route::get('userall',[UserController::class,'userall'])->name('APIUser');  
route::get('userdriver/{id}',[UserController::class,'showuserdriver'])->name('APIUserDriver');  
route::get('driverall',[UserController::class,'driverall'])->name('UserDriver');
route::get('userpenumpang',[UserController::class,'showuserpenumpang'])->name('APIUserPenumpang');  
Route::get('rute',[RuteController::class, 'showrute'])->name('APIRute');
Route::get('saldo/{id}',[UserController::class, 'showsaldo'])->name('APISaldo');
Route::get('saldoall',[UserController::class, 'saldoall'])->name('Saldo');
Route::get('alasan',[AlasanController::class, 'showalasan'])->name('APIAlasan'); 
Route::get('kendaraan',[VehicleController::class, 'showkendaraan'])->name('APIKendaraan'); 
Route::get('metodepembayaran',[MetodePembayaranController::class, 'showmetopem'])->name('APIMetopem');
Route::get('tarif',[TarifController::class, 'showtarif'])->name('APITarif');
Route::get('trip',[TripController::class, 'showtrip'])->name('APITrip');
Route::get('rute',[TarifController::class, 'showrute'])->name('APIRute');
Route::get('daerah',[TarifController::class, 'showdaerah'])->name('APIDaerah');
Route::get('trip',[TripController::class, 'showtrip']);
Route::get('kursi',[UserController::class, 'kursi']);
Route::get('jenismotor',[JenisMotoController::class, 'showjenismotor'])->name('APIJenisMotor'); 
Route::get('pickuptarif',[PickupTarifController::class, 'showpickuptarif'])->name('APIPickupTarif');
Route::get('pickuptrip',[PickupTripController::class, 'showpickuptrip'])->name('APIPickupTrip');
Route::get('pickuptrippenumpang',[PickupTripController::class, 'showpickuptrippenumpang'])->name('APIPickupTripPenumpang');
Route::get('trippenumpang/{id}',[TripController::class, 'showtrippenumpang'])->name('APITripPenumpang');
Route::get('trippenumpangall',[TripController::class, 'trippenumpangall'])->name('TripPenumpang');

// Route::group(['middleware' => ['auth:sanctum']], function () {
    route::post('mengeditprofilp/{id}',[UserController::class,'mengeditprofilp'])->name('MengEditProfilP'); 
    route::put('editpassword/{id}',[UserController::class,'editpassword'])->name('editpassword'); 
route::post('topupsaldo',[UserController::class,'topupsaldo'])->name('Topupsaldo');  
Route::post('tambahtrippenumpang', [App\Http\Controllers\API\TripController::class,'trippenumpang']);
Route::post('tambahpickuptrippenumpang',[PickupTripController::class, 'tambahpickuptrippenumpang'])->name('APIPickupTambahTripPenumpang');



// taxi
Route::get('postingan',[PostinganController::class,'show'])->name('Postingan');
// 
Route::resource('tambahpostingan', App\Http\Controllers\API\PostinganController::class);
route::post ('mengeditprofil/{id}',[UserController::class,'mengeditprofil'])->name('MengEditProfil');
Route::post('tambahtrip', [App\Http\Controllers\API\TripController::class,'store']);
Route::post('gantistatustaxi/{id}', [App\Http\Controllers\API\TripController::class,'GantiSetatus']);
Route::post('accrequest/{id}',[TripController::class, 'acc_request'])->name('Acc_Request');
Route::post('review/{id}',[TripController::class, 'review'])->name('Review');

// Route::post('tambahtrippenumpang/{id}',[TripController::class, 'tambahtrippenumpang'])->name('APITambahTripPenumpang');
Route::post('pembatalan/{id}',[TripController::class, 'pembatalan'])->name('APIPembatalan');
Route::post('postinganselesai/{id}',[TripController::class, 'postinganselesai'])->name('APITripSelesai');
Route::post('pembatalanpenumpang/{id}',[TripController::class, 'pembatalanpenumpang'])->name('PembatalanPenumpang');

// pickup 

Route::post('accpickup/{id}',[PickupTripController::class, 'acctolakpenumpangpickup']);
Route::put('accprequest/{id}',[PickupTripController::class, 'acc_p_request'])->name('Acc_P_Request');
Route::post('reviewpickup/{id}',[PickupTripController::class, 'reviewpickup'])->name('ReviewPickup');
Route::post('tambahpickuptrip',[PickupTripController::class, 'tambahptrip'])->name('TambahPTrip');
Route::post('pembatalanpickup/{id}',[PickupTripController::class, 'pembatalanpickup'])->name('APIPembatalanPickup');
Route::post('pembatalanppenumpang/{id}',[PickupTripController::class, 'pembatalanppenumpang'])->name('PembatalanPenumpang');
Route::post('gantistatuspickup/{id}',[PickupTripController::class, 'gantistatuspickup']);
Route::post('gantistatuspickuppenumpang/{id}',[PickupTripController::class, 'gantistatuspickuppenumpang']);
// }); 
// Route::middleware('auth:api')->group(function () {
// });