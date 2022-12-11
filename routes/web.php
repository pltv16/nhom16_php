<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\PasswordController;
use App\Http\Controllers\Frontend\FPostController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ManageController;
use App\Http\Controllers\Frontend\FCommentController;
use App\Http\Controllers\Frontend\FManageController;
use App\Http\Controllers\Frontend\FProfileController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\FPasswordController;


Route::get('/home', [HomeController::class, 'error'])->name('home');

Route::get('/', [HomeController::class, 'index']);

Route::get('/timdothatlac', [FrontendController::class,'index'])->name('timdothatlac');

//POST
Route::get('f-detail-post/{id}', [FPostController::class,'detail'])->name('f-detail-post');


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
    Route::get('f-show-form-password', [FPasswordController::class,'showFormPassword'])->name('f-show-form-password');
    Route::post('f-change-password', [FPasswordController::class,'changePassword'])->name('f-change-password');
    
    //PROFILE
    Route::get('f-profile', [FProfileController::class,'index'])->name('f-profile');
    Route::put('f-update-profile', [FProfileController::class,'updateProfile'])->name('f-update-profile');
    Route::get('f-show-form-profile', [FProfileController::class,'showFormProfile'])->name('f-show-form-profile');

    //MANAGE
    Route::get('f-post-manage', [FManageController::class,'index'])->name('f-post-manage');
    Route::get('f-detail-post/{id}', [FManageController::class,'detail'])->name('detail-post');

    //POST
    Route::get('f-add-post', [FPostController::class,'create'])->name('f-add-post');
    Route::post('f-add-post', [FPostController::class,'store'])->name('f-add-post');
    Route::get('f-edit-post/{id}', [FPostController::class,'edit'])->name('f-edit-post');
    Route::put('f-update-post/{id}', [FPostController::class,'update'])->name('f-update-post');
    Route::post('f-delete-post', [FPostController::class,'destroy'])->name('f-delete-post');


    //COMMENT
    Route::post('f-comment', [FCommentController::class,'store'])->name('f-comment');

});

Route::prefix('admin')->middleware('auth','isAdmin')->group(function () {
    
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    //CHANGE PASSWORD
    Route::get('show-form-password', [PasswordController::class,'showFormPassword'])->name('show-form-password');
    Route::post('change-password', [PasswordController::class,'changePassword'])->name('change-password');

    //PROFILE
    Route::get('profile', [ProfileController::class,'index'])->name('profile');
    Route::put('update-profile', [ProfileController::class,'updateProfile'])->name('update-profile');
    Route::get('show-form-profile', [ProfileController::class,'showFormProfile'])->name('show-form-profile');

    //USER
    Route::get('users', [UserController::class,'index'])->name('users');

    //COMMENT
    Route::get('comment', [CommentController::class,'index'])->name('comment');
    //COMMENT
    Route::post('comment', [CommentController::class,'store'])->name('comment');

    //CATEGORY
    Route::get('category', [CategoryController::class,'index'])->name('category');
    Route::get('add-category', [CategoryController::class,'create'])->name('add-category');
    Route::post('add-category', [CategoryController::class,'store'])->name('add-category');
    Route::get('edit-category/{id}', [CategoryController::class,'edit'])->name('edit-category');
    Route::put('update-category/{id}', [CategoryController::class,'update'])->name('update-category');
    Route::post('delete-category', [CategoryController::class,'destroy'])->name('delete-category');
    
    //POST
    Route::get('post', [PostController::class,'index'])->name('post');
    Route::get('add-post', [PostController::class,'create'])->name('add-post');
    Route::post('add-post', [PostController::class,'store'])->name('add-post');
    Route::get('edit-post/{id}', [PostController::class,'edit'])->name('edit-post');
    Route::put('update-post/{id}', [PostController::class,'update'])->name('update-post');
    Route::post('delete-post', [PostController::class,'destroy'])->name('delete-post');

    //POST-MANAGE
    Route::get('post-manage',[ManageController::class,'index'])->name('post-manage');
    Route::get('detail-post/{id}', [ManageController::class,'detail'])->name('detail-post');

});
