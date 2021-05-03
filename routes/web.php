<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\Admin\Department\AdminDepartmentComponent;
use App\Http\Livewire\Admin\Designation\AdminDesignationComponent;
use App\Http\Livewire\Admin\Employee\AdminEmployeeComponent;
use App\Http\Livewire\Admin\Employee\AdminAddEmployeeComponent;

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
    return view('auth.login');
});

Auth::routes();


/*
|--------------------------------------------------------------------------
|  Routes for admin
|--------------------------------------------------------------------------
|
| this routes access for only admin
|
*/
Route::group(['middleware' => ['admin', 'auth']], function(){
	Route::get('admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
	Route::get('admin/department', AdminDepartmentComponent::class)->name('admin.department');
	Route::get('admin/designation', AdminDesignationComponent::class)->name('admin.designation');
	Route::get('admin/employee', AdminEmployeeComponent::class)->name('admin.employee');
	Route::get('admin/add/employee', AdminAddEmployeeComponent::class)->name('admin.add.employee');
});






/*
|--------------------------------------------------------------------------
|  Routes for admin
|--------------------------------------------------------------------------
|
| this routes access for only admin
|
*/
Route::group(['middleware' => ['user', 'auth']], function(){
	Route::get('user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
});
