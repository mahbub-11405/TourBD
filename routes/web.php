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

Route::get('/', 'HotelController@Index');
Route::get('/hotels/{id}', 'HotelController@showHotels');
Route::get('/hotel/add', 'HotelController@addHotels');
Route::post('/adding/hotel', 'HotelController@addingHotels');
Route::get('/hotel/table', 'HotelController@tableHotels');
Route::get('/view/hotel/{id}', 'HotelController@viewHotel');
Route::get('/hotel/view/{id}', 'HotelController@hotelview');
Route::get('/edit/hotel/{id}', 'HotelController@editHotel');
Route::get('/delete/hotel/{id}', 'HotelController@deleteHotel');
Route::get('/hotel/rate/{id}', 'HotelController@rateHotel');
Route::post('/hotel/rating', 'HotelController@updateHotelRating');
Route::post('/update/hotel', 'HotelController@updateHotel');
Route::post('/hotel/rent/search', 'HotelController@searchHotelRent');


Route::get('/rooms/{id}', 'roomController@showRooms');
Route::get('/room/add', 'roomController@Index');
Route::get('/room/table', 'roomController@tableRoom');
Route::get('/view/room/{id}', 'roomController@viewRoom');
Route::get('/room/view/{id}', 'roomController@roomView');
Route::get('/edit/room/{id}', 'roomController@editRoom');
Route::get('/delete/room/{id}', 'roomController@deleteRoom');
Route::post('/update/room', 'roomController@updateRoom');
Route::post('/adding/room', 'roomController@addRoom');

Route::get('/Rent-A-Car', 'RentController@Index');
Route::get('/Rents', 'RentController@showCars');
Route::post('/car/rent/search', 'RentController@searchCarsRent');
Route::get('/rent-a-car/register','RentController@registerRent');
Route::get('/login/rent','RentController@loginRent');
Route::get('/rent/profile/{id}','RentController@rentProfile');
Route::post('/Registration/rent','RentController@RegistrationRent');
Route::post('/Login/rent-a-car','RentController@logRent');
Route::post('/rent/logout','RentController@logOutRent');
Route::post('/booking/car','RentController@bookingCar');
Route::post('/edit/booking/car','RentController@updateBookingCar');
Route::get('/rent/Requests','RentController@rentRequests');
Route::get('/edit/request/{id}','RentController@editRequests');
Route::get('/delete/request/{id}','RentController@deleteRequest');
Route::get('/rent/table','RentController@rentTable');
Route::get('/client/rent/requests','RentController@clientRentRequests');

Route::get('/Accept/rent/{id}','RentController@AcceptRent');
Route::get('/deny/rent/{id}','RentController@denyRent');
Route::get('/my/Rents','RentController@myRent');

Route::get('/admin','adminController@Index');


Route::get('/location/add','locationController@addLocation');
Route::get('/location/table','locationController@showLocation');
Route::get('/edit/location/{id}','locationController@editLocation');
Route::post('/updating/location','locationController@updateLocation');
Route::get('/delete/location/{id}','locationController@deleteLocation');
Route::post('/adding/location','locationController@addNewLocation');


Route::get('/cars/{id}','carController@showCars');
Route::get('/myCar/{id}','carController@showMyCars');
Route::get('/car/book/{id}','carController@bookCars');
Route::get('/car/add','carController@addCar');
Route::get('/car/table','carController@tableCar');
Route::get('/view/car/{id}','carController@viewCar');
Route::get('/edit/car/{id}','carController@editCar');
Route::get('/delete/car/{id}','carController@deleteCar');
Route::post('/updating/car','carController@updatingCar');
Route::post('/adding/car','carController@updateCar');



Route::get('/tourist/register','touristController@touristRegister');
Route::get('/tourist/login','touristController@touristLogin');
Route::get('/tourist/profile/{id}','touristController@touristProfile');
Route::get('/edit/tourist/profile/{id}','touristController@editTouristProfile');
Route::post('/tourist/logout','touristController@touristLogout');
Route::post('/Login/tourist','touristController@LoginTourist');
Route::post('/Registration/tourist','touristController@touristRegistration');
Route::post('/update/tourist','touristController@updateTourist');