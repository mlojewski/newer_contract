<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DualCareerController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\OrganizationPanelController;
use App\Http\Controllers\OrganizationTypeController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PersonTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PersonPanelController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/ad/filter', [FilterController::class, 'adFilter'])->name('ad.filter');
Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/organization/edit/{id}', [OrganizationController::class, 'edit'])->name('organization.edit');
    Route::put('/organization/update/{id}', [OrganizationController::class, 'update'])->name('organization.update');
    Route::get('/person/edit/{id}', [PersonController::class, 'edit'])->name('person.edit');
    Route::put('/person/update/{id}', [PersonController::class, 'update'])->name('person.update');
    Route::get('/organization/ads/{id}', [OrganizationController::class, 'adsManagement'])->name('organization.ads');
    Route::get('/user/show/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/person/message_panel', [PersonPanelController::class, 'messageManagement'])->name('person_panel.message_panel');
    Route::get('person/panel/{id}', [PersonPanelController::class, 'index'])->name('person_panel.panel');
    Route::get('/organization/panel/{id}', [OrganizationPanelController::class, 'index'])->name('organization_panel.panel');
    Route::get('/organization/ad_panel', [OrganizationPanelController::class, 'adManagement'])->name('organization_panel.ad_panel');
    Route::get('/organization/message_panel', [OrganizationPanelController::class, 'messageManagement'])->name('organization_panel.message_panel');
    Route::get('/message/show/{id}', [MessageController::class, 'show'])->name('message.single');
    Route::delete('/message/delete/{id}', [MessageController::class, 'delete'])->name('message.delete');

    Route::middleware('is_admin')->group(function () {
        Route::get('/dual/edit', [DualCareerController::class, 'edit'])->name('dual.edit');
        Route::put('dual/update', [DualCareerController::class, 'update'])->name('dual.update');
        Route::put('/blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
        Route::get('/admin/panel', [AdminPanelController::class, 'index'])->name('panel');
        Route::get('/admin/blog_panel', [AdminPanelController::class, 'blogManagement'])->name('blog_panel');
        Route::get('/admin/country_panel', [AdminPanelController::class, 'countryManagement'])->name('country_panel');
        Route::get('/admin/city_panel', [AdminPanelController::class, 'cityManagement' ])->name('city_panel');
        Route::get('/admin/player_panel', [AdminPanelController::class, 'peopleManagement'])->name('player_panel');
        Route::get('/admin/sport_panel', [AdminPanelController::class, 'sportManagement'])->name('sport_panel');
        Route::get('/admin/organization_panel', [AdminPanelController::class, 'organizationManagement'])->name('organization_panel');
        Route::get('/admin/ad_panel', [AdminPanelController::class, 'adManagement'])->name('ad_panel');
        Route::get('/admin/content_panel', [AdminPanelController::class, 'contentManagement'])->name('content_panel');
        Route::get('/gender/create', [GenderController::class, 'create'])->name('gender.create');
        Route::post('/gender/store', [GenderController::class, 'store'])->name('gender.store');
        Route::get('/organization_type/create', [OrganizationTypeController::class, 'create'])->name('organization_type.create');
        Route::post('/organization_type/store', [OrganizationTypeController::class, 'store'])->name('organization_type.store');
        Route::get('/person_type/create', [PersonTypeController::class, 'create'])->name('person_type.create');
        Route::post('/person_type/store', [PersonTypeController::class, 'store'])->name('person_type.store');
        Route::get('/language/create', [LanguageController::class, 'create'])->name('language.create');
        Route::post('/language/store', [LanguageController::class, 'store'])->name('language.store');
        Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
        Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');
        Route::get('/country/create', [CountryController::class, 'create'])->name('country.create');
        Route::post('/country/store', [CountryController::class, 'store'])->name('country.store');
        Route::get('/city/create', [CityController::class, 'create'])->name('city.create');
        Route::post('/city/store', [CityController::class, 'store'])->name('city.store');
        Route::get('/sport/create', [SportController::class, 'create'])->name('sport.create');
        Route::post('/sport/store', [SportController::class, 'store'])->name('sport.store');
        Route::delete('/blog/delete/{id}', [BlogController::class, 'delete'])->name('blog.delete');
        Route::delete('/city/delete/{id}', [CityController::class, 'delete'])->name('city.delete');
        Route::delete('/country/delete/{id}', [CountryController::class, 'delete'])->name('country.delete');
        Route::delete('/gender/delete/{id}', [GenderController::class, 'delete'])->name('gender.delete');
        Route::delete('/person_type/delete/{id}', [PersonTypeController::class, 'delete'])->name('person_type.delete');
        Route::delete('/organization_type/delete/{id}', [OrganizationTypeController::class, 'delete'])->name('organization_type.delete');
        Route::delete('/language/delete/{id}', [LanguageController::class, 'delete'])->name('language.delete');
        Route::delete('/sport/delete/{id}', [SportController::class, 'delete'])->name('sport.delete');
        Route::delete('/organization/delete/{id}', [OrganizationController::class, 'delete'])->name('organization.delete');
        Route::delete('/person/delete/{id}', [PersonController::class, 'delete'])->name('person.delete');
        Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
        Route::get('/organization_type/edit/{id}', [OrganizationTypeController::class, 'edit'])->name('organization_type.edit');
        Route::put('/organization_type/update/{id}', [OrganizationTypeController::class, 'update'])->name('organization_type.update');
        Route::get('/gender/edit/{id}', [GenderController::class, 'edit'])->name('gender.edit');
        Route::put('/gender/update/{id}', [GenderController::class, 'update'])->name('gender.update');
        Route::get('/person_type/edit/{id}', [PersonTypeController::class, 'edit'])->name('person_type.edit');
        Route::put('/person_type/update/{id}', [PersonTypeController::class, 'update'])->name('person_type.update');
        Route::get('/language/edit/{id}', [LanguageController::class, 'edit'])->name('language.edit');
        Route::put('/language/update/{id}', [LanguageController::class, 'update'])->name('language.update');
        Route::get('/country/edit/{id}', [CountryController::class, 'edit'])->name('country.edit');
        Route::put('/country/update/{id}', [CountryController::class, 'update'])->name('country.update');
        Route::get('/city/edit/{id}', [CityController::class, 'edit'])->name('city.edit');
        Route::put('/city/update/{id}', [CityController::class, 'update'])->name('city.update');
        Route::put('/home/update', [HomeController::class, 'update'])->name('home.update');
        Route::get('/home/edit', [HomeController::class, 'edit'])->name('home.edit');

        Route::get('/sport/edit/{id}', [SportController::class, 'edit'])->name('sport.edit');
        Route::put('/sport/update/{id}', [SportController::class, 'update'])->name('sport.update');
    });



    Route::get('/ad/create', [AdController::class, 'create'])->name('ad.create');
    Route::post('/ad/store', [AdController::class, 'store'])->name('ad.store');
    Route::delete('/ad/delete/{id}', [AdController::class, 'delete'])->name('ad.delete');
    Route::get('/ad/edit/{id}', [AdController::class, 'edit'])->name('ad.edit');
    Route::put('/ad/update/{id}', [AdController::class, 'update'])->name('ad.update');
    Route::get('/ad/show/{id}', [AdController::class, 'show'])->name('ad.single');
    Route::get('ad/list', [AdController::class, 'index'])->name('ad.index');
    Route::get('ad/deactivate/{id}', [AdController::class, 'deactivate'])->name('ad.deactivate');
});

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.single');

Route::post('/message/store', [MessageController::class, 'store'])->name('message.store');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/person/create', [PersonController::class, 'create'])->name('person.create');
Route::post('/person/store', [PersonController::class, 'store'])->name('person.store');

Route::get('/organization/create', [OrganizationController::class, 'create'])->name('organization.create');
Route::post('organization/store', [OrganizationController::class, 'store'])->name('organization.store');

Route::get('/forms', [UserController::class, 'index'])->name('user.forms');
Route::get('/dual', [DualCareerController::class, 'index'])->name('dual.index');

require __DIR__.'/auth.php';
