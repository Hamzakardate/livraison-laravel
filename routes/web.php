<?php

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

//Route::get('/', function () {    return view('welcome');});


//Route::get('/{a}','EnployerController@show');
 
//Route::get('/hamza/{a}', function ($a) { return 'Hello World '.$a;});

//Route::get('/{a}/{b}/{c}/{d}','EnployerController@store');


Auth::routes();

Route::post('/client/store','ClientController@store')->name('client.store');
Route::post('/hopping_all_panier','ClientController@hopping_all_panier');
Route::post('/panier','ClientController@panier')->name('client.panier');
Route::post('/calculor','ClientController@calculor');
Route::get('/client','ClientController@index')->name('client.index');;
Route::get('/client/{id}/show','ClientController@show');



Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');



Route::resource('/category', 'CategoryController')->middleware('can:Active,App\Sale');



Route::resource('/product', 'ProductController')->middleware('can:Active,App\Sale');




Route::get('/sale','SaleController@index')->name('sale.index')->middleware('can:viewadmine,App\Sale')->middleware('can:Active,App\Sale');
Route::get('/sale/one_sale_product/{id}','SaleController@one_sale_product')->name('sale.one_sale_product')->middleware('can:notviewdeliveryexit,App\Sale')->middleware('can:Active,App\Sale');
Route::get('/sale/client_info/{id}','SaleController@client_info')->name('sale.client_info')->middleware('can:notviewdeliverywalkinandviewmagazin,App\Sale')->middleware('can:Active,App\Sale');
Route::get('/sale/index_magazine','SaleController@index_magazine')->name('sale.index_magazine')->middleware('can:notviewdeliveryexit,App\Sale')->middleware('can:notviewdeliverywalkin,App\Sale')->middleware('can:Active,App\Sale');
Route::get('/sale/index_deliver_walkin','SaleController@index_deliver_walkin')->name('sale.index_deliver_walkin')->middleware('can:notviewdeliveryexitandmagazin,App\Sale')->middleware('can:Active,App\Sale');
Route::get('/sale/magazine_info/{id}','SaleController@magazine_info')->name('sale.magazine_info')->middleware('can:notviewdeliveryexit,App\Sale')->middleware('can:Active,App\Sale');
Route::get('/sale/index_deliver_exit','SaleController@index_deliver_exit')->name('sale.index_deliver_exit')->middleware('can:notviewdeliverywalkinandviewmagazin,App\Sale')->middleware('can:Active,App\Sale');





Route::get('/salewalkin', 'SalewalkinController@index')->middleware('can:Adminedeliverywalkin,App\Sale')->middleware('can:Active,App\Sale');
Route::post('/salewalkin/walkin/{id}', 'SalewalkinController@walkin')->middleware('can:Adminedeliverywalkin,App\Sale')->middleware('can:Active,App\Sale');


Route::get('/saleexit', 'SaleexitController@index')->middleware('can:Adminedeliveryexit,App\Sale')->middleware('can:Active,App\Sale');
Route::post('/saleexit/exit/{id}', 'SaleexitController@exit')->middleware('can:Adminedeliveryexit,App\Sale')->middleware('can:Active,App\Sale');

Route::get('/saledelivery', 'DeliveryController@index')->middleware('can:Adminedeliveryexit,App\Sale')->middleware('can:Active,App\Sale');
Route::post('/saledelivery/delivery/{id}', 'DeliveryController@delivery')->middleware('can:Adminedeliveryexit,App\Sale')->middleware('can:Active,App\Sale');
Route::post('/saledeliveryreturns/nodelivery/{id}', 'DeliveryController@nodelivery')->middleware('can:Adminedeliveryexit,App\Sale')->middleware('can:Active,App\Sale');

Route::get('/saledeliveryreturns', 'DeliveryreturnController@index')->middleware('can:Adminedeliverywalkin,App\Sale')->middleware('can:Active,App\Sale');
Route::post('/saledeliveryreturns/deliveryreturns/{id}', 'DeliveryreturnController@deliveryreturns')->middleware('can:Adminedeliverywalkin,App\Sale')->middleware('can:Active,App\Sale');

Route::get('/salereturns', 'ExitreturnController@index')->middleware('can:Adminemagazin,App\Sale')->middleware('can:Active,App\Sale');
Route::post('/salereturns/returns/{id}', 'ExitreturnController@deliveryreturns')->middleware('can:Adminemagazin,App\Sale')->middleware('can:Active,App\Sale');

Route::get('/user', 'UseractiveController@index')->middleware('can:Admine,App\User')->middleware('can:Active,App\Sale');
Route::post('/user/activedesactive/{id}', 'UseractiveController@activedesactive')->middleware('can:Admine,App\User')->middleware('can:Active,App\Sale');