<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\ActorPrizeMovieController;
use App\Http\Controllers\ActorPrizeSerieController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\Auth\UserProfile;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\DirectorPrizeMovieController;
use App\Http\Controllers\DirectorPrizeSerieController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PrizeController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\StoryController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::controller(ActorController::class)->prefix('/actors')->name('actors')->group(function () {
    Route::middleware(['admin'])->group(function () {
    Route::get('/create',  'create')->name('.create');
        Route::get('/index',  'index');
    Route::get('/edit/{id}', 'edit')->name('.edit');
    Route::post('/store',  'store')->name('.store');
    Route::put('/update/{id}', 'update')->name('.update');
    Route::delete('/delete/{id}',  'destroy')->name('.delete');
    });
    Route::get('/show/{id}', 'show')->name('.show');
});


Route::controller(DirectorController::class)->prefix('/directors')->name('directors')->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/create',  'create')->name('.create');
        Route::get('/index',  'index');
        Route::get('/edit/{id}', 'edit')->name('.edit');
        Route::post('/store',  'store')->name('.store');
        Route::put('/update/{id}', 'update')->name('.update');
        Route::delete('/delete/{id}',  'destroy')->name('.delete');
    });
    Route::get('/show/{id}', 'show')->name('.show');
});


Route::controller(AdvertisementController::class)->middleware(['admin'])->prefix('/advertisements')->name('advertisements')->group(function () {
    Route::get('/create',  'create')->name('.create');
    Route::get('/index',  'index');
    Route::post('/store',  'store')->name('.store');
    Route::delete('/delete/{id}',  'destroy')->name('.delete');
});

Route::controller(GenreController::class)->middleware(['admin'])->prefix('/genres')->name('genres')->group(function () {
    Route::get('/create',  'create')->name('.create');
    Route::get('/index',  'index');
    Route::post('/store',  'store')->name('.store');
    Route::delete('/delete/{id}',  'destroy')->name('.delete');
});

Route::controller(PrizeController::class)->middleware(['admin'])->prefix('/prizes')->name('prizes')->group(function () {
    Route::get('/create',  'create')->name('.create');
    Route::get('/index',  'index');
    Route::get('/edit/{id}', 'edit')->name('.edit');
    Route::post('/store',  'store')->name('.store');
    Route::put('/update/{id}', 'update')->name('.update');
    Route::delete('/delete/{id}',  'destroy')->name('.delete');
});


Route::controller(StoryController::class)->prefix('/stories')->name('stories')->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/create',  'create')->name('.create');
        Route::get('/index',  'index');
        Route::get('/edit/{id}', 'edit')->name('.edit');
        Route::post('/store',  'store')->name('.store');
        Route::put('/update/{id}', 'update')->name('.update');
        Route::delete('/delete/{id}',  'destroy')->name('.delete');
    });
    Route::get('/show/{id}', 'show')->name('.show');
});

Route::controller(CompanyController::class)->middleware(['admin'])->prefix('/companies')->name('companies')->group(function () {
    Route::get('/create',  'create')->name('.create');
    Route::get('/index',  'index');
    Route::get('/edit/{id}', 'edit')->name('.edit');
    Route::post('/store',  'store')->name('.store');
    Route::put('/update/{id}', 'update')->name('.update');
    Route::delete('/delete/{id}',  'destroy')->name('.delete');
});

Route::controller(MovieController::class)->prefix('/movies')->name('movies')->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/create',  'create')->name('.create');
        Route::get('/index',  'index')->name('.index');;
        Route::get('/edit/{id}', 'edit')->name('.edit');
        Route::post('/store',  'store')->name('.store');
        Route::put('/update/{id}', 'update')->name('.update');
        Route::delete('/delete/{id}',  'destroy')->name('.delete');
    });

    Route::get('/show/{id}', 'show')->name('.show');
    Route::middleware(['auth'])->group(function () {
        Route::get('/addtofav/{id}', 'addtofav')->name('.addtofav');
        Route::get('/removefromfav/{id}', 'removefromfav')->name('.removefromfav');
        Route::post('/rate/{id}', 'rate')->name('.rate');
    });
});

Route::controller(SerieController::class)->prefix('/series')->name('series')->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/create',  'create')->name('.create');
        Route::get('/index',  'index')->name('.index');
        Route::get('/edit/{id}', 'edit')->name('.edit');
        Route::post('/store',  'store')->name('.store');
        Route::put('/update/{id}', 'update')->name('.update');
        Route::delete('/delete/{id}',  'destroy')->name('.delete');
    });

    Route::get('/show/{id}', 'show')->name('.show');
    Route::middleware(['auth'])->group(function () {
        Route::get('/addtofav/{id}', 'addtofav')->name('.addtofav');
        Route::get('/removefromfav/{id}', 'removefromfav')->name('.removefromfav');
        Route::post('/rate/{id}', 'rate')->name('.rate');
    });
});

Route::controller(CharacterController::class)->prefix('/characters')->name('characters')->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/create',  'create')->name('.create');
        Route::get('/index',  'index');
        Route::get('/edit/{id}', 'edit')->name('.edit');
        Route::post('/store',  'store')->name('.store');
        Route::put('/update/{id}', 'update')->name('.update');
        Route::delete('/delete/{id}',  'destroy')->name('.delete');
    });

    Route::get('/show/{id}', 'show')->name('.show');
});

Route::controller(ActorPrizeMovieController::class)->middleware(['admin'])->prefix('/actorprizemovies')->name('actorprizemovies')->group(function () {
    Route::get('/create',  'create')->name('.create');
    Route::get('/index',  'index');
    Route::post('/store',  'store')->name('.store');
    Route::delete('/delete/{actor_id}/{prize_id}/{movie_id}',  'destroy')->name('.delete');
});

Route::controller(ActorPrizeSerieController::class)->middleware(['admin'])->prefix('/actorprizeseries')->name('actorprizeseries')->group(function () {
    Route::get('/create',  'create')->name('.create');
    Route::get('/index',  'index');
    Route::post('/store',  'store')->name('.store');
    Route::delete('/delete/{actor_id}/{prize_id}/{movie_id}',  'destroy')->name('.delete');
});

Route::controller(DirectorPrizeMovieController::class)->middleware(['admin'])->prefix('/directorprizemovies')->name('directorprizemovies')->group(function () {
    Route::get('/create',  'create')->name('.create');
    Route::get('/index',  'index');
    Route::post('/store',  'store')->name('.store');
    Route::delete('/delete/{director_id}/{prize_id}/{movie_id}',  'destroy')->name('.delete');
});

Route::controller(DirectorPrizeSerieController::class)->middleware(['admin'])->prefix('/directorprizeseries')->name('directorprizeseries')->group(function () {
    Route::get('/create',  'create')->name('.create');
    Route::get('/index',  'index');
    Route::post('/store',  'store')->name('.store');
    Route::delete('/delete/{director_id}/{prize_id}/{movie_id}',  'destroy')->name('.delete');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/',  'movies')->name('movies');
    Route::get('movies/filter',  'filtermovies')->name('movies.filter');
    Route::get('/series',  'series')->name('series');
    Route::get('series/filter',  'filterseries')->name('series.filter');
});

Route::controller(UserProfile::class)->middleware(['auth'])->name('user')->group(function () {
    Route::get('/edit',  'edit')->name('.edit');
    Route::put('/update', 'update')->name('.update');
});