<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookingStatusController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserStatusController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\UserController;


use App\Http\Controllers\RolePermissionController;



// Home
// Route::get('/', function () {
//     return view('dashboard');
// });





// BookingStatus
Route::get('booking_statuses', [BookingStatusController::class, 'index'])->name('booking_statuses.index');
Route::get('booking_statuses/create', [BookingStatusController::class, 'create'])->name('booking_statuses.create');
Route::post('booking_statuses', [BookingStatusController::class, 'store'])->name('booking_statuses.store');
Route::get('booking_statuses/{statusId}/edit', [BookingStatusController::class, 'edit'])->name('booking_statuses.edit');
Route::put('booking_statuses/{bookingStatus}', [BookingStatusController::class, 'update'])->name('booking_statuses.update');
Route::delete('booking_statuses/{statusId}', [BookingStatusController::class, 'destroy'])->name('booking_statuses.destroy');


// Permissions
Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store');
Route::get('/permissions/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
Route::put('/permissions/{permission}', [PermissionController::class, 'update'])->name('permissions.update');
Route::delete('/permissions/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy');


// User Statuses
Route::get('/user_statuses', [UserStatusController::class, 'index'])->name('user_statuses.index');
Route::get('/user_statuses/create', [UserStatusController::class, 'create'])->name('user_statuses.create');
Route::post('/user_statuses', [UserStatusController::class, 'store'])->name('user_statuses.store');
Route::get('/user_statuses/{statusId}/edit', [UserStatusController::class, 'edit'])->name('user_statuses.edit');
Route::put('/user_statuses/{userStatus}', [UserStatusController::class, 'update'])->name('user_statuses.update');
Route::delete('/user_statuses/{statusId}', [UserStatusController::class, 'destroy'])->name('user_statuses.destroy');


// Roles
Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
Route::get('/roles/{roleId}/edit', [RoleController::class, 'edit'])->name('roles.edit');
Route::put('/roles/{roleId}', [RoleController::class, 'update'])->name('roles.update');
Route::delete('/roles/{roleId}', [RoleController::class, 'destroy'])->name('roles.destroy');


// Department
Route::get('departments', [DepartmentController::class, 'index'])->name('departments.index');
Route::get('departments/create', [DepartmentController::class, 'create'])->name('departments.create');
Route::post('departments', [DepartmentController::class, 'store'])->name('departments.store');
Route::get('departments/{departmentId}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
Route::put('departments/{department}', [DepartmentController::class, 'update'])->name('departments.update');
Route::delete('departments/{departmentId}', [DepartmentController::class, 'destroy'])->name('departments.destroy');

// Room type
Route::get('room_types', [RoomTypeController::class, 'index'])->name('room_types.index');
Route::get('room_types/create', [RoomTypeController::class, 'create'])->name('room_types.create');
Route::post('room_types', [RoomTypeController::class, 'store'])->name('room_types.store');
Route::get('room_types/{roomTypeId}/edit', [RoomTypeController::class, 'edit'])->name('room_types.edit');
Route::put('room_types/{roomType}', [RoomTypeController::class, 'update'])->name('room_types.update');
Route::delete('room_types/{roomTypeId}', [RoomTypeController::class, 'destroy'])->name('room_types.destroy');

// Hotels
Route::get('hotels', [HotelController::class, 'index'])->name('hotels.index');
Route::get('hotels/create', [HotelController::class, 'create'])->name('hotels.create');
Route::post('hotels', [HotelController::class, 'store'])->name('hotels.store');
Route::get('hotels/{hotelId}/edit', [HotelController::class, 'edit'])->name('hotels.edit');
Route::put('hotels/{hotel}', [HotelController::class, 'update'])->name('hotels.update');
Route::delete('hotels/{hotelId}', [HotelController::class, 'destroy'])->name('hotels.destroy');

// Category
Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('categories/{categoryId}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('categories/{categoryId}', [CategoryController::class, 'destroy'])->name('categories.destroy');

// Room
Route::get('rooms', [RoomController::class, 'index'])->name('rooms.index');
Route::get('rooms/create', [RoomController::class, 'create'])->name('rooms.create');
Route::post('rooms', [RoomController::class, 'store'])->name('rooms.store');
Route::get('rooms/{room}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
Route::put('rooms/{room}', [RoomController::class, 'update'])->name('rooms.update');
Route::delete('rooms/{room}', [RoomController::class, 'destroy'])->name('rooms.destroy');

// Tours
Route::get('tours', [TourController::class, 'index'])->name('tours.index');
Route::get('tours/create', [TourController::class, 'create'])->name('tours.create');
Route::post('tours', [TourController::class, 'store'])->name('tours.store');
Route::get('tours/{tour}/edit', [TourController::class, 'edit'])->name('tours.edit');
Route::put('/tours/{tour}', 'TourController@update')->name('tours.update');
Route::delete('tours/{tour}', [TourController::class, 'destroy'])->name('tours.destroy');
Route::get('tours/{tour}', [TourController::class, 'show'])->name('tours.show');

// Role permission
Route::get('role_permissions', [RolePermissionController::class, 'index'])->name('role_permissions.index');
Route::get('role_permissions/create', [RolePermissionController::class, 'create'])->name('role_permissions.create');
Route::post('role_permissions', [RolePermissionController::class, 'store'])->name('role_permissions.store');
Route::get('role_permissions/{role_permission}/edit', [RolePermissionController::class, 'edit'])->name('role_permissions.edit');
Route::put('role_permissions/{role_permission}', [RolePermissionController::class, 'update'])->name('role_permissions.update');
Route::delete('role_permissions/{role_permission}', [RolePermissionController::class, 'destroy'])->name('role_permissions.destroy');
Route::get('role_permissions/{role_permission}', [RolePermissionController::class, 'show'])->name('role_permissions.show');

Route::get('roles/{role_id}/show-permissions', 'RoleController@showPermissions')->name('roles.show-permissions');
Route::put('roles/{role_id}/update-permissions', 'RoleController@updatePermissions')->name('roles.update-permissions');
Route::get('roles/{role_id}/edit-permissions', 'RoleController@editPermissions')->name('roles.edit-permissions');


// User
Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('users/create', [UserController::class, 'create'])->name('users.create');
Route::post('users', [UserController::class, 'store'])->name('users.store');
Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');


// Đăng nhập

Route::group(['middleware' => 'web'], function () {
    // Các route web khác ở đây...

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
});
