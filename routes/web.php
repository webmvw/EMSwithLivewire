<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\Admin\Department\AdminDepartmentComponent;
use App\Http\Livewire\Admin\Designation\AdminDesignationComponent;
use App\Http\Livewire\Admin\Employee\AdminEmployeeComponent;
use App\Http\Livewire\Admin\Employee\AdminAddEmployeeComponent;
use App\Http\Livewire\Admin\Employee\AdminDetailsEmployeeComponent;
use App\Http\Livewire\Admin\Employee\AdminEditEmployeeComponent;
use App\Http\Livewire\Admin\Notice\NoticeComponent;
use App\Http\Livewire\Admin\Notice\AddNoticeComponent;
use App\Http\Livewire\Admin\Notice\EditNoticeComponent;
use App\Http\Livewire\Admin\Notice\DetailsNoticeComponent;
use App\Http\Livewire\Admin\Task\AdminTaskComponent;

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
	// for admin dashboard
	Route::get('admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');

	// for department
	Route::get('admin/department', AdminDepartmentComponent::class)->name('admin.department');

	//for designation
	Route::get('admin/designation', AdminDesignationComponent::class)->name('admin.designation');

	// for employee
	Route::get('admin/employee', AdminEmployeeComponent::class)->name('admin.employee');
	Route::get('admin/add/employee', AdminAddEmployeeComponent::class)->name('admin.add.employee');
	Route::get('admin/employee/details/{id}', AdminDetailsEmployeeComponent::class)->name('admin.details.employee');
	Route::get('admin/employee/edit/{id}', AdminEditEmployeeComponent::class)->name('admin.edit.employee');

	// for notice
	Route::get('admin/notice', NoticeComponent::class)->name('admin.notice');
	Route::get('admin/notice/add', AddNoticeComponent::class)->name('admin.add.notice');
	Route::get('admin/notice/edit/{id}', EditNoticeComponent::class)->name('admin.edit.notice');
	Route::get('admin/notice/details/{id}', DetailsNoticeComponent::class)->name('admin.details.notice');

	// for task
	Route::get('admin/task', AdminTaskComponent::class)->name('admin.task');
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
