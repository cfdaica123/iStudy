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



Route::get('/', function () {
    return view('dashboard');
});





// BookingStatus
Route::get('booking_statuses', [BookingStatusController::class, 'index'])->name('booking_statuses.index')->middleware('auth');
Route::get('booking_statuses/create', [BookingStatusController::class, 'create'])->name('booking_statuses.create')->middleware('auth');
Route::post('booking_statuses', [BookingStatusController::class, 'store'])->name('booking_statuses.store')->middleware('auth');
Route::get('booking_statuses/{statusId}/edit', [BookingStatusController::class, 'edit'])->name('booking_statuses.edit')->middleware('auth');
Route::put('booking_statuses/{bookingStatus}', [BookingStatusController::class, 'update'])->name('booking_statuses.update')->middleware('auth');
Route::delete('booking_statuses/{statusId}', [BookingStatusController::class, 'destroy'])->name('booking_statuses.destroy')->middleware('auth');


// Permissions
Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index')->middleware('auth');
Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create')->middleware('auth');
Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store')->middleware('auth');
Route::get('/permissions/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit')->middleware('auth');
Route::put('/permissions/{permission}', [PermissionController::class, 'update'])->name('permissions.update')->middleware('auth');
Route::delete('/permissions/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy')->middleware('auth');


// User Statuses
Route::get('/user_statuses', [UserStatusController::class, 'index'])->name('user_statuses.index')->middleware('auth');
Route::get('/user_statuses/create', [UserStatusController::class, 'create'])->name('user_statuses.create')->middleware('auth');
Route::post('/user_statuses', [UserStatusController::class, 'store'])->name('user_statuses.store')->middleware('auth');
Route::get('/user_statuses/{statusId}/edit', [UserStatusController::class, 'edit'])->name('user_statuses.edit')->middleware('auth');
Route::put('/user_statuses/{userStatus}', [UserStatusController::class, 'update'])->name('user_statuses.update')->middleware('auth');
Route::delete('/user_statuses/{statusId}', [UserStatusController::class, 'destroy'])->name('user_statuses.destroy')->middleware('auth');


// Roles
Route::get('/roles', [RoleController::class, 'index'])->name('roles.index')->middleware('auth');
Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create')->middleware('auth');
Route::post('/roles', [RoleController::class, 'store'])->name('roles.store')->middleware('auth');
Route::get('/roles/{roleId}/edit', [RoleController::class, 'edit'])->name('roles.edit')->middleware('auth');
Route::put('/roles/{roleId}', [RoleController::class, 'update'])->name('roles.update')->middleware('auth');
Route::delete('/roles/{roleId}', [RoleController::class, 'destroy'])->name('roles.destroy')->middleware('auth');


// Department
Route::get('departments', [DepartmentController::class, 'index'])->name('departments.index')->middleware('auth');
Route::get('departments/create', [DepartmentController::class, 'create'])->name('departments.create')->middleware('auth');
Route::post('departments', [DepartmentController::class, 'store'])->name('departments.store')->middleware('auth');
Route::get('departments/{departmentId}/edit', [DepartmentController::class, 'edit'])->name('departments.edit')->middleware('auth');
Route::put('departments/{department}', [DepartmentController::class, 'update'])->name('departments.update')->middleware('auth');
Route::delete('departments/{departmentId}', [DepartmentController::class, 'destroy'])->name('departments.destroy')->middleware('auth');

// Room type
Route::get('room_types', [RoomTypeController::class, 'index'])->name('room_types.index')->middleware('auth');
Route::get('room_types/create', [RoomTypeController::class, 'create'])->name('room_types.create')->middleware('auth');
Route::post('room_types', [RoomTypeController::class, 'store'])->name('room_types.store')->middleware('auth');
Route::get('room_types/{roomTypeId}/edit', [RoomTypeController::class, 'edit'])->name('room_types.edit')->middleware('auth');
Route::put('room_types/{roomType}', [RoomTypeController::class, 'update'])->name('room_types.update')->middleware('auth');
Route::delete('room_types/{roomTypeId}', [RoomTypeController::class, 'destroy'])->name('room_types.destroy')->middleware('auth');

