<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductImageController;

//pages
Route::get('/', [PageController::class, 'index'])->name('pages.index');
Route::get('/about', [PageController::class, 'about'])->name('pages.about');

//contacts
Route::get('/contacts', [ContactController::class, 'index'])->middleware(['auth', 'role:admin'])->name('contacts.index');
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::post('/contacts', [ContactController::class, 'store'])->middleware(['auth', 'role:admin'])->name('contacts.store');
Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->middleware(['auth', 'role:admin'])->name('contacts.edit');
Route::put('/contacts/{contact}', [ContactController::class, 'update'])->middleware(['auth', 'role:admin'])->name('contacts.update');
Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->middleware(['auth', 'role:admin'])->name('contacts.destroy');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Add admin middleware for create, store, edit, and update routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products', [ProductController::class, 'store'])->name('products.store');
    Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});

Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');


Route::prefix('dashboard/permissions')->middleware(['auth', 'role:admin'])->name('permissions.')->group(function () {
    // Index - List all permissions and roles
    Route::get('/', [PermissionController::class, 'index'])->name('index');

    // Store a new permission
    Route::post('/', [PermissionController::class, 'store'])->name('store');

    // Update an existing permission
    Route::put('/{permission}', [PermissionController::class, 'update'])->name('update');

    // Destroy a permission
    Route::delete('/{permission}', [PermissionController::class, 'destroy'])->name('destroy');

    // Attach permission to a role
    Route::post('/{permission}/attach', [PermissionController::class, 'attach'])->name('attach');

    // Detach permission from a role
    Route::delete('/{permission}/detach', [PermissionController::class, 'detach'])->name('detach');

    // Sync permission with a role
    Route::put('/{permission}/sync', [PermissionController::class, 'sync'])->name('sync');
});

// Routes for roles ->middleware(['auth', 'role:admin'])
Route::prefix('dashboard/roles')->middleware(['auth', 'role:admin'])->name('roles.')->group(function () {
    // Store a new role
    Route::post('/', [PermissionController::class, 'storeRole'])->name('store');

    // Update an existing role
    Route::put('/{role}', [PermissionController::class, 'updateRole'])->name('update');

    // Destroy a role
    Route::delete('/{role}', [PermissionController::class, 'destroyRole'])->name('destroy');

    // Attach role to a permission
    Route::put('/{role}/sync', [PermissionController::class, 'syncRole'])->name('sync');
});

//routes for users
Route::prefix('users')->name('users.')->group(function () {
    // Index - List all users
    Route::get('/', [UserController::class, 'index'])->name('index');

    // Create a new user
    Route::get('/create', [UserController::class, 'create'])->name('create');

    // Store a new user
    Route::post('/', [UserController::class, 'store'])->name('store');

    // Show a specific user
    Route::get('/{user}', [UserController::class, 'show'])->name('show');

    // Edit a specific user
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');

    // Update a specific user
    Route::put('/{user}', [UserController::class, 'update'])->name('update');

    // Destroy a specific user
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');

    //sync roles edit
    Route::get('/{user}/sync_roles', [UserController::class, 'syncRolesEdit'])->name('sync_roles_edit');
    
    // Attach role to a user
    Route::put('/{user}/sync_roles', [UserController::class, 'syncRolesUpdate'])->name('sync_roles_update');
});

//categories
Route::middleware(['auth', 'role:admin'])->resource('categories', CategoryController::class);

//products images
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('products/{product}/images/create', [ProductImageController::class, 'create'])->name('products.images.create');
    Route::post('products/{product}/images', [ProductImageController::class, 'store'])->name('products.images.store');
    Route::delete('products/images/{image}', [ProductImageController::class, 'destroy'])->name('products.images.destroy');
});




require __DIR__.'/auth.php';
