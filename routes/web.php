<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPassword;
use App\Http\Controllers\PasswordForgotController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\khawlaemail;
// email shit
Route::post('/send-div-content', [khawlaemail::class, 'sendDivContent']);

Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/login', [AuthController::class, 'signin'])->name('signin.form');
Route::post('/login', [AuthController::class, 'signinPost'])->name('signin');
// Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('show.register');
// Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/admin', [AuthController::class, 'showUsers'])->name('admin.dashboard');



Route::get('/forget-password', function () {
    return view('Auth/forgotPassword'); 
})->name('forget_password');
Route::post('/forget-password', [ForgotPassword::class, 'forgotPasswordPost'])->name('forgot_password.post');


Route::get('/reset-password/{token}', [ForgotPassword::class, 'resetPassword'])->name('reset.password');


Route::post('/reset-password', [ForgotPassword::class, 'resetPasswordPost'])->name('reset.password.post');

// Route::get('/admin', [MemberController::class, 'showMembers'])->name('admin.dashboard');
Route::get('/admin', [AuthController::class, 'showDashboard'])->name('admin.dashboard');


Route::post('/subscribe', [MemberController::class, 'store'])->name('subscribe.store');

Route::get('/reset-password/{token}', function ($token) {
    return view('emails.forget_password', ['token' => $token]);
})->name('password.reset');

Route::post('/reset-password', [PasswordForgotController::class, 'submitResetPasswordForm'])->name('password.update');



Route::post('/forgetpasspost', [PasswordForgotController::class, 'sendResetLink'])->name('forgetpasspost');

Route::post('/change-role', [UserController::class, 'changeRole'])->name('changeRole');

Route::delete('/member/delete/{id}', [MemberController::class, 'delete'])->name('member.delete');

Route::post('/upload', [UploadController::class, 'store']);


Route::post('/send-mail', [MemberController::class, 'sendMail'])->name('sendMail');



