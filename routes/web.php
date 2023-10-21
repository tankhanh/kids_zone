<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\CartAdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\MembershipPackageController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SoundController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\HistoryController;
use App\Http\Controllers\Client\LessonDetailUserController;
use App\Http\Controllers\Client\LessonUserController;
use App\Http\Controllers\Client\MembershipPackageUserController;
use App\Http\Controllers\Client\UserProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
});

Route::get('/client', function () {
    return view('client');
});

//Route Footer
Route::get('/about', function () {
    return view('about');
});

Route::get('/terms', function () {
    return view('terms');
});

Route::get('/contact', function () {
    return view('contact');
});
Route::get('/FAQ', function () {
    return view('FAQ');
});

Route::get('lessons', [LessonUserController::class, 'index'])->name('index')->middleware('check_login:2');
Route::get('lesson-detail/{lessonId}', [LessonDetailUserController::class, 'lessonDetail'])
    ->name('lesson-detail')
    ->middleware('check_login:2');

Route::get('/memory-game', function () {
    return view('memoryGame');
});

Route::get('/alphabet', function () {
    return view('alphabet');
});

Route::get('content/alphabet/A-pages', function () {
    return view('content.alphabet.A-pages');
});

Route::get('auth/checkout', function () {
    return view('auth.thanhtoan');
});

Route::get('memebershipPackages', [MembershipPackageUserController::class, 'index'])->name('index')->middleware('check_login:2');
//Route cart/payment
Route::post('momo-payment', [CartController::class, 'momo_payment'])->name('momo_payment')->middleware('check_login:2');
Route::get('cart', [CartController::class, 'cart'])->name('cart')->middleware('check_login:2');
Route::get('/add-to-cart/{id}/{quantity}', [CartController::class, 'addToCart'])->name('addToCart')->middleware('check_login:2');
Route::get('remove-cart/{id}', [CartController::class, 'removeCart'])->name('removeCart')->middleware('check_login:2');
//Route Login/Register/Logout
Route::get('auth/login', [LoginController::class, 'showLogin'])->name('showLogin');
Route::post('auth/login', [LoginController::class, 'login'])->name('login');
Route::get('auth/register', [RegisterController::class, 'showRegister'])->name('showRegister');
Route::post('auth/register', [RegisterController::class, 'register'])->name('register');
Route::get('auth/logout', Logout::class)->name('logout');

//Route EditProfile
Route::get('edit-profile', [UserProfileController::class, 'index'])->name('edit-profile')->middleware('check_login:2');
Route::post('edit-profile/update', [UserProfileController::class, 'update'])->name('update')->middleware('check_login:2');

// Route history
Route::get('history', [HistoryController::class, 'history'])->name('history')->middleware('check_login:2');

Route::prefix('admin')->name('admin.')->middleware('check_login:1')->group(function () {
    Route::prefix('dashboard')->name('dashboard.')->controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });
    Route::prefix('profile')->name('profile.')->controller(ProfileController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('edit', 'edit')->name('edit');
        Route::post('update', 'update')->name('update');
    });
    Route::prefix('category')->name('category.')->controller(CategoryController::class)->group(function () {
        Route::get('index', 'index')->name('index');

        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');

        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');

        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });
    Route::prefix('lesson')->name('lesson.')->controller(LessonController::class)->group(function () {
        Route::get('index', 'index')->name('index');

        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');

        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');

        Route::get('destroy/{id}', 'destroy')->name('destroy');

        
        Route::post('upload-file-image/{id}', 'uploadFileImage')->name('uploadFileImage');
        Route::get('delete-file-image/{id}', 'deleteFileImage')->name('deleteFileImage');

        Route::post('upload-file-sound/{id}', 'uploadFileSound')->name('uploadFileSound');
        Route::get('delete-file-sound/{id}', 'deleteFileSound')->name('deleteFileSound');
        
        Route::post('upload-file-video/{id}', 'uploadFileVideo')->name('uploadFileVideo');
        Route::get('delete-file-video/{id}', 'deleteFileVideo')->name('deleteFileVideo');
    });

    Route::prefix('user')->name('user.')->controller(UserController::class)->group(function () {
        Route::get('index', 'index')->name('index');

        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');

        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');

        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    Route::prefix('account')->name('account.')->controller(AccountController::class)->group(function () {
        Route::get('index', 'index')->name('index');

        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');

        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');

        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    Route::prefix('membershippackage')->name('membershippackage.')->controller(MembershipPackageController::class)->group(function () {
        Route::get('index', 'index')->name('index');

        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');

        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');

        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    Route::prefix('image')->name('image.')->controller(ImageController::class)->group(function () {
        Route::get('index', 'index')->name('index');

        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');

        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');

        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    Route::prefix('sound')->name('sound.')->controller(SoundController::class)->group(function () {
        Route::get('index', 'index')->name('index');

        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');

        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');

        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });

    Route::prefix('video')->name('video.')->controller(VideoController::class)->group(function () {
        Route::get('index', 'index')->name('index');

        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');

        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');

        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });
    Route::prefix('cart')->name('cart.')->controller(CartAdminController::class)->group(function () {
        Route::get('index', 'index')->name('index');

        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');

        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');

        Route::get('destroy/{id}', 'destroy')->name('destroy');
    });
});

// GAMES

Route::get('games', function () {
    return view('games/index');
})->middleware('check_login:2');

Route::get('games/snake', function () {
    return view('games/snake');
})->middleware('check_login:2');

Route::get('games/Menja-Game-master', function () {
    return view('games/Menja-Game-master');
})->middleware('check_login:2');

Route::get('games/piano', function () {
    return view('games/piano');
})->middleware('check_login:2');

Route::get('games/flappy-bird', function () {
    return view('games/flappy-bird');
})->middleware('check_login:2');

Route::get('games/draw-app', function () {
    return view('games/draw-app');
})->middleware('check_login:2');