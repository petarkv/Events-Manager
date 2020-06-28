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

/*Route::get('/', function () {
    return view('welcome');
});*/

#LOGIN
Route::get('/admin', 'AdminController@getLogin');
Route::post('/admin', 'AdminController@postLogin');

#LOGOUT
Route::get('/logout', 'AdminController@logout');


#MIIDLEWARE LOGIN PROTECTION
Route::group(['middleware' => ['auth']], function(){

#DASHBOARD
Route::get('/admin/dashboard', 'AdminController@getDashboard');

#SETTINGS PAGE
Route::get('/admin/settings', 'AdminController@getSettings');
#CHECKING CURRENT PASSWORD
Route::get('/admin/check-pwd', 'AdminController@checkPassword');
#UPDATE PASSWORD
Route::get('/admin/update-pwd', 'AdminController@updatePassword');
Route::post('/admin/update-pwd', 'AdminController@updatePassword');

#CATEGORIES ROUTES - ADMIN
Route::get('/admin/add-category', 'CategoryController@getAddCategory');
Route::post('/admin/add-category', 'CategoryController@postAddCategory');

Route::get('/admin/view-categories', 'CategoryController@getViewCategories');

Route::match(['get','post'],'/admin/delete-category/{id}', 'CategoryController@deleteCategory');

Route::get('/admin/edit-category/{id}', 'CategoryController@getEditCategory');
Route::post('/admin/edit-category/{id}', 'CategoryController@postEditCategory');

#CITIES ROUTES - ADMIN
Route::get('/admin/add-city', 'CityController@getAddCity');
Route::post('/admin/add-city', 'CityController@postAddCity');

Route::get('/admin/view-cities', 'CityController@getViewCities');

Route::match(['get','post'],'/admin/delete-city/{id}', 'CityController@deleteCity');

Route::get('/admin/edit-city/{id}', 'CityController@getEditCity');
Route::post('/admin/edit-city/{id}', 'CityController@postEditCity');

#EVENTS ROUTES - ADMIN
Route::get('/admin/add-event', 'EventController@getAddEvent');
Route::post('/admin/add-event', 'EventController@postAddEvent');

Route::get('/admin/view-events', 'EventController@getViewEvents');

Route::match(['get','post'],'/admin/delete-event/{id}', 'EventController@deleteEvent');

Route::get('/admin/edit-event/{id}', 'EventController@getEditEvent');
Route::post('/admin/edit-event/{id}', 'EventController@postEditEvent');

#GALLERY ROUTES - ADMIN
Route::get('/admin/add-gallery', 'GalleryController@getAddGallery');
Route::post('/admin/add-gallery', 'GalleryController@postAddGallery');

Route::get('/admin/view-galleries', 'GalleryController@getViewGalleries');

Route::match(['get','post'],'/admin/delete-gallery/{id}', 'GalleryController@deleteGallery');

Route::get('/admin/edit-gallery/{id}', 'GalleryController@getEditGallery');
Route::post('/admin/edit-gallery/{id}', 'GalleryController@postEditGallery');

Route::get('/admin/view-album/{id}', 'GalleryController@getViewAlbum');

Route::match(['get','post'],'/admin/add-images-album/{id}','GalleryController@addImagesAlbum');

Route::get('/admin/delete-album-image/{id}','GalleryController@deleteAlbumImage');

#ALT IMAGES - ADMIN
Route::match(['get','post'],'admin/add-images/{id}','EventController@addImages');
Route::get('/admin/delete-alt-image/{id}','EventController@deleteAltImage');

#DELETE IMAGE - ADMIN
Route::get('/admin/delete-event-image/{id}', 'EventController@deleteEventImage');

#CALENDAR - ADMIN
Route::get('/admin/events-calendar', 'FullCalendarController@index')->name('index'); 
Route::get('/admin/load-events-calendar','EventController@loadEventsCalendar')->name('routeAdminLoadEventsCalendar');

#USERS PROFILES - ADMIN
Route::get('/admin/view-users', 'AdminController@getViewUsers');

#UPDATE USER CATEGORY - ADMIN
Route::get('/admin/update-user/{id}', 'AdminController@getUpdateUser');
Route::post('/admin/update-user/{id}', 'AdminController@postUpdateUser');

#TICKETS - ADMIN
Route::match(['get','post'],'/admin/add-tickets/{id}','EventController@addTickets');
Route::match(['get','post'],'/admin/edit-tickets/{id}','EventController@editTickets');
Route::get('/admin/delete-ticket/{id}', 'EventController@deleteTicket');

#BANNERS - ADMIN
Route::match(['get','post'],'/admin/add-banner','BannersController@addBanner');
Route::match(['get','post'],'/admin/edit-banner/{id}','BannersController@editBanner');
Route::get('/admin/view-banners', 'BannersController@getViewBanners');
Route::get('/admin/delete-banner/{id}', 'BannersController@deleteBanner');
Route::get('/admin/delete-banner-image/{id}', 'BannersController@deleteBannerImage');
});

