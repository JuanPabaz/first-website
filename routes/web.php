<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Admin\AuditLogController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProjectAdminController;

// ── Rutas del sitio principal ────────────────────────────────
$mainRoutes = function () {
    Route::redirect('/', '/home');
    Route::get('/home', [ProjectController::class, 'index'])->name("inicio");
    Route::get('/services', function () {
        return view('services');
    })->name("servicios");
    Route::get('/us', function () {
        return view('us');
    })->name("somos");
    Route::get('/projects', [ProjectController::class, 'list'])->name("proyectos");
    Route::get('/projects/{project}', [ProjectController::class, 'show'])->name("proyectos.detalle");
};

// ── Rutas del panel admin ────────────────────────────────────
$adminRoutes = function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('admin.auth')->group(function () {
        Route::get('/', fn() => redirect()->route('admin.projects.index'));

        Route::resource('projects', ProjectAdminController::class)->names([
            'index'   => 'admin.projects.index',
            'create'  => 'admin.projects.create',
            'store'   => 'admin.projects.store',
            'show'    => 'admin.projects.show',
            'edit'    => 'admin.projects.edit',
            'update'  => 'admin.projects.update',
            'destroy' => 'admin.projects.destroy',
        ]);

        Route::delete('/projects/{project}/images/{image}', [ProjectAdminController::class, 'destroyImage'])
            ->name('admin.projects.images.destroy');

        Route::delete('/projects/{project}/branding', [ProjectAdminController::class, 'destroyBranding'])
            ->name('admin.projects.branding.destroy');

        Route::delete('/projects/{project}/branding/images/{image}', [ProjectAdminController::class, 'destroyBrandingImage'])
            ->name('admin.projects.branding.images.destroy');

        Route::get('/audit', [AuditLogController::class, 'index'])->name('admin.audit.index');
    });
};

// ── Aplicar rutas según entorno ──────────────────────────────
// En producción usa subdominios; en local usa prefijo /admin
if (app()->environment('production')) {
    Route::domain('vuottaarq.com')->group($mainRoutes);
    Route::domain('admin.vuottaarq.com')->group($adminRoutes);
} else {
    Route::group([], $mainRoutes);
    Route::prefix('admin')->group($adminRoutes);
}