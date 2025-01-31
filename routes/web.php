<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\AccountSettingController;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\TournamentController;
use App\Http\Controllers\Admin\TeamSelectionController;



use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function ($router) {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::group(['prefix' => 'users'], function ($router) {
        Route::get('/',  [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/store', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/view/{id}', [UserController::class, 'view'])->name('admin.user.view');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
        Route::get('/edit/{id}',  [UserController::class, 'edit'])->name('admin.user.edit');
        Route::post('/destroy', [UserController::class, 'destroy'])->name('admin.user.destroy');
        Route::post('/status', [UserController::class, 'admin_users_status_update'])->name('admin.user.admin_users_status_update');
    });

    Route::group(['prefix' => 'services'], function ($router) {
        Route::get('/',  [ServiceController::class, 'index'])->name('admin.service.index');
        Route::get('/create', [ServiceController::class, 'create'])->name('admin.service.create');
        Route::post('/store', [ServiceController::class, 'store'])->name('admin.service.store');
        Route::get('/view/{id}', [ServiceController::class, 'view'])->name('admin.service.view');
        Route::post('/update/{id}', [ServiceController::class, 'update'])->name('admin.service.update');
        Route::get('/edit/{id}',  [ServiceController::class, 'edit'])->name('admin.service.edit');
        Route::post('/destroy', [ServiceController::class, 'destroy'])->name('admin.service.destroy');
        Route::post('/status', [ServiceController::class, 'admin_users_status_update'])->name('admin.service.admin_users_status_update');
    });

    Route::group(['prefix' => 'settings'], function ($router) {
        Route::get('profile', [AccountSettingController::class, 'profile'])->name('admin.setting.profile');
        Route::post('/profile-update/{id}', [AccountSettingController::class, 'update'])->name('admin.setting.profile_update');
        Route::get('change-password', [AccountSettingController::class, 'changePasswordForm'])->name('admin.setting.changePasswordForm');
        Route::post('/change-password/{id}', [AccountSettingController::class, 'changePassword'])->name('admin.setting.changePassword');
        Route::post('logout', [AccountSettingController::class, 'logout'])->name('admin.settings.logout');
    });


    Route::group(['prefix' => 'logs'], function ($router) {
        Route::get('list', [LogController::class, 'index'])->name('admin.log.index');
    });

    Route::group(['prefix' => 'teams'], function ($router) {
        Route::get('/', [TeamSelectionController::class, 'index'])->name('admin.team.index');
        Route::get('/view/{id}', [TeamSelectionController::class, 'view'])->name('admin.team.view');
        Route::post('/update/{id}', [TeamSelectionController::class, 'update'])->name('admin.team.update');
        Route::get('/edit/{id}',  [TeamSelectionController::class, 'edit'])->name('admin.team.edit');
        Route::post('/destroy', [TeamSelectionController::class, 'destroy'])->name('admin.team.destroy');
        Route::get('/step1', [TeamSelectionController::class, 'step1'])->name('admin.team.step1');
        Route::post('/store', [TeamSelectionController::class, 'storeStep1'])->name('admin.team.storeStep1');
        Route::get('/step2', [TeamSelectionController::class, 'step2'])->name('admin.team.step2');
        Route::post('/store-step2', [TeamSelectionController::class, 'storeStep2'])->name('admin.team.storeStep2');
        Route::get('/step3', [TeamSelectionController::class, 'step3'])->name('admin.team.step3');
        Route::post('/store-step3', [TeamSelectionController::class, 'storeStep3'])->name('admin.team.storeStep3');
        Route::get('/step4', [TeamSelectionController::class, 'step4'])->name('admin.team.step4');
        Route::post('/store-step4', [TeamSelectionController::class, 'storeStep4'])->name('admin.team.storeStep4');
        Route::get('/step5', [TeamSelectionController::class, 'step5'])->name('admin.team.step5');
    });

});


require __DIR__.'/auth.php';
