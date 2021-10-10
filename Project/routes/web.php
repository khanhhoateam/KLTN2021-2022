<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HocHamController;
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

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    });

    include_once app_path() . "/RouteCustom/phuc_routes.php";
    include_once app_path() . "/RouteCustom/hoa_routes.php";

});
