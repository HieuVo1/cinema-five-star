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

//Route::get('/', function () {
//    return view('welcome');
//})->name('trangchu');
Route::get('insert', function () {
    DB::table('admins')->insert([
        ['name' => 'nhiben12', 'email' =>  '17520487@gm.uit.edu.vn', 'password' => bcrypt('123')],
    ]);

});
Route::get("cms/login", "Auth\AdminLoginController@login")->name('cms.login');
Route::post("cms/login", "Auth\AdminLoginController@postlogin")->name('cms.login.post');

Route::group(['prefix' => 'cms', 'middleware' => 'adminLogin'], function () {

    Route::get("trangchu", "AdminController@index")->name('cms.trangchu')->middleware('adminLogin');
});

Route::post("loadprojector", "TestController@loadprojector")->name('loadprojector');
Route::post("loaddate", "TestController@loaddatemovie")->name('loaddate');
Route::post("loadplan", "TestController@loadplan")->name('loadplan');
Route::post("loadrap", "TestController@loadrap")->name('loadrap');
Route::post("savebooking", "TestController@savebooking")->name('savebooking');
Route::get("chonlich", "TestController@index")->name('chonlich');
Route::get("chonlich2", "TestController@index2")->name('chonlich2');
Route::get("listphim", "TestController@listphim")->name('listphim');
Route::get("phim/{slug}.html", "TestController@phim")->name('phim');
Route::get("datcho/seq/{id}/dy/{date}", "TestController@datcho")->name('datcho');
Route::get("getdatcho/seq/{id}/", "TestController@getdatcho")->name('getdatcho');

//Route::get("paypal", "PaymentController@index")->name('paywithpaypal');
Route::post("paypal", "PaymentController@index")->name('paywithpaypal');
Route::get("paypal/status", "PaymentController@status")->name('paywithpaypal2');
Route::get("paypal/detail/{id}", "PaymentController@paymentDetail")->name('paywithpaypal3');
Route::get("paypal/list", "PaymentController@paymentList")->name('paywithpaypal4');

Route::get("testjson", "TestController@testjson")->name('testjson');
Route::get("convert", "TestController@convert")->name('convert');

//index
//login
Route::get("login", "Auth\CustomerLoginController@Login")->name('index.login.get');
Route::post("login", "Auth\CustomerLoginController@postLogin")->name('index.login.post');
//logout
Route::get("logout", "Auth\CustomerLoginController@getLogout")->name('index.logout.get');
//register
Route::get("register", "Auth\CustomerLoginController@getRegister")->name('index.register.get');
Route::post("register", "Auth\CustomerLoginController@postRegister")->name('index.register.post');

//home
Route::get('/','IndexHomeController@getHome')->name('index.home.get');
//movies
Route::get('getMovieByKey','IndexMovieController@getByKey')->name('index.movie.cs.get');
Route::get('coming_soon.html','IndexMovieController@getCSMovies')->name('index.movie.cs.get');
Route::get('now_showing.html','IndexMovieController@getNSMovies')->name('index.movie.ns.get');
//detail movie
Route::get('movie/{id}/{slug}.html','IndexMovieController@getDetail')->name('index.movie.detail.get');


Route::group(['prefix' => 'user', 'middleware' => 'customer'], function () {

    Route::get("invoice","CustomerController@getInvoiceList")->name("index.user.invoice.get");
    Route::get("invoice/detail/{id}","CustomerController@getInvoiceDetail")->name("index.user.invoice.detail.get");

    Route::get("profile","CustomerController@getProfile")->name("index.user.profile.get");

    //booking
    Route::get("booking-movie/seq/{id}/dy/{date}","IndexBookingController@getBooking")->name("index.booking.get");
    Route::get("payment","PaymentController@getPayment")->name("index.payment.get");
    Route::post("payment","PaymentController@postPayment")->name("index.payment.post");
});

//ajax
Route::group(["prefix" => "ajax"],function () {
    Route::post("loaddate", "IndexAjaxController@postLoadDate")->name('index.ajax.loaddate.post');
    Route::post("loadprojector", "IndexAjaxController@postLoadProjector")->name('index.ajax.loadprojector.post');
    Route::post("loadplan", "IndexAjaxController@postLoadPlan")->name('index.ajax.loadplan.post');
});

//admin
Route::group(['prefix' => 'cms', 'middleware' => 'adminLogin'], function () {

    Route::get("cinema/form/{id}","AdminCinemaController@getAddCinema")->name("cms.cinema.form.get");
    Route::post("cinema/form/{id}","AdminCinemaController@postAddCinema")->name("cms.cinema.form.post");
    Route::get("cinema","AdminCinemaController@getListCinema")->name("cms.cinema.list.get");
//    Route::get("cinema/del","AdminCinemaController@getDelCinema")->name("cms.cinema.del.get");

    Route::get("room/form/{id}","AdminRoomController@getAddRoom")->name("cms.room.form.get");
    Route::post("room/form/{id}","AdminRoomController@postAddRoom")->name("cms.room.form.post");
    Route::get("room","AdminRoomController@getListRoom")->name("cms.room.list.get");

    Route::get("movie/form/{id}","AdminMovieController@getForm")->name("cms.movie.form.get");
    Route::post("movie/form/{id}","AdminMovieController@postForm")->name("cms.movie.form.post");
    Route::get("movie","AdminMovieController@getList")->name("cms.movie.list.get");

    Route::get("showtime/form/{id}","AdminShowTimeController@getForm")->name("cms.showtime.form.get");
    Route::post("showtime/form/{id}","AdminShowTimeController@postForm")->name("cms.showtime.form.post");
    Route::get("showtime","AdminShowTimeController@getList")->name("cms.showtime.list.get");

    Route::get("viewroom/form/{id}","AdminViewRoomController@getForm")->name("cms.viewroom.form.get");
    Route::post("viewroom/form/{id}","AdminViewRoomController@postForm")->name("cms.viewroom.form.post");
    Route::get("viewroom","AdminViewRoomController@getList")->name("cms.viewroom.list.get");

    Route::get("customer","AdminCustomerController@getList")->name("cms.customer.list.get");

    Route::get("invoice","AdminInvoiceController@getList")->name("cms.invoice.list.get");
    Route::get("invoice/detail/{id}","AdminInvoiceController@getDetail")->name("cms.invoice.detail.get");
    Route::post("invoice/ajaxstatus","AdminInvoiceController@postAjaxStatus")->name("cms.invoice.ajaxstatus.post");


});

//error
Route::get("404.html","IndexErrorController@get404")->name("index.404.get");


Route::group(['prefix' => '/', 'middleware' => 'customer'], function () {

    Route::get("trangchu", "CustomerController@index")->name('trangchu');
    Route::post("chonlich", "TestController@postindex")->name('chonlich.post');
});