<?php
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminLogin;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\Admin_accounts;
use App\Http\Controllers\Admin_portfolios;
use App\Http\Controllers\Admin_services;
use App\Http\Controllers\Home_feedback;
use App\Http\Middleware\Admin_login;
// Artisan
use Illuminate\Support\Facades\Artisan;
// middleware
use Illuminate\Support\Facades\Route;

// Admin panel routes

Route::middleware([Admin_login::class])->controller(AdminPanelController::class)->group(function (): void {
    Route::get('/Admin/Home/AddData', 'AdminHome')->name('Admin.Home');
    Route::get('/Admin/About/AddData', 'AdminAbout')->name('Admin.About.AddData');
    Route::get('/Admin/Services/AddData', 'AdminServices')->name('Admin.Services.AddData');
    Route::get('/Admin/Portfolio/AddData', 'AdminPortfolio')->name('Admin.Portfolio.AddData');
    Route::get('/Admin/Contact', 'AdminContact')->name('Admin.Contact');
    Route::get('/Admin/Accounts/AddData', 'AdminAccounts')->name('Admin.Accounts.AddData');
    Route::post('/StoreHomeData', 'StoreHomeData')->name('StoreHomeData');
    Route::get('/Admin/Home', 'ViewHomeData')->name('ViewsHomeData');
    Route::get('/UpdateHomeData/{id}', 'edit')->name('UpdateHomeData');
    Route::put('/UpdateHomeData/{id}', 'update')->name('UpdateHomeData.update');
    Route::get('/delete/{id}', 'delete')->name('delete');
    Route::get('/getNameDatas', 'Maingetdata')->name('getNameDatas');

    // Route::get(uri: '/index', action: 'getHomeData')->name(name: 'index')->withoutMiddleware(Admin_login::class); // Consider if this is necessary
    Route::get(uri: '/Home', action: 'getHomeData')->name(name: 'Home')->withoutMiddleware(Admin_login::class);
    Route::get(uri: '/', action: 'getHomeData')->name(name: 'index')->withoutMiddleware(Admin_login::class); // Consider if this is necessary
    Route::get(uri: '/getNameData', action: 'getNameData')->name(name: 'getNameData')->withoutMiddleware(Admin_login::class);
});

// ===================================about page routes================================
Route::middleware([Admin_login::class])->controller(AboutController::class)->group(function () {

    Route::post('/StoreAboutData', 'StoreAboutData')->name('StoreAboutData');
    Route::get('/Admin/About/ViewsData', 'getAboutData')->name('getAboutData');
    // views data
    Route::get('/AboutViewsData', 'getAboutData')->name('AboutViewsData');
    // updata data
    Route::get('/editAboutData/{id}', 'editAboutData')->name('editAboutData');
    Route::put('/UpdateAboutDatas/{id}', 'UpdateAboutData')->name(' UpdateAboutDatas');
    // delete data
    Route::get('/deleteAboutData/{id}', 'deleteAboutData')->name('deleteAboutData');
    // get about data for poftfolio

});

// ========================================Services page routes================================
Route::middleware([Admin_login::class])->controller(Admin_services::class)->group(function () {
    Route::post('/StoreServicesData', 'StoreServicesData')->name('StoreServicesData');
// views data
    Route::get('/getServicesData', 'getServicesData')->name('getServicesData');
    Route::get('/Admin/Service/ViewData', 'getServicesData')->name('Admin/Service/Views');

    // updata data
    Route::get('/editServicesData/{id}', 'editServicesData')->name('editServicesData');
    Route::put('/UpdateServicesData/{id}', 'updateServicesData')->name('UpdateServicesData');
    // delete data
    Route::get('/deleteServicesData/{id}', 'deleteServicesData')->name('deleteServicesData');

});

// ========================================portfolio page routes=================================

Route::middleware([Admin_login::class])->controller(Admin_portfolios::class)->group(function () {
    Route::post('/StorePortfolioData', 'StorePortfolioData')->name('StorePortfolioData');
    // get data
    Route::get('/getPortfolioData', 'getPortfolioData')->name('getPortfolioData');
    Route::get('/Admin/Portfolio/ViewsData', 'getPortfolioData')->name('Admin/Portfolio/ViewsData');

    // views data

    // updata data
    Route::get('/editPortfolioData/{id}', 'editPortfolioData')->name('editPortfolioData');
    Route::put('/UpdatePortfolioData/{id}', 'updatePortfolioData')->name('UpdatePortfolioData');
    // delete data
    Route::get('/deletePortfolioData/{id}', 'deletePortfolioData')->name('deletePortfolioData');

});

Route::middleware([Admin_login::class])->controller(Admin_accounts::class)->group(function () {
    Route::post('/StoreAccountData', 'StoreAccountData')->name('StoreAccountData');
    // get data
    Route::get('/getAccountData', 'getAccountData')->name('getAccountData');
    Route::get('/Admin/Accounts/ViewsData', 'getAccountData')->name('viewAccountData');

    // views data

    // updata data
    Route::get('/editAccountData/{id}', 'editAccountData')->name('editAccountData');
    Route::put('/UpdateAccountData/{id}', 'updateAccountData')->name('UpdateAccountData');
    // delete data
    Route::get('/deleteAccountData/{id}', 'deleteAccountData')->name('deleteAccountData');
});

// =========================================feedbacj page routes================================
Route::middleware([Admin_login::class])->controller(Home_feedback::class)->group(function () {
    Route::post('/StorefeedbackData', 'StorefeedbackData')->name('StorefeedbackData')->withoutMiddleware(Admin_login::class);;
    // get data
    Route::get('/getfeedbackData', 'getfeedbackData')->name('getfeedbackData');
    Route::get('/Admin/Feedback/ViewsData', 'getfeedbackData')->name('viewfeedbackData');
// get status data
// Route::get('/getstatusData', 'getstatusData')->name('getstatusData');

    // updata data
    Route::get('/editfeedbackData/{id}', 'editfeedbackData')->name('editfeedbackData');
    Route::put('/UpdatefeedbackData/{id}', 'updatefeedbackData')->name('UpdatefeedbackData');
    // delete data
    Route::get('/deletefeedbackData/{id}', 'deletefeedbackData')->name('deletefeedbackData');

});




Route::middleware([Admin_login::class])->controller(AdminLogin::class)->group(function () {

    Route::get('/AdminLogin', 'AdminLogin')->name('AdminLogin')->withoutMiddleware(Admin_login::class);
    Route::post('/AdminLogin', 'login')->name('AdminLoginPost')->withoutMiddleware(Admin_login::class);
    // Get profile data
    Route::get('/getprofileData', 'getprofiledata')->name('getprofileData');

    // View profile data
    Route::get('/Admin/Profile/ViewsData', 'getprofiledata')->name('viewProfileData');

    // Edit and update profile data
    Route::get('/editProfileData/{id}', 'editProfileData')->name('editProfileData');
    Route::put('/UpdateProfileData/{id}', 'UpdateProfileData')->name('UpdateProfileData');
    // adminLoginCheck
    Route::post('/AdminLoginCheck', 'AdminLoginCheck')->name('AdminLoginCheck')->withoutMiddleware(Admin_login::class);
    //  dashboard
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    // adminLogou
    Route::get('/adminLogout', 'adminLogout')->name('adminLogout');
});

Route::get('/clear-cache', function() {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    return 'Cache cleared!';
});
Route::get('/link', function() {
    Artisan::call('storage:link');

})->name('link');