# ----------------------------------------------------------------------------------------------------------------------
# USERS

# USER LOGIN/REGISTER PAGE
Route::get('/login-register', 'UsersController@getLoginRegister');

# USER REGISTER
Route::post('/user-register', 'UsersController@postUserRegister');

# USER LOGIN
Route::post('/user-login', 'UsersController@postUserLogin');

# USER LOGOUT
Route::get('user-logout', 'UsersController@logout');

# CHECK IF USER ALREADY EXISTS
Route::match(['get','post'],'/check-email','UsersController@checkEmail');
Route::match(['get','post'],'/check-username','UsersController@checkUsername');



Route::group(['middleware'=>['frontlogin']],function(){    
#HOME PAGE
Route::get('/','IndexController@index');

#EVENTS LISTING PAGE BY CATEGORY
Route::get('/events/{url}','EventController@getEventsByCategory');

#EVENT DETAIL PAGE
Route::get('/event/{id}','EventController@getEventDetails');

#GET EVENT TICKET PRICE
Route::get('/get-event-price','EventController@getEventPrice');

#ADD TO CART
Route::match(['get','post'],'/add-cart','EventController@addtocart');

#CART PAGE
Route::match(['get','post'],'/cart','EventController@cart');

#DELETE TICKET FROM CART PAGE
Route::get('/cart/delete-ticket/{id}','EventController@deleteCartTicket');

#UPDATE TICKET QUANTITY IN CART
Route::get('/cart/update-quantity/{id}/{quantity}','EventController@updateCartQuantity');

#USER ACCOUNT PAGE
Route::match(['get','post'],'/account','UsersController@account');

#CHECK USER CURRENT PASSWORD
Route::post('/check-user-password','UsersController@checkUserPassword');

#UPDATE USER PASSWORD
Route::post('/update-user-password','UsersController@updateUserPassword');

#CHECKOUT PAGE
Route::match(['get','post'],'/checkout','EventController@checkout');

#ORDER REVIEW PAGE
Route::match(['get','post'],'/order-review','EventController@orderReview');

#PLACE ORDER
Route::match(['get','post'],'/place-order','EventController@placeOrder');

#THANKS PAGE - COD PAYMENT
Route::get('/thanks','EventController@thanks');

#USER TICKETS ORDERS PAGE
Route::get('/tickets-orders','EventController@userTicketsOrders');

#USER ORDERED TICKETS DETAILS PAGE
Route::get('/tickets-orders/{id}','EventController@userTicketOrderDetails');

#PAYPAL PAGE
Route::get('/paypal','EventController@paypal');

#PAYPAL THANKS PAGE
Route::get('/paypal/thanks','EventController@paypalThanks');

#PAYPAL CANCEL PAGE
Route::get('/paypal/cancel','EventController@paypalCancel');

# CONTACT US PAGE
Route::match(['get','post'],'/page/contact','CmsController@contact');

});



# HELP WITH REGISTRATION OR LOGIN PAGE
Route::match(['get','post'],'/page/help','CmsController@help');


# --------------------------------------------------------------------------------------------------

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
