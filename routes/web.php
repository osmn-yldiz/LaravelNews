<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RedirectIfAuthenticated;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::controller(\App\Http\Controllers\Frontend\IndexController::class)->group(function () {
    Route::get('/', 'Index');
    Route::get('/news/details/{id}/{slug}', 'NewsDetails');
    Route::get('/news/category/{id}/{slug}', 'CatWiseNews');
    Route::get('/news/subcategory/{id}/{slug}', 'SubCatWiseNews');

    Route::get('/lang/change', 'changeLang')->name('changeLang');
    Route::post('/search', 'searchByDate')->name('search-by-date');
    Route::post('/news/search', 'NewsSearch')->name('news.search');

    Route::get('/reporter/news/{id}', 'ReporterNews')->name('reporter.news');
});

Route::controller(\App\Http\Controllers\Frontend\ReviewController::class)->group(function () {
    Route::post('/review/store', 'reviewStore')->name('review.store');
});

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\UserController::class, 'UserDashboard'])->name('dashboard');
    Route::post('/user/profile/store', [\App\Http\Controllers\UserController::class, 'UserProfileStore'])->name('user.profile.store');
    Route::get('/user/logout', [\App\Http\Controllers\UserController::class, 'UserLogout'])->name('user.logout');
    Route::get('/change/password', [\App\Http\Controllers\UserController::class, 'ChangePassword'])->name('change.password');
    Route::post('/user/change/password', [\App\Http\Controllers\UserController::class, 'UserChangePassword'])->name('user.change.password');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'role:admin'], 'name' => 'admin.', 'as' => 'admin.'], function () {
    Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'AdminDashboard'])->name('dashboard');
    Route::get('/profile', [\App\Http\Controllers\AdminController::class, 'AdminProfile'])->name('profile');
    Route::post('/profile/store', [\App\Http\Controllers\AdminController::class, 'AdminProfileStore'])->name('profile.store');
    Route::get('/change/password', [\App\Http\Controllers\AdminController::class, 'AdminChangePassword'])->name('change.password');
    Route::post('/update/password', [\App\Http\Controllers\AdminController::class, 'AdminUpdatePassword'])->name('update.password');
    Route::get('/logout', [\App\Http\Controllers\AdminController::class, 'AdminLogout'])->name('logout');

    // Admin Category Route List
    Route::group(['prefix' => '/category', 'name' => 'category.', 'as' => 'category.'], function () {
        Route::get('/', [\App\Http\Controllers\Backend\CategoryController::class, 'CategoryAll'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Backend\CategoryController::class, 'CategoryCreate'])->name('create');
        Route::post('/store', [\App\Http\Controllers\Backend\CategoryController::class, 'CategoryStore'])->name('store');
        Route::get('/edit/{id}', [\App\Http\Controllers\Backend\CategoryController::class, 'CategoryEdit'])->name('edit');
        Route::put('/update/{id}', [\App\Http\Controllers\Backend\CategoryController::class, 'CategoryUpdate'])->name('update');
        Route::get('/destroy/{id}', [\App\Http\Controllers\Backend\CategoryController::class, 'CategoryDestroy'])->name('destroy');
    });

    // Admin SubCategory Route List
    Route::group(['prefix' => '/subcategory', 'name' => 'subcategory.', 'as' => 'subcategory.'], function () {
        Route::get('/', [\App\Http\Controllers\Backend\SubcategoryController::class, 'SubcategoryAll'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Backend\SubcategoryController::class, 'SubcategoryCreate'])->name('create');
        Route::post('/store', [\App\Http\Controllers\Backend\SubcategoryController::class, 'SubcategoryStore'])->name('store');
        Route::get('/edit/{id}', [\App\Http\Controllers\Backend\SubcategoryController::class, 'SubcategoryEdit'])->name('edit');
        Route::put('/update/{id}', [\App\Http\Controllers\Backend\SubcategoryController::class, 'SubcategoryUpdate'])->name('update');
        Route::get('/destroy/{id}', [\App\Http\Controllers\Backend\SubcategoryController::class, 'SubcategoryDestroy'])->name('destroy');

        Route::get('/ajax/{category_id}', [\App\Http\Controllers\Backend\SubcategoryController::class, 'GetSubCategory']);
    });

    // Admin User Route List
    Route::group(['prefix' => '/user', 'name' => 'user.', 'as' => 'user.'], function () {
        Route::get('/', [\App\Http\Controllers\Backend\AdminController::class, 'Index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Backend\AdminController::class, 'Create'])->name('create');
        Route::post('/store', [\App\Http\Controllers\Backend\AdminController::class, 'Store'])->name('store');
        Route::get('/edit/{id}', [\App\Http\Controllers\Backend\AdminController::class, 'Edit'])->name('edit');
        Route::put('/update/{id}', [\App\Http\Controllers\Backend\AdminController::class, 'Update'])->name('update');
        Route::get('/destroy/{id}', [\App\Http\Controllers\Backend\AdminController::class, 'Destroy'])->name('destroy');

        Route::get('/inactive/{id}', [\App\Http\Controllers\Backend\AdminController::class, 'Inactive'])->name('inactive');
        Route::get('/active/{id}', [\App\Http\Controllers\Backend\AdminController::class, 'Active'])->name('active');
    });

    // Admin News Post Route List
    Route::group(['prefix' => '/newspost', 'name' => 'newsPost.', 'as' => 'newsPost.'], function () {
        Route::get('/', [\App\Http\Controllers\Backend\NewsPostController::class, 'Index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Backend\NewsPostController::class, 'Create'])->name('create');
        Route::post('/store', [\App\Http\Controllers\Backend\NewsPostController::class, 'Store'])->name('store');
        Route::get('/edit/{id}', [\App\Http\Controllers\Backend\NewsPostController::class, 'Edit'])->name('edit');
        Route::put('/update/{id}', [\App\Http\Controllers\Backend\NewsPostController::class, 'Update'])->name('update');
        Route::get('/destroy/{id}', [\App\Http\Controllers\Backend\NewsPostController::class, 'Destroy'])->name('destroy');

        Route::get('/inactive/{id}', [\App\Http\Controllers\Backend\NewsPostController::class, 'Inactive'])->name('inactive');
        Route::get('/active/{id}', [\App\Http\Controllers\Backend\NewsPostController::class, 'Active'])->name('active');
    });

    // Admin Banner Route List
    Route::group(['prefix' => '/banner', 'name' => 'banner.', 'as' => 'banner.'], function () {
        Route::get('/', [\App\Http\Controllers\Backend\BannerController::class, 'Index'])->name('index');
        Route::put('/update/{id}', [\App\Http\Controllers\Backend\BannerController::class, 'Update'])->name('update');
    });

    // Admin Photo Gallery Route List
    Route::group(['prefix' => '/photogallery', 'name' => 'photogallery.', 'as' => 'photogallery.'], function () {
        Route::get('/', [\App\Http\Controllers\Backend\PhotoGalleryController::class, 'Index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Backend\PhotoGalleryController::class, 'Create'])->name('create');
        Route::post('/store', [\App\Http\Controllers\Backend\PhotoGalleryController::class, 'Store'])->name('store');
        Route::get('/edit/{id}', [\App\Http\Controllers\Backend\PhotoGalleryController::class, 'Edit'])->name('edit');
        Route::put('/update/{id}', [\App\Http\Controllers\Backend\PhotoGalleryController::class, 'Update'])->name('update');
        Route::get('/destroy/{id}', [\App\Http\Controllers\Backend\PhotoGalleryController::class, 'Destroy'])->name('destroy');
    });

    // Admin Video Gallery Route List
    Route::group(['prefix' => '/videogallery', 'name' => 'videogallery.', 'as' => 'videogallery.'], function () {
        Route::get('/', [\App\Http\Controllers\Backend\VideoGalleryController::class, 'Index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Backend\VideoGalleryController::class, 'Create'])->name('create');
        Route::post('/store', [\App\Http\Controllers\Backend\VideoGalleryController::class, 'Store'])->name('store');
        Route::get('/edit/{id}', [\App\Http\Controllers\Backend\VideoGalleryController::class, 'Edit'])->name('edit');
        Route::put('/update/{id}', [\App\Http\Controllers\Backend\VideoGalleryController::class, 'Update'])->name('update');
        Route::get('/destroy/{id}', [\App\Http\Controllers\Backend\VideoGalleryController::class, 'Destroy'])->name('destroy');
    });

    // Admin Live Tv Route List
    Route::group(['prefix' => '/livetv', 'name' => 'livetv.', 'as' => 'livetv.'], function () {
        Route::get('/', [\App\Http\Controllers\Backend\LiveTvController::class, 'Index'])->name('index');
        Route::put('/update/{id}', [\App\Http\Controllers\Backend\LiveTvController::class, 'Update'])->name('update');
    });

    // Admin Review Route List
    Route::group(['prefix' => '/review', 'name' => 'review.', 'as' => 'review.'], function () {
        Route::get('/pending', [\App\Http\Controllers\Backend\ReviewController::class, 'ReviewPending'])->name('pending');
        Route::get('/approve/{id}', [\App\Http\Controllers\Backend\ReviewController::class, 'ReviewApprove'])->name('approve');

        Route::get('/approve', [\App\Http\Controllers\Backend\ReviewController::class, 'ApproveReview'])->name('approved');
        Route::get('/approve/destroy/{id}', [\App\Http\Controllers\Backend\ReviewController::class, 'DestroyReview'])->name('destroy');
    });

    // Admin Seo Route List
    Route::group(['prefix' => '/seo', 'name' => 'seo.', 'as' => 'seo.'], function () {
        Route::get('/', [\App\Http\Controllers\Backend\SeoController::class, 'SeoSiteSetting'])->name('index');
        Route::put('/update/{id}', [\App\Http\Controllers\Backend\SeoController::class, 'UpdateSeoSetting'])->name('update');
    });

    // Admin Permission Route List
    Route::group(['prefix' => '/permission', 'name' => 'permission.', 'as' => 'permission.'], function () {
        Route::get('/', [\App\Http\Controllers\Backend\PermissionController::class, 'Index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Backend\PermissionController::class, 'Create'])->name('create');
        Route::post('/store', [\App\Http\Controllers\Backend\PermissionController::class, 'Store'])->name('store');
        Route::get('/edit/{id}', [\App\Http\Controllers\Backend\PermissionController::class, 'Edit'])->name('edit');
        Route::put('/update/{id}', [\App\Http\Controllers\Backend\PermissionController::class, 'Update'])->name('update');
        Route::get('/destroy/{id}', [\App\Http\Controllers\Backend\PermissionController::class, 'Destroy'])->name('destroy');
    });

    // Admin Role Route List
    Route::group(['prefix' => '/role', 'name' => 'role.', 'as' => 'role.'], function () {
        Route::get('/', [\App\Http\Controllers\Backend\RoleController::class, 'Index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Backend\RoleController::class, 'Create'])->name('create');
        Route::post('/store', [\App\Http\Controllers\Backend\RoleController::class, 'Store'])->name('store');
        Route::get('/edit/{id}', [\App\Http\Controllers\Backend\RoleController::class, 'Edit'])->name('edit');
        Route::put('/update/{id}', [\App\Http\Controllers\Backend\RoleController::class, 'Update'])->name('update');
        Route::get('/destroy/{id}', [\App\Http\Controllers\Backend\RoleController::class, 'Destroy'])->name('destroy');
    });

    // Admin Role Permission Route List
    Route::group(['prefix' => '/role-permission', 'name' => 'role-permission.', 'as' => 'role-permission.'], function () {
        Route::get('/', [\App\Http\Controllers\Backend\RolePermissionController::class, 'Index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Backend\RolePermissionController::class, 'Create'])->name('create');
        Route::post('/store', [\App\Http\Controllers\Backend\RolePermissionController::class, 'Store'])->name('store');
        Route::get('/edit/{id}', [\App\Http\Controllers\Backend\RolePermissionController::class, 'Edit'])->name('edit');
        Route::put('/update/{id}', [\App\Http\Controllers\Backend\RolePermissionController::class, 'Update'])->name('update');
        Route::get('/destroy/{id}', [\App\Http\Controllers\Backend\RolePermissionController::class, 'Destroy'])->name('destroy');
    });
});

Route::get('/admin/login', [\App\Http\Controllers\AdminController::class, 'AdminLogin'])->middleware(RedirectIfAuthenticated::class)->name('admin.login');
Route::get('/admin/logout/page', [\App\Http\Controllers\AdminController::class, 'AdminLogoutPage'])->name('admin.logout.page');

require __DIR__ . '/auth.php';
