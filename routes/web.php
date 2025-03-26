<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Pages\PartnerController;
use App\Http\Controllers\Pages\ServiceController;
use App\Http\Controllers\Pages\ServiceRequestController;
use App\Http\Controllers\Pages\ContactController;
use App\Http\Controllers\Pages\ContactFormController;
use App\Http\Controllers\Pages\HomePageController;
use App\Http\Controllers\Pages\SubscribeController;
use App\Http\Controllers\Dashboard\DashboardServiceController;
use App\Http\Controllers\Dashboard\DashboardPartnerController;
use App\Http\Controllers\Dashboard\DashboardServiceRequestController;
use App\Http\Controllers\Dashboard\DashboardContactController;
use App\Http\Controllers\Dashboard\DashboardContactFormController;
use App\Http\Controllers\Dashboard\DashboardTravelDealController;
use App\Http\Controllers\Dashboard\DashboardCarRentalOfferController;
use App\Http\Controllers\Dashboard\DashboardPhotoShowcaseController;
use App\Http\Controllers\Dashboard\DashboardFeedbackController;
use App\Http\Controllers\Dashboard\BookingFormController;
use App\Http\Controllers\Dashboard\DynamicBookingController;
use App\Http\Controllers\Dashboard\DynamicBookingEntryController;
use App\Http\Controllers\Dashboard\ProjectTypeController;

use App\Http\Controllers\PaymentController;


// --{{ home }}
Route::get('/', [HomePageController::class, 'index'])->name('home');
// --{{ about }}
Route::get('/about', function () {
    return view('pages.about.index');
})->name('about');
// --{{ partner }}
Route::get('/partner', function () {
    return view('pages.partner.index');
})->name('partner');
Route::post('/partner-submit', [PartnerController::class, 'store'])->name('partner.submit');
// --{{ services }}
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
// --{{ requestservice }}
// Route::get('/request-service', [ServiceRequestController::class, 'index'])->name('requestservice');
Route::post('/service-request', [ServiceRequestController::class, 'store'])->name('service.request.store');
Route::get('/request-service/{service_id?}', [ServiceRequestController::class, 'index'])->name('requestservice');


// --{{ contactUs }}
Route::get('/contact-us', function () {
    return view('pages.contact-us.index');
})->name('contactUs');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/contact-form', [ContactFormController::class, 'store'])->name('contact.form.store');

// --{{ Auth }}
Route::get('/signup', [SignupController::class, 'index'])->name('signup');
Route::post('/signup', [SignupController::class, 'signup'])->name('signup.submit');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// --{{ profile }}
Route::middleware('auth')->group(function () {

});
// {{ routes for dashboard }}
Route::prefix('dashboard')->middleware(['auth'])->name('dashboard.')->group(function () {
    Route::resource('services', DashboardServiceController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::resource('partners', DashboardPartnerController::class);
    Route::resource('service_requests', DashboardServiceRequestController::class)->only(['index', 'destroy']);
    Route::resource('contacts', DashboardContactController::class)->only(['index', 'destroy']);
    Route::resource('contact_forms', DashboardContactFormController::class)->only(['index', 'destroy']);
    Route::resource('travel_deals', DashboardTravelDealController::class);
    Route::resource('car-rental', DashboardCarRentalOfferController::class);
    Route::resource('photo-showcases', DashboardPhotoShowcaseController::class);
    Route::resource('feedback', DashboardFeedbackController::class);
    Route::get('/subscriptions', [SubscribeController::class, 'index'])->name('subscriptions.index');
    Route::post('/subscribe', [SubscribeController::class, 'store'])->name('subscribe.store');
    Route::delete('/subscriptions/{id}', [SubscribeController::class, 'destroy'])->name('subscriptions.destroy');
    Route::resource('booking-forms', BookingFormController::class);
    Route::get('/dynamic-booking', [DynamicBookingController::class, 'index'])->name('dynamic-booking.index');
    Route::get('/dynamic-booking/create', [DynamicBookingController::class, 'create'])->name('dynamic-booking.create');
    Route::post('/dynamic-booking/store-section', [DynamicBookingController::class, 'storeSection'])->name('dynamic-booking.store-section');
    Route::get('/dynamic-booking/create-fields/{id}', [DynamicBookingController::class, 'createFields'])->name('dynamic-booking.create-fields');
    Route::post('/dynamic-booking/store-fields/{id}', [DynamicBookingController::class, 'storeFields'])->name('dynamic-booking.store-fields');
    Route::get('/dynamic-booking/show-section/{id}', [DynamicBookingController::class, 'showSection'])->name('dynamic-booking.show-section');
    Route::delete('/dynamic-booking/{section}', [DynamicBookingController::class, 'destroy'])->name('dynamic-booking.destroy');
    Route::post('/dynamic-booking/store/{sectionId}', [DynamicBookingEntryController::class, 'store'])->name('dynamic-booking.store-entry');
    Route::get('dynamic-booking/entries', [DynamicBookingEntryController::class, 'showEntries'])->name('dynamic-booking.entries');
    Route::resource('project-types', ProjectTypeController::class);
});
// {{ routes for payment }}
Route::get('/payment', [PaymentController::class, 'showForm'])->name('payment.form');
Route::post('/payment', [PaymentController::class, 'makePayment'])->name('payment.make');
Route::get('/paypal/success', [PaymentController::class, 'capturePaypalPayment'])->name('paypal.success');
Route::get('/paypal/cancel', function () {
    return redirect()->route('payment.form')->with('error', 'تم إلغاء الدفع عبر PayPal.');
})->name('paypal.cancel');
