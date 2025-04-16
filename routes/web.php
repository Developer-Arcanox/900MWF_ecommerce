<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\UserAuth;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function () {
    Route::get('/', "index")->name("user.home");
    Route::get("/register", "showRegisterForm")->name("register.page");
    Route::post("/register", "register")->name("register");
    Route::get("/login", "showLoginForm")->name("login.page");
    Route::post("/login", "login")->name("login");
    Route::get("/dashboard", "dashboard")->name("dashboard")->middleware(UserAuth::class);
});
