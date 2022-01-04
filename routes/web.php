<?php

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

// 患者
Route::namespace('Patient')->prefix('patient')->name('patient.')->group(function () {
    // ログイン認証
    Route::match(['get', 'post'],'login', 'TopController@index')->name('index');
    // TOPページ
    Route::match(['get', 'post'],'top','TopController@top')->name('top');
});

// 管理者
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    // ログイン認証関連
    Auth::routes([]);
    // ログイン認証後
    Route::middleware('auth:admin')->group(function () {
        // TOPページ
        Route::get('/patients/list','PatientsController@list')->name('patients.list');
        // ユーザー新規登録
        Route::match(['get', 'post'],'/patients/create', 'PatientsController@create')->name('patients.create');
        Route::post('/patients/store', 'PatientsController@store')->name('patients.store');
        // 編集
        Route::get('/patients/edit/{id}', 'PatientsController@edit')->name('patients.edit');
        Route::post('/patients/edit/{id}', 'PatientsController@update')->name('patients.update');
        // 削除
        Route::post('destroy/{id}', 'PatientsController@destroy')->name('patients.destroy');
        // 注意文言
        Route::match(['get', 'post'],'/attention', 'PatientsController@attention')->name('attention');
        // 注意文言
        Route::post('/attention/update', 'PatientsController@attentionupdate')->name('attentionupdate');
        // CSVダウンロード
        Route::get('/patients/csvexport', 'PatientsController@csvexport')->name('csvexport');
        // CSVインポート
        Route::post('/patients/import', 'PatientsController@import')->name('import');
    });
});

