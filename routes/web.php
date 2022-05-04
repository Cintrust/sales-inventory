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

Route::get('/', function () {
    return view('welcome');
});

Route::group(["namespace"=>"Catalog",],function (){

    Route::group(["prefix"=>"catalog"],function (){
        Route::post("/","CatalogController@create")->name("create_catalog");
        Route::post("/{catalog}","CatalogController@update")->name("update_catalog");

        Route::group(["prefix"=>"view"],function (){
            Route::get("create","CatalogController@createView")->name("catalog_create_view");
            Route::get("catalogs","CatalogController@catalogsView")->name("catalog_list_view");
            Route::get("{catalog}","CatalogController@catalogView")->name("catalog_view");
        });
    });
    Route::match(["post","get"],"catalogs","CatalogController@catalogs")->name("catalogs");
} );

Route::group(["namespace"=>"Transaction",],function (){

    Route::group(["prefix"=>"transaction"],function (){
        Route::post("/","TransactionController@create")->name("create_transaction");
        Route::post("/{transaction}","TransactionController@update")->name("update_transaction");
        Route::post("delete/{transaction}","TransactionController@delete")->name("delete_transaction");

        Route::group(["prefix"=>"view"],function (){
            Route::get("create","TransactionController@createView")->name("transaction_create_view");
            Route::get("transactions","TransactionController@transactionsView")->name("transaction_list_view");
            Route::get("aggregate","TransactionController@aggregateView")->name("transaction_aggregate_view");
        });
    });

    Route::match(["post","get"],"transactions","TransactionController@transactions")->name("transactions");
    Route::match(["post","get"],"transactions/aggregates","TransactionController@aggregate")->name("transactions_aggregate");

});


Auth::routes();

Route::group(['middleware' => ["auth"], 'prefix' => "home"], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/dash', 'HomeController@dash')->name('dash');


});

