<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
//AUTH
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
//ADMIN
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Frontend\FPostController;
//FRONTEND
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\FProfileController;


Route::get('/home', [HomeController::class, 'error'])->name('home');

Route::get('/', [HomeController::class, 'index']);

Route::get('/timdothatlac', [FrontendController::class,'index'])->name('timdothatlac');

//REGISTER
Route::get('register', [RegisterController::class,'showFormRegister'])->name('show-form-register')->middleware('guest');
Route::post('register', [RegisterController::class,'register'])->name('register')->middleware('guest');

//LOGIN
Route::get('login', [LoginController::class,'showFormLogin'])->name('show-form-login')->middleware('guest');
Route::post('login', [LoginController::class,'login'])->name('login')->middleware('guest');

Route::middleware(['auth'])->group(function () {

    //LOGOUT
    Route::get('logout', [LoginController::class,'logout'])->name('logout');

    //CHANGE PASSWORD
    Route::get('show-form-password', [PasswordController::class,'showFormPassword'])->name('show-form-password');
    Route::post('change-password', [PasswordController::class,'changePassword'])->name('change-password');

    //PROFILE
    Route::get('f-profile', [FProfileController::class,'index'])->name('f-profile');
    Route::put('f-update-profile', [FProfileController::class,'updateProfile'])->name('f-update-profile');
    Route::get('f-show-form-profile', [FProfileController::class,'showFormProfile'])->name('f-show-form-profile');

    //MANAGE
    Route::get('f-manage', [FProfileController::class,'index'])->name('f-manage');

    // //CATEGORY
    // Route::get('category', [CategoryController::class,'index'])->name('category');
    // Route::get('add-category', [CategoryController::class,'create'])->name('add-category');
    // Route::post('add-category', [CategoryController::class,'store'])->name('add-category');
    // Route::get('edit-category/{id}', [CategoryController::class,'edit'])->name('edit-category');
    // Route::put('update-category/{id}', [CategoryController::class,'update'])->name('update-category');
    // Route::get('delete-category/{id}', [CategoryController::class,'destroy'])->name('delete-category');

    //POST
    Route::get('f-add-post', [FPostController::class,'create'])->name('f-add-post');
    Route::post('f-add-post', [FPostController::class,'store'])->name('f-add-post');
    Route::get('f-edit-post/{id}', [FPostController::class,'edit'])->name('f-edit-post');
    Route::put('f-update-post/{id}', [FPostController::class,'update'])->name('f-update-post');
    Route::get('f-delete-post/{id}', [FPostController::class,'destroy'])->name('f-delete-post');

});


//POST
Route::get('post/detail/{post}', [FPostController::class,'post'])->name('f-post');


Route::prefix('admin')->middleware('auth','isAdmin')->group(function () {
    
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    //PROFILE
    Route::get('profile', [ProfileController::class,'index'])->name('profile');
    Route::put('update-profile', [ProfileController::class,'updateProfile'])->name('update-profile');
    Route::get('show-form-profile', [ProfileController::class,'showFormProfile'])->name('show-form-profile');

    //USER
    Route::get('users', [UserController::class,'index'])->name('users');

    //CATEGORY
    Route::get('category', [CategoryController::class,'index'])->name('category');
    Route::get('add-category', [CategoryController::class,'create'])->name('add-category');
    Route::post('add-category', [CategoryController::class,'store'])->name('add-category');
    Route::get('edit-category/{id}', [CategoryController::class,'edit'])->name('edit-category');
    Route::put('update-category/{id}', [CategoryController::class,'update'])->name('update-category');
    Route::get('delete-category/{id}', [CategoryController::class,'destroy'])->name('delete-category');
    
    //POST
    Route::get('post', [PostController::class,'index'])->name('post');
    Route::get('add-post', [PostController::class,'create'])->name('add-post');
    Route::post('add-post', [PostController::class,'store'])->name('add-post');
    Route::get('edit-post/{id}', [PostController::class,'edit'])->name('edit-post');
    Route::put('update-post/{id}', [PostController::class,'update'])->name('update-post');
    Route::get('delete-post/{id}', [PostController::class,'destroy'])->name('delete-post');

});

Route::prefix('frontend')->middleware('auth')->group(function () {
    

});