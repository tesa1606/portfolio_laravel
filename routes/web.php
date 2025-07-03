<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TeamController;


// Halaman Front-End
Route::get('/', [PortfolioController::class, 'showHome'])->name('home.frontend');
Route::get('/home', [PortfolioController::class, 'showHome']);
Route::get('/portfolio', [PortfolioController::class, 'showFrontend'])->name('portfolio.frontend');
Route::get('/about', [AboutController::class, 'showAbout'])->name('about.frontend');

Route::get('/team', [TeamController::class, 'showTeam'])->name('team.frontend');

// Frontend user kirim testimonial
Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonial.store');




// Login
Route::get('/admin', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/admin', [AuthController::class, 'login'])->name('login.process');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route yang dilindungi auth
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // CRUD Contact
    Route::get('/admin/contact', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/admin/contact/create', [ContactController::class, 'create'])->name('contacts.create');
    Route::post('/admin/contact', [ContactController::class, 'store'])->name('contacts.store');
    Route::get('/admin/contact/{id}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::put('/admin/contact/{id}', [ContactController::class, 'update'])->name('contacts.update');
    Route::delete('/admin/contact/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');

    // CRUD Portfolio
    Route::get('/admin/portfolio', [PortfolioController::class, 'index'])->name('portfolios.index');
    Route::get('/admin/portfolio/create', [PortfolioController::class, 'create'])->name('portfolios.create');
    Route::post('/admin/portfolio', [PortfolioController::class, 'store'])->name('portfolios.store');
    Route::get('/admin/portfolio/{id}/edit', [PortfolioController::class, 'edit'])->name('portfolios.edit');
    Route::put('/admin/portfolio/{id}', [PortfolioController::class, 'update'])->name('portfolios.update');
    Route::delete('/admin/portfolio/{id}', [PortfolioController::class, 'destroy'])->name('portfolios.destroy');

   // CRUD About
    Route::get('/admin/about', [AboutController::class, 'index'])->name('abouts.index');
    Route::get('/admin/about/create', [AboutController::class, 'create'])->name('abouts.create');
    Route::post('/admin/about', [AboutController::class, 'store'])->name('abouts.store');
    Route::get('/admin/about/{id}/edit', [AboutController::class, 'edit'])->name('abouts.edit');
    Route::put('/admin/about/{id}', [AboutController::class, 'update'])->name('abouts.update');
    Route::delete('/admin/about/{id}', [AboutController::class, 'destroy'])->name('abouts.destroy');

    // CRUD Testimonial
    Route::get('/admin/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
    Route::get('/admin/testimonials/{id}/edit', [TestimonialController::class, 'edit'])->name('testimonials.edit');
    Route::put('/admin/testimonials/{id}', [TestimonialController::class, 'update'])->name('testimonials.update');
    Route::delete('/admin/testimonials/{id}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');

     // CRUD Team
    
    Route::get('/admin/team', [TeamController::class, 'index'])->name('teams.index');
    Route::get('/admin/team/create', [TeamController::class, 'create'])->name('teams.create');
    Route::post('/admin/team', [TeamController::class, 'store'])->name('teams.store');
    Route::get('/admin/team/{id}/edit', [TeamController::class, 'edit'])->name('teams.edit');
    Route::put('/admin/team/{id}', [TeamController::class, 'update'])->name('teams.update');
    Route::delete('/admin/team/{id}', [TeamController::class, 'destroy'])->name('teams.destroy');

});