// Hotels
Route::get('hotels', [HotelController::class, 'index'])->name('hotels.index')->middleware('auth');
Route::get('hotels/create', [HotelController::class, 'create'])->name('hotels.create')->middleware('auth');
Route::post('hotels', [HotelController::class, 'store'])->name('hotels.store')->middleware('auth');
Route::get('hotels/{hotelId}/edit', [HotelController::class, 'edit'])->name('hotels.edit')->middleware('auth');
Route::put('hotels/{hotel}', [HotelController::class, 'update'])->name('hotels.update')->middleware('auth');
Route::delete('hotels/{hotelId}', [HotelController::class, 'destroy'])->name('hotels.destroy')->middleware('auth');

// Category
Route::get('categories', [CategoryController::class, 'index'])->name('categories.index')->middleware('auth');
Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create')->middleware('auth');
Route::post('categories', [CategoryController::class, 'store'])->name('categories.store')->middleware('auth');
Route::get('categories/{categoryId}/edit', [CategoryController::class, 'edit'])->name('categories.edit')->middleware('auth');
Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update')->middleware('auth');
Route::delete('categories/{categoryId}', [CategoryController::class, 'destroy'])->name('categories.destroy')->middleware('auth');

// Room
Route::get('rooms', [RoomController::class, 'index'])->name('rooms.index')->middleware('auth');
Route::get('rooms/create', [RoomController::class, 'create'])->name('rooms.create')->middleware('auth');
Route::post('rooms', [RoomController::class, 'store'])->name('rooms.store')->middleware('auth');
Route::get('rooms/{room}/edit', [RoomController::class, 'edit'])->name('rooms.edit')->middleware('auth');
Route::put('rooms/{room}', [RoomController::class, 'update'])->name('rooms.update')->middleware('auth');
Route::delete('rooms/{room}', [RoomController::class, 'destroy'])->name('rooms.destroy')->middleware('auth');

// Tours
Route::get('tours', [TourController::class, 'index'])->name('tours.index')->middleware('auth');
Route::get('tours/create', [TourController::class, 'create'])->name('tours.create')->middleware('auth');
Route::post('tours', [TourController::class, 'store'])->name('tours.store');
Route::get('tours/{tour}/edit', [TourController::class, 'edit'])->name('tours.edit')->middleware('auth');
Route::put('/tours/{tour}', 'TourController@update')->name('tours.update');
Route::delete('tours/{tour}', [TourController::class, 'destroy'])->name('tours.destroy')->middleware('auth');
Route::get('tours/{tour}', [TourController::class, 'show'])->name('tours.show')->middleware('auth');

// Role permission
Route::get('role_permissions', [RolePermissionController::class, 'index'])->name('role_permissions.index')->middleware('auth');
Route::get('role_permissions/create', [RolePermissionController::class, 'create'])->name('role_permissions.create')->middleware('auth');
Route::post('role_permissions', [RolePermissionController::class, 'store'])->name('role_permissions.store')->middleware('auth');
Route::get('role_permissions/{role_permission}/edit', [RolePermissionController::class, 'edit'])->name('role_permissions.edit')->middleware('auth');
Route::put('role_permissions/{role_permission}', [RolePermissionController::class, 'update'])->name('role_permissions.update')->middleware('auth');
Route::delete('role_permissions/{role_permission}', [RolePermissionController::class, 'destroy'])->name('role_permissions.destroy')->middleware('auth');
Route::get('role_permissions/{role_permission}', [RolePermissionController::class, 'show'])->name('role_permissions.show')->middleware('auth');

Route::get('roles/{role_id}/show-permissions', 'RoleController@showPermissions')->name('roles.show-permissions')->middleware('auth');
Route::put('roles/{role_id}/update-permissions', 'RoleController@updatePermissions')->name('roles.update-permissions')->middleware('auth');
Route::get('roles/{role_id}/edit-permissions', 'RoleController@editPermissions')->name('roles.edit-permissions')->middleware('auth');


// User
Route::get('users', [UserController::class, 'index'])->name('users.index')->middleware('auth');
Route::get('users/create', [UserController::class, 'create'])->name('users.create')->middleware('auth');
Route::post('users', [UserController::class, 'store'])->name('users.store')->middleware('auth');
Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::put('users/{user}', [UserController::class, 'update'])->name('users.update')->middleware('auth');
Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('auth');
Route::get('users/{user}', [UserController::class, 'show'])->name('users.show')->middleware('auth');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::group([], function () {
    // Đăng nhập
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
});

