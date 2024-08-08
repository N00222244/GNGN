<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;



use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\User\ArticleController as UserArticleController;
use App\Http\Controllers\Editor\ArticleController as EditorArticleController;
use App\Http\Controllers\Organizer\ArticleController as OrganizerArticleController;

use App\Http\Controllers\Admin\PublisherController as AdminPublisherController;
use App\Http\Controllers\User\PublisherController as UserPublisherController;
use App\Http\Controllers\Editor\PublisherController as EditorPublisherController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
// Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
// Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
// Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
// Route::get('/articles/edit', [ArticleController::class, 'edit'])->name('articles.edit'); 
// Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');



Route::resource('/user/articles', UserArticleController::class)->middleware(['auth'])->names('user.articles')->only(['index', 'show']);
Route::resource('/admin/articles', AdminArticleController::class)->middleware(['auth'])->names('admin.articles');
Route::resource('/editor/articles',EditorArticleController::class)->middleware(['auth'])->names('editor.articles')->only(['index', 'show', 'edit', 'update']);;
Route::resource('/organizer/articles', OrganizerArticleController::class)->middleware(['auth'])->names('organizer.articles')->only(['index', 'show']);;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
