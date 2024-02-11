<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AppController;
use App\Http\Controllers\Admin\RegionController;
use App\Http\Controllers\Admin\RuteController;
use App\Http\Controllers\Admin\TarifController;
use App\Http\Controllers\Admin\TripController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VehicleController;
use App\Http\Controllers\PostinganController;
use App\Http\Controllers\AlasanPembatalanController;
use App\Http\Controllers\Admin\MobilPickupController;
use App\Http\Controllers\Pickup\TarifPickupController;
use App\Http\Controllers\Pickup\JenisMotorController;
use App\Http\Controllers\Pickup\PickupTripController;
use App\Http\Controllers\Admin\MetodePembayaranController;
    

Route::get('/',[UserController::class, 'halamanlogin'])->name('HalamanLogin');
    Route::post('/cekLogin', [UserController::class, 'cek_login'])->name('CekLogin');

Route::middleware(['auth', 'hakAkses:Admin'])->group(function () {
Route::get('/index',[HomeController::class, 'index'])->name('index');
Route::post('/edit_minimal_saldo',[HomeController::class, 'edit_minimal_saldo'])->name('EditMinimalSaldo');
Route::post('/edit_kurang_saldo',[HomeController::class, 'edit_kurang_saldo'])->name('EditKurangSaldo');
Route::post('/logOut', [UserController::class, 'user_logout'])->name('UserLogOut');


Route::get('/user',[UserController::class, 'halamanuser'])->name('HalamanUser');
Route::get('/detailuser/{id}',[UserController::class, 'detailuser'])->name('DetailUser');
route::get('kursi/{id}',[UserController::class,'kursi'])->name('APIKursi'); 
Route::post('/tambahprofildriver',[UserController::class, 'tambahprofildriver'])->name('TambahProfilD');
Route::post('/tambahprofilpengguna',[UserController::class, 'tambahprofilpenumpang'])->name('TambahProfilP');
Route::post('/tambahakun',[UserController::class, 'tambahakun'])->name('TambahAkun');
Route::post('/editakun/{id}',[UserController::class, 'editakun'])->name('EditAkun');
Route::post('/verifikasiakun/{id}',[UserController::class, 'verifikasiakun'])->name('VerifikasiAkun');
Route::post('/konfirmasitopup/{id}',[UserController::class, 'konfirmasitopup'])->name('KonfirmasiTopUp');
Route::delete('/akun/{id}', [UserController::class, 'destroy'])->name('Akun.destroy');


Route::get('/review',[ReviewController::class, 'halamanreview'])->name('HalamanReview');

Route::get('/daerah',[RegionController::class, 'halamanregion'])->name('HalamanRegion');
Route::post('/tambahdaerah',[RegionController::class, 'tambahregion'])->name('TambahRegion');
Route::post('/editdaerah/{id}',[RegionController::class, 'editregion'])->name('EditRegion');
Route::delete('/daerah/{id}', [RegionController::class, 'destroy'])->name('Region.destroy');

Route::get('/rute',[RuteController::class, 'halamanrute'])->name('HalamanRute');
Route::post('/tambahrute',[RuteController::class, 'tambahrute'])->name('TambahRute');
Route::post('/editrute/{id}',[RuteController::class, 'editrute'])->name('EditRute');
Route::delete('/rute/{id}', [RuteController::class, 'destroy'])->name('Rute.destroy');

Route::get('/tarif',[TarifController::class, 'halamantarif'])->name('HalamanTarif');
Route::post('/tambahtarif',[TarifController::class, 'tambahtarif'])->name('TambahTarif');
Route::post('/edittarif/{id}',[TarifController::class, 'edittarif'])->name('EditTarif');
Route::delete('/tarif/{id}', [TarifController::class, 'destroy'])->name('Tarif.destroy');

Route::get('/kendaraan',[VehicleController::class, 'halamankendaraan'])->name('HalamanKendaraan');
Route::post('/tambahkendaraan',[VehicleController::class, 'tambahkendaraan'])->name('TambahKendaraan');
Route::post('/editkendaraan/{id}',[VehicleController::class, 'editkendaraan'])->name('EditKendaraan');
Route::delete('/kendaraan/{id}', [VehicleController::class, 'destroy'])->name('Kendaraan.destroy');

Route::get('/postingan',[PostinganController::class, 'halamanpostingan'])->name('HalamanPostingan');
Route::post('/tambahpostingan',[PostinganController::class, 'tambahpostingan'])->name('TambahPostingan');
Route::post('/editpostingan/{id}',[PostinganController::class, 'editpostingan'])->name('EditPostingan');
Route::delete('/postingan/{id}', [PostinganController::class, 'destroy'])->name('Postingan.destroy');

Route::get('/alasan',[AlasanPembatalanController::class, 'halamanalasan'])->name('HalamanAlasan');
Route::post('/tambahalasan',[AlasanPembatalanController::class, 'tambahalasan'])->name('TambahAlasan');
Route::post('/editalasan/{id}',[AlasanPembatalanController::class, 'editalasan'])->name('EditAlasan');
Route::delete('/alasan/{id}', [AlasanPembatalanController::class, 'destroy'])->name('Alasan.destroy');

Route::get('/metodepembayaran',[MetodePembayaranController::class, 'halamanmetopem'])->name('HalamanMetopem');
Route::post('/tambahmetodepembayaran',[MetodePembayaranController::class, 'tambahmetopem'])->name('TambahMetopem');
Route::post('/editmetodepembayaran/{id}',[MetodePembayaranController::class, 'editmetopem'])->name('EditMetopem');
Route::delete('/metodepembayaran/{id}', [MetodePembayaranController::class, 'destroy'])->name('Metopem.destroy');


Route::get('/trip',[TripController::class, 'halamantrip'])->name('HalamanTrip');
Route::post('/limajam',[TripController::class, 'limajam'])->name('LimaJam');
Route::get('/detailriwayattrip/{id}',[TripController::class, 'halamandetailriwayattrip'])->name('HalamanDetailRiwayatTrip');
Route::get('/detailtrip/{id}',[TripController::class, 'halamandetailtrip'])->name('HalamanDetailTrip');
Route::get('/riwayattrip',[TripController::class, 'halamanriwayattrip'])->name('RiwayatTrip');
Route::post('/tambahtrip',[TripController::class, 'tambahtrip'])->name('TambahTrip');
Route::post('/edittrip/{id}',[TripController::class, 'edittrip'])->name('EditTrip');
Route::post('/pindahtrip/{id}',[TripController::class, 'pindahtrip'])->name('PindahTrip');
Route::post('/cancletrip/{id}',[TripController::class, 'cancletrip'])->name('CancleTrip');
Route::delete('/trip/{id}', [TripController::class, 'destroy'])->name('Trip.destroy');





// pickup
Route::get('/pickup',[MobilPickupController::class, 'halamanpickup'])->name('HalamanPickup');
Route::post('/tambahpickup',[MobilPickupController::class, 'tambahpickup'])->name('TambahPickup');
Route::post('/editpickup/{id}',[MobilPickupController::class, 'editpickup'])->name('EditPickup');
Route::delete('/pickup/{id}', [MobilPickupController::class, 'destroy'])->name('Pickup.destroy');

Route::get('/jenismotor',[JenisMotorController::class, 'halamanjenismotor'])->name('HalamanJenisMotor');
Route::post('/tambahjenismotor',[JenisMotorController::class, 'tambahjenismotor'])->name('TambahJenisMotor');
Route::post('/editjenismotor/{id}',[JenisMotorController::class, 'editjenismotor'])->name('EditJenisMotor');
Route::delete('/jenismotor/{id}', [JenisMotorController::class, 'destroy'])->name('JenisMotor.destroy');


Route::get('/pickuptarif',[TarifPickupController::class, 'halamanpickuptarif'])->name('HalamanPickupTarif');
Route::post('/tambahpickuptarif',[TarifPickupController::class, 'tambahpickuptarif'])->name('TambahPickupTarif');
Route::post('/editpickuptarif/{id}',[TarifPickupController::class, 'editpickuptarif'])->name('EditPickupTarif');
Route::delete('/pickuptarif/{id}', [TarifPickupController::class, 'destroy'])->name('PickupTarif.destroy');
// akhir pickup


Route::get('/pickuptrip',[PickuptripController::class, 'halamanpickuptrip'])->name('HalamanPickupTrip');
Route::get('/detailpickuptrip/{id}',[PickuptripController::class, 'halamandetailpickuptrip'])->name('HalamanDetailPickupTrip');
Route::get('/riwayatpickuptrip',[PickuptripController::class, 'halamanriwayatpickuptrip'])->name('RiwayatPickupTrip');
Route::get('/detailriwayattrip{id}',[PickuptripController::class, 'hdriwayatpickuptrip'])->name('DetailRiwayatPickupTrip');
Route::post('/tambahpickuptrip',[PickuptripController::class, 'tambahpickuptrip'])->name('TambahPickupTrip');
Route::post('/editpickuptrip/{id}',[PickuptripController::class, 'editpickuptrip'])->name('EditPickupTrip');
Route::post('/pindahpickuptrip/{id}',[PickuptripController::class, 'pindahpickuptrip'])->name('PindahPickupTrip');
Route::post('/canclepickuptrip/{id}',[PickuptripController::class, 'canclepickuptrip'])->name('CanclePickupTrip');
Route::delete('/pickuptrip/{id}', [PickuptripController::class, 'destroy'])->name('PickupTrip.destroy');

});