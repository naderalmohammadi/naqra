<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//use App\Http\Middleware\Lang;


Route::get('lang/{lang}', function ($lang) {
    if(in_array($lang , ['en','ar'])){
        if(auth()->user()){
            $user = auth()->user();
            $user->lang = $lang;
            $user->save();
        } else {
            if(session()->has('lang')){
                session()->forget('lang');
            }
            session()->put('lang', $lang);
        }
    }else{
        if(auth()->user()){
            $user = auth()->user();
            $user->lang = 'en';
            $user->save();
        } else {
            if(session()->has('lang')){
                session()->forget('lang');
            }
            session()->put('lang', 'en');
        }
    }
    return back();
});

//Route::middleware([Lang::class])->group(function(){

Route::group([
    'middleware' => 'Lang',
], function() {

Route::post('addBookmark/{article}', 'ArticleController@addBookmark');

// Route::resource('article', 'ArticleController');
Route::get('/', [App\Http\Controllers\ArticleController::class, 'index']);


});

Auth::routes();
