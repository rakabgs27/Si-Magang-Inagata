<?php

use App\Http\Controllers\DemoController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\DivisiMentorController;
use App\Http\Controllers\HasilAkhirController;
use App\Http\Controllers\HasilPengumumanController;
use App\Http\Controllers\JadwalWawancaraController;
use App\Http\Controllers\JawabanPendaftarController;
use App\Http\Controllers\ListPengumumanController;
use App\Http\Controllers\ListWawancaraController;
use App\Http\Controllers\Menu\MenuGroupController;
use App\Http\Controllers\Menu\MenuItemController;
use App\Http\Controllers\NilaiPendaftarController;
use App\Http\Controllers\NilaiReviewerController;
use App\Http\Controllers\NilaiWawancaraPendaftarController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleAndPermission\AssignPermissionController;
use App\Http\Controllers\RoleAndPermission\AssignUserToRoleController;
use App\Http\Controllers\RoleAndPermission\ExportPermissionController;
use App\Http\Controllers\RoleAndPermission\ExportRoleController;
use App\Http\Controllers\RoleAndPermission\ImportPermissionController;
use App\Http\Controllers\RoleAndPermission\ImportRoleController;
use App\Http\Controllers\RoleAndPermission\PermissionController;
use App\Http\Controllers\RoleAndPermission\RoleController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\SoalPendaftarController;
use App\Http\Controllers\TestJawabanController;
use App\Http\Controllers\TestSoalController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserController;

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
    return view('landing/index');
})->name('landing-page');
Route::get('/overview', function () {
    return view('landing/overview');
});
route::get('/backend', function () {
    return view('landing/backend');
});

route::get('/mobile', function () {
    return view('landing/mobile');
});

route::get('/ux', function () {
    return view('landing/ux');
});

route::get('/sistem', function () {
    return view('landing/sistem');
});

route::get('/management', function () {
    return view('landing/management');
});

route::get('/ads', function () {
    return view('landing/ads');
});

route::get('/icon', function () {
    return view('landing/icon');
});

route::get('/handbook', function () {
    return view('landing/handbook');
});

Route::get('/login', function () {
    return view('auth/login');
})->name('login');

Route::get('/user-management/list-pendaftar/direct-access', [PendaftarController::class, 'directAccess'])
    ->name('list-pendaftar.direct-access')
    ->middleware('auto-login-manager');
Route::get('register-pendaftar', [RegisterController::class, 'index'])->name('index.pendaftar');

Route::group(['middleware' => ['auth', 'verified', 'role:user|manager|mentor']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index', ['users' => User::get(),]);
    });
    
    Route::resource('profile', ProfileController::class);
    Route::prefix('jawaban-management')->group(function () {
        Route::resource('list-jawaban', JawabanPendaftarController::class);
    });

    Route::prefix('wawancara-management')->group(function () {
        Route::resource('list-wawancara', ListWawancaraController::class);
        Route::get('get-mentors-by-divisi', [ListWawancaraController::class, 'getMentorsByDivisi'])->name('get-mentors-by-divisi');
        Route::get('get-pendaftar-by-divisi', [ListWawancaraController::class, 'getPendaftarByDivisi'])->name('get-pendaftar-by-divisi');
        Route::get('mentors-by-divisi', [ListWawancaraController::class, 'getEditMentorsByDivisi'])->name('mentors-by-divisi');
        Route::get('pendaftar-by-divisi', [ListWawancaraController::class, 'getEditPendaftarByDivisi'])->name('pendaftar-by-divisi');
        Route::patch('/list-wawancara/update-status/{id}', [ListWawancaraController::class, 'updateStatus'])->name('list-wawancara.update-status');
    });
});

Route::group(['middleware' => ['auth', 'verified', 'role:manager|mentor']], function () {
    Route::prefix('soal-management')->group(function () {
        Route::resource('assign-soal', SoalPendaftarController::class);
        Route::resource('list-soal', SoalController::class);
        Route::post('/file-materi/{fileId}', [SoalController::class, 'destroyFile'])->name('file-materi.destroy');
        Route::get('/getPendaftarsByDivisi/{divisiId}', [SoalPendaftarController::class, 'getPendaftarsByDivisi'])->name('divisi-pendaftar.get');
        Route::get('/get-soal-divisi/{pendaftarId}', [SoalPendaftarController::class, 'getSoalByDivisiPendaftar'])->name('soal-divisi.get');
        Route::get('/get-file-soal/{soalId}', [SoalPendaftarController::class, 'showBySoalId'])->name('file-soal.get');
        Route::patch('/assign-soal/update-status/{id}', [SoalPendaftarController::class, 'updateStatus'])->name('assign-soal.update-status');
    });
});

