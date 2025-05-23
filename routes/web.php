<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DanhmucController;
use App\Http\Controllers\TruyenController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TheloaiController;
use App\Http\Controllers\SachController;

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

Route::get('/', [IndexController::class,'home'])->name('home');;
Route::get('/danh-muc/{slug}', [IndexController::class,'danhmuc']);
Route::get('/xem-truyen/{slug}', [IndexController::class,'xemtruyen']);
Route::get('/xem-chapter/{slug}', [IndexController::class,'xemchapter']);
Route::get('/the-loai/{slug}', [IndexController::class,'theloai']);
Route::get('/tim-kiem', [IndexController::class,'timkiem']);
Route::get('ajax-all-truyen', [IndexController::class, 'getAllTruyen'])->name('ajax.all.truyen');
Route::put('/truyen/update-noibat/{id}', [TruyenController::class, 'updateNoibat'])->name('truyen.update_noibat');
Route::post('/tabs-danhmuc', [IndexController::class, 'tabs_danhmuc']);
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('homeadmin');
Route::get('/doc-sach', [IndexController::class, 'docsach']);
Route::get('/xemsachnhanh', [IndexController::class, 'xemsachnhanh']);
Route::get('/dang-ky', [IndexController::class, 'dangky'])->name('dang-ky');
Route::get('/dang-nhap', [IndexController::class, 'dangnhap'])->name('dang-nhap');
Route::get('/dang-xuat', [IndexController::class, 'sign_out'])->name('dang-xuat');
Route::get('/yeu-thich', [IndexController::class, 'yeu_thich'])->name('yeu-thich');
Route::post('/register-publisher', [IndexController::class, 'register_publisher'])->name('register-publisher');
Route::post('/login-publisher', [IndexController::class, 'login_publisher'])->name('login-publisher');
Route::post('/themyeuthich', [IndexController::class, 'themyeuthich'])->name('themyeuthich');
Route::post('xoayeuthich/{id}', [IndexController::class, 'xoayeuthich'])->name('xoayeuthich');
Route::get('thong-tin', [IndexController::class, 'thongtincoban'])->name('thong-tin');
Route::get('/lich-su', [IndexController::class, 'showHistory'])->name('lichsu.history');

Route::resource('/danhmuc', DanhmucController::class);
Route::resource('/truyen', TruyenController::class);
Route::resource('/sach', SachController::class);

Route::resource('/chapter', ChapterController::class);
Route::resource('/theloai', TheloaiController::class);
