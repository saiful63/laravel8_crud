<?php

use App\Http\Controllers\CrudController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[CrudController::class,'ShowData']);
Route::get('/add_info',[CrudController::class,'AddData']);
Route::post('/store-data',[CrudController::class,'StoreData']);
Route::get('/edit-data/{id}',[CrudController::class,'EditData']);
Route::post('/update-data/{id}',[CrudController::class,'UpdateData']);
Route::get('/delete-data/{id}',[CrudController::class,'DeleteData']);