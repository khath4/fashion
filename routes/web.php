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

Auth::routes();

Route::group(['namespace' => 'Auth'], function(){
	Route::get('dang-ky','RegisterController@getRegister')->name('get.register');
	Route::post('dang-ky','RegisterController@postRegister');

  Route::get('verify-account','RegisterController@VerifyAccount')->name('get.verify.account');

	Route::get('dang-nhap','LoginController@getLogin')->name('get.login');
	Route::post('dang-nhap','LoginController@postLogin');

	Route::get('dang-xuat','LoginController@getLogout')->name('get.logout.user');

  Route::get('/quen-mat-khau','ForgotPasswordController@getPassword')->name('get.password');
  Route::post('/quen-mat-khau','ForgotPasswordController@sendCodeResetPassword');

  Route::get('/password/reset','ForgotPasswordController@ResetPassword')->name('link.reset'); 
  Route::post('/password/reset','ForgotPasswordController@SaveResetPassword');
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('danh-muc/{slug}-{id}','CategoryController@getListProduct')->name('get.list.product');
Route::get('thuong-hieu/{slug}-{id}','BrandController@getListBrand')->name('get.list.brand');
Route::get('san-pham/{slug}-{id}','ProductDetailController@productDetail')->name('get.detail.product');

Route::get('bai-viet','ArticleController@getArticle')->name('get.article');
Route::get('bai-viet/{slug}-{id}','ArticleController@getDetailArticle')->name('get.detail.article');

Route::get('san-pham','CategoryController@getListProduct')->name('get.search');

Route::prefix('shopping')->group(function () {
    Route::get('/add/{id}','ShoppingCartController@addProduct')->name('add.shopping.cart');
    Route::get('/show-list','ShoppingCartController@getListShoppingCart')->name('get.list.shopping.cart');
    Route::get('/delete/{id}','ShoppingCartController@delete')->name('get.shopping.delete');
    Route::get('/plus/{id}','ShoppingCartController@plus')->name('get.shopping.plus');
    Route::get('/minus/{id}','ShoppingCartController@minus')->name('get.shopping.minus');
    Route::get('/destroy','ShoppingCartController@destroy')->name('get.shopping.destroy');
});

Route::group(['prefix' => 'gio-hang','middleware' => 'CheckLoginUser'],function () {
    Route::get('/thanh-toan/','ShoppingCartController@getFormPay')->name('get.form.pay');
    Route::post('/thanh-toan/','ShoppingCartController@saveInforShopping');

    Route::get('/thanh-toan-online/','ShoppingCartController@getFormPayOnline')->name('get.form.pay.online');
    Route::post('/thanh-toan-online/','ShoppingCartController@saveInforShoppingOnline');
   
    Route::get('/Re-Pay-{id}','ShoppingCartController@RePay')->name('re.get.form.pay.online');
});

Route::group(['prefix' => 'ajax','middleware' => 'CheckLoginUser'],function () {
    Route::post('/danh-gia/{id}','RatingsController@saveRatings')->name('post.ratings.product');
});

Route::group(['prefix' => 'ajax'],function () {
    Route::post('/view-product','HomeController@renderProductView')->name('post.view.product');
});

Route::group(['prefix' => 'user','middleware' => 'CheckLoginUser'],function () {
    Route::get('/profile','UserController@index')->name('user.dashboard');

    Route::get('/info','UserController@info')->name('user.info');
    Route::post('/info','UserController@SaveInfo');

    Route::get('/password','UserController@password')->name('user.password');
    Route::post('/password','UserController@SavePassword');

    Route::get('/wish-list','UserController@WishList')->name('user.wish');
    Route::get('/re-verify','UserController@reVerify')->name('user.reverify');

    Route::get('/view-orders/{id}','UserController@viewOrder')->name('get.view.orders');

});

Route::get('lien-he','ContactController@getContent')->name('get.contact');
Route::post('lien-he','ContactController@saveContent');

Route::get('ve-chung-toi','PageStaticController@about')->name('get.about');
Route::get('thong-tin-giao-hang','PageStaticController@shopping')->name('get.shopping');
Route::get('chinh-sach-bao-mat','PageStaticController@security')->name('get.security');
Route::get('dieu-khoan-su-dung','PageStaticController@policy')->name('get.policy');

Route::get('languages/{languages}','LanguageController@index')->name('get.languages');