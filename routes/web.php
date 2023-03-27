<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'share-data'], function () {
    Route::get('/', function () {
        return view('auth.login');
    });
    Auth::routes();

    Route::get('/home', [HomeController::class, 'dashboard'])->name('home');
    Route::group(['middleware' => ['auth', 'allow:admin,super-admin']], function () {
        //users
        Route::resource('user', UsersController::class)->except('show');

        Route::get('user/restore/{id}', [UsersController::class, 'restore'])->name('user.restore');
        Route::get('user/assignrole/{id}', [UsersController::class, 'assignRoleForm'])->name('assign.roleFrom');
        Route::post('user/role/{id}', [UsersController::class, 'assignRole'])->name('assign.role');
        //roles
        Route::resource('role', RoleController::class)->except('show');

        Route::get('role/restore/{id}', [RoleController::class, 'restore'])->name('role.restore');
        Route::get('role/assignpermission/{id}', [RoleController::class, 'assignPermissionForm'])
            ->name('assign.permissionFrom');
        Route::post('role/permission/{id}', [RoleController::class, 'assignPermission'])->name('assign.permission');
        //permission
        Route::resource('permission', PermissionController::class)->except('show');

        Route::get('permission/restore/{id}', [PermissionController::class, 'restore'])->name('permission.restore');

        Route::get('user/forcedelete/{id}', [UsersController::class, 'forceDelete'])->name('user.forceDelete')
            ->can('force-delete');
        Route::get('role/forcedelete/{id}', [RoleController::class, 'forceDelete'])->name('role.forceDelete')
            ->can('force-delete');
        Route::get('permission/forcedelete/{id}', [PermissionController::class, 'forceDelete'])
            ->name('permission.forceDelete')->can('force-delete');
        //site setting
        Route::get('setting', [SiteSettingController::class, 'viewSetting'])->name('setting.index');
        Route::post('setting/{id}', [SiteSettingController::class, 'saveSettings'])->name('setting.update');

        //jobs
        Route::resource('jobs', JobController::class);
        Route::get('jobs/restore/{job}', [JobController::class, 'restore'])->name('jobs.restore');
        Route::get('jobs/forcedelete/{job}', [JobController::class, 'forceDelete'])->name('jobs.forceDelete')
            ->can('force-delete');

        //Job Application
        Route::get('applications', [JobApplicationController::class, 'index'])->name('applications.index');
        Route::get('jobs/{job}/applications', [JobApplicationController::class, 'create'])->name('applications.create');
        Route::get('/applications/{jobApplication}', [JobApplicationController::class, 'show'])->name('applications.show');
        Route::post('jobs/{job}/applications', [JobApplicationController::class, 'store'])->name('applications.store');
        Route::delete('jobApplication/{jobApplication}', [JobApplicationController::class, 'destroy'])->name('applications.destroy');
        Route::get('applications/restore/{jobApplication}', [JobApplicationController::class, 'restore'])->name('applications.restore');
        Route::get('applications/forcedelete/{jobApplication}', [JobApplicationController::class, 'forceDelete'])->name('applications.forceDelete')
            ->can('force-delete');
        Route::get('applications/{jobApplication}/image', [JobApplicationController::class, 'applicationImage'])->name('applications.image');
        Route::get('applications/{jobApplication}/resume', [JobApplicationController::class, 'resume'])->name('applications.resume');
        Route::get('applications/{jobApplication}/coverLetter', [JobApplicationController::class, 'coverLetter'])->name('applications.coverLetter');

        //Department

        Route::resource('department', DepartmentController::class);
    });
});
