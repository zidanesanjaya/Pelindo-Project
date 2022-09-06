<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Ship;
use App\Models\Ship_Ex;
use Illuminate\Support\Facades\DB;

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
    $ship = DB::table('Ship')->whereNotNull('kedatangan')->simplePaginate(10);
    $ship_ = DB::table('Ship')->whereNotNull('keberangkatan')->simplePaginate(10); 
    $kapal = Ship_Ex::all();   
    return view('index',['ship'=>$ship , 'ship_' => $ship_ , 'kapal'=>$kapal]);
});

Route::get('/kd', function () {
    $ship = DB::table('Ship')->whereNotNull('kedatangan')->simplePaginate(10);
    $ship_ = DB::table('Ship')->whereNotNull('keberangkatan')->simplePaginate(10); 
    $kapal = Ship_Ex::all();   
    return view('kedatangan',['ship'=>$ship , 'ship_' => $ship_ , 'kapal'=>$kapal]);
});

Route::get('/kb', function () {
    $ship = DB::table('Ship')->whereNotNull('kedatangan')->simplePaginate(10);
    $ship_ = DB::table('Ship')->whereNotNull('keberangkatan')->simplePaginate(10); 
    $kapal = Ship_Ex::all();   
    return view('keberangkatan',['ship'=>$ship , 'ship_' => $ship_ , 'kapal'=>$kapal]);
});

Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'landing']);

Route::get('/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit_page'])->name('edit');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/index', [App\Http\Controllers\ShipController::class, 'index'])->name('home');

Route::post('/store', [App\Http\Controllers\HomeController::class, 'store'])->name('store');
Route::post('/store_new_ship', [App\Http\Controllers\HomeController::class, 'store_kapal'])->name('store_kapal');

Route::post('/update/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update');
Route::get('/delete/{id}', [App\Http\Controllers\HomeController::class, 'delete'])->name('delete');



