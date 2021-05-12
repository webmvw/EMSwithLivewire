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
	Route::get('admin/notice', App\Http\Livewire\Admin\Notice\NoticeComponent::class)->name('admin.notice');
	Route::get('admin/notice/add', App\Http\Livewire\Admin\Notice\AddNoticeComponent::class)->name('admin.add.notice');
	Route::get('admin/notice/edit/{id}', App\Http\Livewire\Admin\Notice\EditNoticeComponent::class)->name('admin.edit.notice');
	Route::get('admin/notice/details/{id}', App\Http\Livewire\Admin\Notice\DetailsNoticeComponent::class)->name('admin.details.notice');

	// for task
	Route::get('admin/task', App\Http\Livewire\Admin\Task\AdminTaskComponent::class)->name('admin.task');
	Route::get('admin/task/create', App\Http\Livewire\Admin\Task\AdminAddTaskComponent::class)->name('admin.create.task');
	Route::get('admin/task/details/{id}', App\Http\Livewire\Admin\Task\AdminDetailsTaskComponent::class)->name('admin.details.task');
	Route::get('admin/task/edit/{id}', App\Http\Livewire\Admin\Task\AdminEditTaskComponent::class)->name('admin.edit.task');
});









/*
|--------------------------------------------------------------------------
|  Routes for user
|--------------------------------------------------------------------------
|
| this routes access for only user
|
*/
Route::group(['middleware' => ['user', 'auth']], function(){
	Route::get('user/dashboard', UserDashboardComponent::class)->name('user.dashboard');

	// for task
	Route::get('user/task/list', App\Http\Livewire\User\Task\UserTaskListComponent::class)->name('user.task.list');
	Route::get('user/task/details/{id}', App\Http\Livewire\User\Task\UserTaskDetailsComponent::class)->name('user.task.details');
	Route::get('user/accept/task/list', App\Http\Livewire\User\Task\UserAcceptTaskListComponent::class)->name('user.accept.task.list');
	Route::get('user/task/reject/{id}', App\Http\Livewire\User\Task\UserRejectTaskComponent::class)->name('user.reject.task');
	Route::get('user/tast/rejected/list', App\Http\Livewire\User\Task\UserRejectTaskListComponent::class)->name('user.reject.task.list');

	// for work report
	Route::get('user/workreport/view', App\Http\Livewire\User\WorkReport\UserViewWorkReport::class)->name('user.view.workreport');
	Route::get('user/workreport/create', App\Http\Livewire\User\WorkReport\UserCreateWorkReport::class)->name('user.create.workreport');
	Route::get('user/workreport/edit/{id}', App\Http\Livewire\User\WorkReport\UserEditWorkReport::class)->name('user.edit.workreport');
});
