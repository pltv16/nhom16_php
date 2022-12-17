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

//Pickup Post
Route::get('f-pickup-post',[FrontendController::class,'pickup'])->name('f-pickup-post');

//LOST
Route::get('f-lost-post',[FrontendController::class,'lost'])->name('f-lost-post');

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
    Route::get('f-detail-manage-post/{id}', [FManageController::class,'detail'])->name('f-detail-manage-post');
    Route::get('f-post-manage-trash', [FManageController::class,'trash'])->name('f-post-manage-trash');
    Route::get('f-delete-post-manage/{id}', [FManageController::class,'destroy'])->name('f-delete-post-manage');
    Route::get('f-edit-post-manage/{id}', [FManageController::class,'edit'])->name('f-edit-post-manage');
    Route::put('f-update-post-manage/{id}', [FManageController::class,'update'])->name('f-update-post-manage');
    Route::get('f-post-trash', [FManageController::class,'trash'])->name('f-post-trash');
    Route::get('f-post-untrash/{id}', [FManageController::class,'untrash'])->name('f-post-untrash');
    Route::get('f-post-forcedel/{id}', [FManageController::class,'forcedel'])->name('f-post-forcedel');

    //POST
    Route::get('f-add-post', [FPostController::class,'create'])->name('f-add-post');
    Route::post('f-add-post', [FPostController::class,'store'])->name('f-add-post');
    Route::get('f-edit-post/{id}', [FPostController::class,'edit'])->name('f-edit-post');
    Route::put('f-update-post/{id}', [FPostController::class,'update'])->name('f-update-post');
    Route::post('f-delete-post', [FPostController::class,'destroy'])->name('f-delete-post');
    Route::get('f-search', [FrontendController::class,'search'])->name('f-search');


    //COMMENT
    Route::post('f-comment', [FCommentController::class,'store'])->name('f-comment');
    Route::get('f-edit-comment/{id}', [FCommentController::class,'edit'])->name('f-edit-comment');
    Route::put('f-update-comment/{id}', [FCommentController::class,'update'])->name('f-update-comment');
    Route::get('f-delete-comment/{id}', [FCommentController::class,'destroy'])->name('f-delete-comment');

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
    //COMMENT MANAGE
    Route::post('comment', [CommentController::class,'store'])->name('comment');
    Route::get('delete-comment/{id}', [CommentController::class,'destroy'])->name('delete-comment');
    Route::get('edit-comment/{id}', [CommentController::class,'edit'])->name('edit-comment');
    Route::put('update-comment/{id}', [CommentController::class,'update'])->name('update-comment');

    //CATEGORY
    Route::get('category', [CategoryController::class,'index'])->name('category');
    Route::get('add-category', [CategoryController::class,'create'])->name('add-category');
    Route::post('add-category', [CategoryController::class,'store'])->name('add-category');
    Route::get('edit-category/{id}', [CategoryController::class,'edit'])->name('edit-category');
    Route::put('update-category/{id}', [CategoryController::class,'update'])->name('update-category');
    Route::get('delete-category/{id}', [CategoryController::class,'destroy'])->name('delete-category');
    Route::get('category-trash', [CategoryController::class,'trash'])->name('category-trash');
    Route::get('category-untrash/{id}', [CategoryController::class,'untrash'])->name('category-untrash');
    Route::get('category-forcedel/{id}', [CategoryController::class,'forcedel'])->name('category-forcedel');
    //POST
    Route::get('post', [PostController::class,'index'])->name('post');
    Route::get('add-post', [PostController::class,'create'])->name('add-post');
    Route::post('add-post', [PostController::class,'store'])->name('add-post');
    Route::get('edit-post/{id}', [PostController::class,'edit'])->name('edit-post');
    Route::put('update-post/{id}', [PostController::class,'update'])->name('update-post');
    Route::get('delete-post/{id}', [PostController::class,'destroy'])->name('delete-post');
    Route::get('post-trash', [PostController::class,'trash'])->name('post-trash');
    Route::get('post-untrash/{id}', [PostController::class,'untrash'])->name('post-untrash');
    Route::get('post-forcedel/{id}', [PostController::class,'forcedel'])->name('post-forcedel');

    //POST-MANAGE
    Route::get('post-manage',[ManageController::class,'index'])->name('post-manage');
    Route::get('detail-manage-post/{id}', [ManageController::class,'detail'])->name('detail-manage-post');
    Route::get('post-manage-trash', [ManageController::class,'trash'])->name('post-manage-trash');
    Route::get('delete-post-manage/{id}', [ManageController::class,'destroy'])->name('delete-post-manage');
    Route::get('edit-post-manage/{id}', [ManageController::class,'edit'])->name('edit-post-manage');
    Route::put('update-post-manage/{id}', [ManageController::class,'update'])->name('update-post-manage');

});
