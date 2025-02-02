<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('top');
});

Route::get('/top', [MemberController::class, 'top'])->name('top');

Route::get('/register', [MemberController::class, 'register'])->name('register');
Route::post('/memberRegister', [MemberController::class, 'memberRegister'])->name('memberRegister');

// ex) ~~/edit/4 とeditのルートを受け取り　/4　の部分を｛｝で囲んだ場所を引数とみなして受け取り、コントロールへ
// route() で飛んできた場合urlは　/members/4/edit となるため、/members/{edit}/edit として引数を受け取る。
Route::get('/edit/{id}', [MemberController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [MemberController::class, 'update'])->name('update');

// deleteだけではルーティングを通すことはできない、一度getメソッドが通ったことにして、開通しdeleteが通せる、という漢字か？
Route::get('/destroy/{id}', [MemberController::class, 'destroy'])->name('destroy');
Route::delete('/destroy/{id}', [MemberController::class, 'destroy'])->name('destroy');

// テスト用
Route::get('/test', fn() => view('members/test'));