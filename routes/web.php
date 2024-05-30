<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PegawaiController;

Route::middleware('guest')->group((function () {
    Route::get('/', function () {
        return view('pages.welcome.index', ['title'=>'Welcome']);
    });
    
    Route::prefix('login')->group(function () {
        Route::prefix('/admin')->group((function () {
            Route::get('/', [AuthController::class, 'admin']);
            Route::post('/', [AuthController::class, 'login']);
        }));

        Route::prefix('/pegawai')->group((function () {
            Route::get('/', [AuthController::class, 'pegawai']);
            Route::post('/', [AuthController::class, 'login']);
        }));

        Route::prefix('/petugas')->group((function () {
            Route::get('/', [AuthController::class, 'petugas']);
            Route::post('/', [AuthController::class, 'login']);
        }));
    });

}));

Route::middleware('auth')->group((function () {
    Route::middleware('is_admin')->group((function () {
        Route::prefix('/admin')->group((function () {
            Route::get('/', [PegawaiController::class, 'index']);

            Route::get('/add', [PegawaiController::class, 'create']);
            Route::post('/add', [PegawaiController::class, 'store']);

            Route::get('/{id}', [PegawaiController::class, 'edit'])->where('id', '[0-9]+');
            Route::post('/edit/{id}', [PegawaiController::class, 'update'])->where('id', '[0-9]+');
            Route::post('/delete/{id}', [PegawaiController::class, 'destroy'])->where('id', '[0-9]+');
            Route::get('/delete', [PegawaiController::class, 'delete']);

            Route::get('/profile', [PegawaiController::class, 'show']);

            Route::middleware('is_the_user')->group(function () { 
                Route::post('/profile/{id}', [PegawaiController::class, 'update']);
            });

            Route::get('/print', [PegawaiController::class, 'print']);
        }));
    }));

    Route::middleware('is_pegawai')->group((function () { 
        Route::prefix('/pegawai')->group((function () {
            Route::get('/', [PegawaiController::class, 'index']);
            
            Route::get('/profile', [PegawaiController::class, 'show']);
            
            Route::middleware('is_the_user')->group(function () { 
                Route::post('/profile/{id}', [PegawaiController::class, 'update']);
            });
        }));
    }));

    Route::middleware('is_petugas')->group((function () { 
        Route::prefix('/petugas')->group((function () {
            Route::get('/', [PegawaiController::class, 'index']);

            Route::get('/add', [PegawaiController::class, 'create']);
            Route::post('/add', [PegawaiController::class, 'store']);

            Route::get('/{id}', [PegawaiController::class, 'edit'])->where('id', '[0-9]+');
            Route::post('/edit/{id}', [PegawaiController::class, 'update'])->where('id', '[0-9]+');
            Route::post('/delete/{id}', [PegawaiController::class, 'destroy'])->where('id', '[0-9]+');

            Route::get('/delete', [PegawaiController::class, 'delete']);

            Route::get('/profile', [PegawaiController::class, 'show']);
            
            Route::middleware('is_the_user')->group(function () { 
                Route::post('/profile/{id}', [PegawaiController::class, 'update']);
            });

            Route::get('/print', [PegawaiController::class, 'print']);
        }));
    }));
    
    Route::get('/logout', [AuthController::class, 'logout']);
}));

Route::get('/403', function () {
    return view('errors.403');
});