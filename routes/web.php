<?php

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



Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout' );
Auth::routes(['verify' => true]);
Auth::routes();


/*
|--------------------------------------------------------------------------
| Frontend pages Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', function () {
    return view('web.index');
})->name('/');


Route::get('/about-us', function () {
    return view('web.pages.about-us');
})->name('about-us');


Route::get('/forum', function () {
    return view('web.pages.forum');
})->name('forum');


// Route::get('/community', function () {
//     return view('web.pages.community');
// })->name('community');

Route::get('/community', [App\Http\Controllers\CommunityController::class,'index'])->name('community');


// Route::get('/single-topic', function () {
//     return view('web.pages.single-topic');
// })->name('single-topic');


Route::get('/community/single-post/{slug}', [App\Http\Controllers\CommunityController::class,'single'])->name('single-post');

Route::get('/community/category/{slug}', [App\Http\Controllers\CommunityController::class,'categories'])->name('community.category');


Route::get('/testimonials', function () {
    return view('web.pages.testimonials');
})->name('testimonials');


Route::get('/how-it-works', function () {
    return view('web.pages.how-it-works');
})->name('how-it-works');

/* 
Route::get('/pricing', function () {
    return view('web.pages.pricing');
})->name('pricing'); */


/* Route::get('/picklist', function () {
    return view('web.pages.picklist');
})->name('picklist');


Route::get('/picklist-single', function () {
    return view('web.pages.picklist-single');
})->name('picklist-single');
 */




/*
|--------------------------------------------------------------------------
| Error Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/404', function () {
    return view('web.errors.404');
})->name('404');


Route::get('/500', function () {
    return view('web.errors.500');
})->name('500');


Route::get('/403', function () {
    return view('web.errors.403');
})->name('403');
// End error routes




Route::get('/magzine', [App\Http\Controllers\HomeController::class, 'magzine'])->name('magzine');
Route::get('/magzine/single', [App\Http\Controllers\HomeController::class, 'magzinesingle'])->name('magzine-single');

Route::get('/models', [App\Http\Controllers\HomeController::class, 'models'])->name('models');
Route::get('models/grid', [App\Http\Controllers\HomeController::class, 'modelsgrid'])->name('models.grid');
Route::get('models/single', [App\Http\Controllers\HomeController::class, 'modelsingle'])->name('models.single');
Route::get('/find-talent', [App\Http\Controllers\HomeController::class, 'findtalent'])->name('findtalent');



Route::get('/find-productions', [App\Http\Controllers\HomeController::class, 'findproductions'])->name('findproductions');
Route::get('/production/single', [App\Http\Controllers\HomeController::class, 'singleproduction'])->name('singleproduction');
Route::get('/production/apply', [App\Http\Controllers\HomeController::class, 'applyproduction'])->name('applyproduction');

Route::middleware(['isCandidate'])->group(function () {
    Route::get('/pricing', [App\Http\Controllers\PlanController::class, 'index'])->name('pricing');
});
// Talent Profile ========================================================

/* Route::get('/account/talent/profile', [App\Http\Controllers\TalentController::class, 'profile'])->name('account.talent.profile');

Route::get('/account/talent/detail', [App\Http\Controllers\TalentController::class, 'detail'])->name('account.talent.detail'); */

// Talent Profile ========================================================

Route::group(['namespace' => 'Subscription\Controllers'], function () {
    
    /**
     * Subscription Resource Routes
     */

    Route::middleware(['auth'])->group(function () {
        Route::get('/subscription/{plan}', [App\Http\Controllers\Subscription\SubscriptionController::class, 'index'])->name('subscription.index');
        Route::post('/subscription', [App\Http\Controllers\Subscription\SubscriptionController::class, 'store'])->name('subscription.store');

    });
});

Route::group(['prefix' => '/account', 'middleware' => ['auth','isCandidate'], 'namespace' => 'Account', 'as' => 'account.'], function () {

    /**
     * Profile
     */
    Route::middleware(['subscription.customer'])->group(function () {
        Route::get('/talent/profile', [App\Http\Controllers\Account\TalentController::class, 'profile'])->name('talent.profile');
        Route::post('/talent/profile', [App\Http\Controllers\Account\TalentController::class, 'store'])->name('talent-profile.store');
        Route::put('/talent/profile', [App\Http\Controllers\Account\TalentController::class, 'store'])->name('talent-profile.store');
    });
    
    Route::get('/talent/detail', [App\Http\Controllers\Account\TalentController::class, 'detail'])->name('talent.detail');

    /**
     * Subscription
     */
    Route::group(['prefix' => '/subscription', 'namespace' => 'Subscription', 'as' => 'subscription.'], function () {

        /**
         * New
         *
         * Accessed if new subscription.
         */    
        /* Route::group(['prefix' => '/new', 'as' => 'new.'], function () {
            // new index
            Route::get('/{plan}', [App\Http\Controllers\Account\Subscription\SubscriptionCardController::class,'newSubscription'])->name('index');

        }); */

        Route::get('getPaymentMethod', [App\Http\Controllers\Account\Subscription\SubscriptionController::class,'getPaymentMethod'])->name('getPaymentMethod');

        /**
         * Cancel
         *
         * Accessed if there is an active subscription.
         */
        Route::group(['prefix' => '/cancel', 'middleware' => ['subscription.notcancelled'], 'as' => 'cancel.'], function () {
            // cancel subscription index
            Route::get('/', 'SubscriptionCancelController@index')->name('index');

            // cancel subscription
            Route::post('/', 'SubscriptionCancelController@store')->name('store');
        });

        /**
         * Resume
         *
         * Accessed if subscription is cancelled but not expired.
         */
        Route::group(['prefix' => '/resume', 'middleware' => ['subscription.cancelled'], 'as' => 'resume.'], function () {
            // resume subscription index
            Route::get('/', 'SubscriptionResumeController@index')->name('index');

            // resume subscription
            Route::post('/', 'SubscriptionResumeController@store')->name('store');
        });

        /**
         * Swap Subscription
         *
         * Accessed if there is an active subscription.
         */
        Route::group(['prefix' => '/swap', 'middleware' => ['subscription.notcancelled'], 'as' => 'swap.'], function () {
            // swap subscription index
            Route::get('/', 'SubscriptionSwapController@index')->name('index');

            // swap subscription store
            Route::post('/', 'SubscriptionSwapController@store')->name('store');
        });

        /**
         * Card
         */
        Route::group(['prefix' => '/card', 'middleware' => ['subscription.customer'], 'as' => 'card.'], function () {
            // card index
            Route::get('/', 'SubscriptionCardController@index')->name('index');

            // card store
            Route::post('/', 'SubscriptionCardController@store')->name('store');
        });

    });
});

//Backend Routes


Route::group([
	'prefix' => 'backend',
    'as' => 'backend.',
	'middleware' => ['isAdmin'],
],function(){
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('plan', App\Http\Controllers\Admin\PlanController::class);
    Route::resource('topic', App\Http\Controllers\Admin\TopicController::class);
});

Route::group([
	'prefix' => 'agent',
    'as' => 'agent.',
	'middleware' => ['isAgent'],
],function(){
    /* Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard'); */
    Route::resource('picklist', App\Http\Controllers\Agent\PicklistController::class);
    Route::resource('topic', App\Http\Controllers\Agent\TopicController::class);
});

//postjob controller
Route::resource('postjob',App\Http\Controllers\PostJobController::class);