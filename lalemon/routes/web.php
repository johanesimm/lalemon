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

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', 'MainController@index');

Route::get('/topic-detail', 'MainController@showDetailTopic');

Route::get('/topic/id={id}', 'MainController@ShowTopic');

Route::post('/administrative/get-detail-article', 'MainController@getDetailArticle');

Route::get('/products', 'MainController@showListProduct');

Route::post('/customer-confirm-order', 'MainController@customerConfirmOrder');

Route::get('/testimoni', 'MainController@showTestimoniPage');

Route::get('/contactus', 'MainController@showContactUsPage');

/** ======================== ADMINISTRATIVE =================  */
Route::get('/admin/login', 'MainController@showLoginPage');
Route::post('/administrative/validate-user', 'MainController@validateUser')->name('validate');
Route::get('/logout', ['uses' => 'MainController@doLogout']);

Route::group(['middleware' => ['auth']], function(){
    
    Route::get('/dashboard', 'MainController@showDashboardPage');

    Route::post('/dashboard/get-customer-detail', 'MainController@getCustomerDetail');

    Route::get('manage-customer', 'MainController@showManageCustomerPage');

    Route::post('/manage-customer/update-order-status', 'MainCOntroller@updateOrderStatus');

    Route::get('/add-product', 'MainController@showAddProductPage');

    Route::post('/administrative/add-new-product', 'MainController@addNewProduct');

    Route::post('/administrative/get-product-detail', 'MainController@getProductDetail');

    Route::post('/administrative/save-edit-product', 'MainController@saveEditProduct');

    Route::post('/administrative/delete-current-product', 'MainController@deleteCurrentProduct');

    Route::get('/add-artikel', 'MainController@showAddArtikelPage');

    Route::post('/administrative/add-new-article', 'MainController@addNewArticle');

    Route::post('/administrative/edit-existing-article', 'MainController@saveEditArticle');

    Route::posT('/administrative/delete-current-article', 'MainController@deleteCurrentArticle');

    Route::get('/add-testimoni', 'MainController@showAddTestimoniPage');

    Route::post('/administrative/add-new-testimoni', 'MainController@addNewTestimoni');

    Route::post('/administrative/delete-current-testimoni', 'MainController@deleteCurrentTestimoni');

    Route::get('/add-promo', 'MainController@showAddPromoPage');

    Route::post('/administrative/add-new-promo', 'MainController@addNewPromo');

    Route::post('/administrative/get-detail-promo', 'MainController@getDetailPromo');

    Route::post('/administrative/save-edit-promo', 'MainController@saveEditPromo');

    Route::post('/administrative/delete-current-promo', 'MainController@deleteCurrentPromo');
});
Auth::routes();

