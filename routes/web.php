<?php


use App\Http\Controllers\HomeController;
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
    });
});