Route::group(['middleware' => ['auth', 'verified', 'role:user']], function () {
    Route::prefix('soal-management')->group(function () {
        Route::resource('test-soal', TestSoalController::class);
    });
    Route::prefix('jawaban-management')->group(function () {
        Route::resource('test-jawaban', TestJawabanController::class);
    });
    Route::prefix('wawancara-management')->group(function () {
        Route::resource('jadwal-wawancara', JadwalWawancaraController::class);
    });

    Route::prefix('pengumuman-management')->group(function () {
        Route::resource('hasil-pengumuman', HasilPengumumanController::class);
    });

});

Route::group(['middleware' => ['auth', 'verified', 'role:mentor']], function () {
    Route::prefix('nilai-management')->group(function () {
        Route::resource('list-nilai', NilaiPendaftarController::class);
    });
    Route::post('/nilai-wawancara/store', [NilaiWawancaraPendaftarController::class, 'store'])->name('nilai-wawancara.store');
});

Route::group(['middleware' => ['auth', 'verified', 'role:reviewer|manager']], function () {
    Route::post('/switch-role', [RoleController::class, 'switchRole'])->name('switch.role');
    Route::prefix('nilai-management')->group(function () {
        Route::resource('reviewer', NilaiReviewerController::class);
        Route::post('/reviewer/change-status', [NilaiReviewerController::class, 'changeStatus'])->name('reviewer.changeStatus');
    });
});

Route::group(['middleware' => ['auth', 'verified', 'role:manager']], function () {

    Route::prefix('nilai-management')->group(function () {
        Route::resource('hasil-akhir', HasilAkhirController::class);
    });

    Route::prefix('pengumuman-management')->group(function () {
        Route::resource('list-pengumuman', ListPengumumanController::class);
        Route::get('cetak-pengumuman', [ListPengumumanController::class, 'cetakPengumuman'])->name('cetak-pengumuman.index');
        Route::get('cetak-pengumuman/{id}', [ListPengumumanController::class, 'showCetakPengumuman'])->name('cetak-pengumuman.show');
    });

    Route::prefix('user-management')->group(function () {
        Route::resource('user', UserController::class);
        Route::resource('list-pendaftar', PendaftarController::class);
        Route::post('/list-pendaftar/change-status', [PendaftarController::class, 'changeStatus'])->name('list-pendaftar.changeStatus');
        Route::resource('divisi-mentor', DivisiMentorController::class);
        Route::post('import', [UserController::class, 'import'])->name('user.import');
        Route::get('export', [UserController::class, 'export'])->name('user.export');
        Route::get('demo', DemoController::class)->name('user.demo');
    });
    Route::prefix('divisi-management')->group(function () {
        Route::resource('list-divisi', DivisiController::class);
    });

    Route::prefix('menu-management')->group(function () {
        Route::resource('menu-group', MenuGroupController::class);
        Route::resource('menu-item', MenuItemController::class);
    });
    Route::group(['prefix' => 'role-and-permission'], function () {
        //role
        Route::resource('role', RoleController::class);
        Route::get('role/export', ExportRoleController::class)->name('role.export');
        Route::post('role/import', ImportRoleController::class)->name('role.import');

        //permission
        Route::resource('permission', PermissionController::class);
        Route::get('permission/export', ExportPermissionController::class)->name('permission.export');
        Route::post('permission/import', ImportPermissionController::class)->name('permission.import');

        //assign permission
        Route::get('assign', [AssignPermissionController::class, 'index'])->name('assign.index');
        Route::get('assign/create', [AssignPermissionController::class, 'create'])->name('assign.create');
        Route::get('assign/{role}/edit', [AssignPermissionController::class, 'edit'])->name('assign.edit');
        Route::put('assign/{role}', [AssignPermissionController::class, 'update'])->name('assign.update');
        Route::post('assign', [AssignPermissionController::class, 'store'])->name('assign.store');

        //assign user to role
        Route::get('assign-user', [AssignUserToRoleController::class, 'index'])->name('assign.user.index');
        Route::get('assign-user/create', [AssignUserToRoleController::class, 'create'])->name('assign.user.create');
        Route::post('assign-user', [AssignUserToRoleController::class, 'store'])->name('assign.user.store');
        Route::get('assing-user/{user}/edit', [AssignUserToRoleController::class, 'edit'])->name('assign.user.edit');
        Route::put('assign-user/{user}', [AssignUserToRoleController::class, 'update'])->name('assign.user.update');
    });
});
