<?php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\SubsubCategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('lang/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'fr', 'ar'])) {
        session(['locale' => $lang]);
    }
    return redirect()->back();
})->name('setLocale');

// Route for homepage
Route::get('/', function () {
    return view('index');
});

// Route for the services page
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

// Route for the portfolio page (user view)
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');

// Route for the about page
Route::get('/about', function () {
    return view('pages.Aboutus');
});

// Route for the contact page
Route::get('/contact', function () {
    return view('pages.Contact');
});
Route::post('/send-email', [ContactController::class, 'sendEmail'])->name('send.email');

// Routes for the blog
Route::get('/blog', [BlogsController::class, 'index'])->name('blog.index');
Route::get('/load-more-blogs', [BlogsController::class, 'loadMoreBlogs'])->name('blogs.loadMore');
Route::get('/blog/{id}', [BlogsController::class, 'show'])->name('blog.show');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
// Profile routes (requires authentication)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Category routes
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

// Subcategory routes
Route::get('/subcategories', [SubcategoryController::class, 'index'])->name('subcategories.index');
Route::post('/subcategories', [SubcategoryController::class, 'store'])->name('subcategories.store');
Route::put('/subcategories/{subcategory}', [SubcategoryController::class, 'update'])->name('subcategories.update');
Route::delete('/subcategories/{subcategory}', [SubcategoryController::class, 'destroy'])->name('subcategories.destroy');

// Subsubcategory routes
Route::get('/subsubcategories', [SubsubCategoryController::class, 'index'])->name('subsubcategories.index');
Route::post('/subsubcategories', [SubsubCategoryController::class, 'store'])->name('subsubcategories.store');
Route::put('/subsubcategories/{subsubCategory}', [SubsubCategoryController::class, 'update'])->name('subsubcategories.update');
Route::delete('/subsubcategories/{subsubCategory}', [SubsubCategoryController::class, 'destroy'])->name('subsubcategories.destroy');

// Article routes
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');

// Admin portfolio routes (protected by admin middleware or similar if needed)
Route::get('/admin/portfolios', [PortfolioController::class, 'adminPortfolios'])->name('admin.portfolios.index');
Route::get('/admin/portfolios/create', [PortfolioController::class, 'create'])->name('admin.portfolios.create');
Route::post('/admin/portfolios', [PortfolioController::class, 'store'])->name('admin.portfolios.store');
Route::get('/admin/portfolios/{portfolio}/edit', [PortfolioController::class, 'edit'])->name('admin.portfolios.edit');
Route::put('/admin/portfolios/{portfolio}', [PortfolioController::class, 'update'])->name('admin.portfolios.update');
Route::delete('/admin/portfolios/{portfolio}', [PortfolioController::class, 'destroy'])->name('admin.portfolios.destroy');
Route::get('/portfolio/category/{category}', [PortfolioController::class, 'filterByCategory'])->name('portfolio.filter');



Auth::routes(['register' => false]);
require __DIR__.'/auth.php';