<?php

use App\Http\Livewire\ArticleShow;
use App\Http\Livewire\ArticleList;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
    return view('welcome');
});

Route::get('/lang/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'de'])) {
        Session::put('locale', $lang);
    }
    return redirect()->back();
})->name('lang.switch');

Route::get('/articles', ArticleList::class)->name('article.index');

Route::get('/article/{id}', ArticleShow::class)->name('article.show');
