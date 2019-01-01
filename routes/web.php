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
//});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/about-usit', 'HomeController@about_usit')->name('home');
Route::get('/set-about-usit', 'HomeController@set_about_usit')->name('home');
Route::get('/usit-features', 'HomeController@usit_features')->name('home');
Route::get('/get-usit-features', 'HomeController@get_usit_features')->name('home');
Route::post('/save-usit-features', 'HomeController@save_usit_features')->name('home');
Route::get('/edit-usit-feature/{id}', 'HomeController@edit_usit_feature')->name('home');
Route::post('/update-usit-feature', 'HomeController@update_usit_feature')->name('home');
Route::get('/usit-services', 'HomeController@usit_services')->name('home');
Route::post('/save-usit-service', 'HomeController@save_usit_service')->name('home');
Route::get('/get-usit-services', 'HomeController@get_usit_services')->name('home');
Route::get('/edit-usit-service/{id}', 'HomeController@edit_usit_service')->name('home');
Route::post('/update-usit-service', 'HomeController@update_usit_service')->name('home');
Route::post('/update-usit-service-picture', 'HomeController@update_usit_service_picture')->name('home');
Route::get('/update-service-picture/{id}', 'HomeController@update_service_picture')->name('home');
Route::get('/add-usit-customers', 'HomeController@add_usit_customers')->name('home');
Route::post('/update-about-info', 'HomeController@update_about_info')->name('home');
Route::get('/edit-service-feature/{id}', 'HomeController@edit_service_feature')->name('home');
Route::post('/update-usit-service-feature', 'HomeController@update_usit_service_feature')->name('home');
Route::get('/add-service-features/{id}', 'HomeController@add_service_features')->name('home');
Route::post('/save-usit-service-features', 'HomeController@save_usit_service_features')->name('home');
Route::get('/add-service-description/{id}', 'HomeController@add_service_description')->name('home');
Route::post('/save-usit-service-description', 'HomeController@save_usit_service_description')->name('home');
Route::post('/save-customer-info', 'HomeController@save_customer_info')->name('home');
Route::get('/get-usit-customers', 'HomeController@get_usit_customers')->name('home');
Route::get('/edit-usit-customer/{id}', 'HomeController@edit_usit_customer')->name('home');
Route::post('/update-customer-info', 'HomeController@update_customer_info')->name('home');
Route::get('/add-usit-portfolio', 'HomeController@add_usit_portfolio')->name('home');
Route::post('/save-portfolio-info', 'HomeController@save_portfolio_info')->name('home');
Route::get('/get-usit-portfolios', 'HomeController@get_usit_portfolios')->name('home');
Route::get('/add-portfolio-features/{id}', 'HomeController@add_portfolio_features')->name('home');
Route::post('/save-usit-portfolio-features', 'HomeController@save_usit_portfolio_features')->name('home');
Route::get('/edit-portfolio-feature/{id}', 'HomeController@edit_portfolio_feature')->name('home');
Route::post('/update-usit-portfolio-feature', 'HomeController@update_usit_portfolio_feature')->name('home');
Route::get('/edit-usit-portfolio/{id}', 'HomeController@edit_usit_portfolio')->name('home');
Route::post('/update-portfolio-info', 'HomeController@update_portfolio_info')->name('home');
Route::get('/add-usit-address', 'HomeController@add_usit_address')->name('home');
Route::post('/save-new-address', 'HomeController@save_new_address')->name('home');
Route::get('/get-usit-addresses', 'HomeController@get_usit_addresses')->name('home');
Route::get('/edit-address/{id}', 'HomeController@edit_address')->name('home');
Route::post('/update-address', 'HomeController@update_address')->name('home');
Route::get('/add-usit-slider', 'HomeController@add_usit_slider')->name('home');
Route::post('/save-slider', 'HomeController@save_slider')->name('home');
Route::get('/get-usit-sliders-titles', 'HomeController@get_usit_sliders_titles')->name('home');
Route::get('/active-slider-image/{id}', 'HomeController@active_slider_image')->name('home');
Route::get('/change-slider-image/{id}', 'HomeController@change_slider_image')->name('home');
Route::post('/update-slider', 'HomeController@update_slider')->name('home');
Route::get('/add-usit-slider-title', 'HomeController@add_usit_slider_title')->name('home');
Route::post('/save-slider-title', 'HomeController@save_slider_title')->name('home');
Route::get('/edit-slider-title/{id}', 'HomeController@edit_slider_title')->name('home');
Route::post('/update-slider-title', 'HomeController@update_slider_title')->name('home');
Route::get('/add-usit-blog', 'HomeController@add_usit_blog')->name('home');
Route::post('/save-new-blog', 'HomeController@save_new_blog')->name('home');
Route::get('/get-usit-blogs', 'HomeController@get_usit_blogs')->name('home');
Route::get('/view-usit-blog/{id}', 'HomeController@view_usit_blog')->name('home');
Route::get('/edit-usit-blog/{id}', 'HomeController@edit_usit_blog')->name('home');
Route::post('/update-blog', 'HomeController@update_blog')->name('home');

Route::get('/add-usit-price-package', 'HomeController@add_usit_price_package')->name('home');
Route::post('/save-usit-price-package', 'HomeController@save_usit_price_package')->name('home');
Route::get('/get-usit-price-chart', 'HomeController@get_usit_price_chart')->name('home');
Route::get('/add-usit-price-package-feature', 'HomeController@add_usit_price_package_feature')->name('home');
Route::post('/save-usit-price-package-features', 'HomeController@save_usit_price_package_features')->name('home');
Route::get('/delete-from-package/{id}', 'HomeController@delete_from_package')->name('home');
Route::get('/add-to-package/{id1}/{id2}/{id3}', 'HomeController@add_to_package')->name('home');
Route::get('/edit-package-info/{id}', 'HomeController@edit_package_info')->name('home');
Route::post('/update-usit-price-package', 'HomeController@update_usit_price_package')->name('home');
















Route::get('/add-new-member', 'HomeController@add_new_member')->name('home');
Route::post('/new-member-submit', 'HomeController@new_member_submit')->name('home');
Route::get('/get-all-members', 'HomeController@get_all_members')->name('home');
Route::get('/add-new-member-picture/{id}', 'HomeController@add_new_member_picture')->name('home');
Route::post('/new-member-picture-save', 'HomeController@new_member_picture_save')->name('home');
Route::get('/account-setup/{id}', 'HomeController@account_setup')->name('home');
Route::get('/view-member-profile/{id}', 'HomeController@view_member_profile')->name('home');
Route::post('/new-account-setup', 'HomeController@new_account_setup')->name('home');
