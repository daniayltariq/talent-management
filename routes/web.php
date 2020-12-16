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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');
Route::get('/verified_email', function () {
    return view('web.verified');
})->name('verified_email');

Route::get('/about-us', function () {
    return view('web.pages.about-us');
})->name('about-us');


Route::get('/forum', function () {
    return view('web.pages.forum');
})->name('forum');


// Route::get('/community', function () {
//     return view('web.pages.community');
// })->name('community');
Route::middleware(['hasCommunityReadAccess'])->group(function () {
    Route::get('/community', [App\Http\Controllers\CommunityController::class,'index'])->name('community');
    Route::get('/community/topic/read_more_comments', [App\Http\Controllers\CommunityController::class,'read_more_comments'])->name('read_more_comments');
    
    Route::get('/community/single-post/{slug}', [App\Http\Controllers\CommunityController::class,'single'])->name('single-post');

    Route::get('/community/category/{slug}', [App\Http\Controllers\CommunityController::class,'categories'])->name('community.category');
    Route::get('/community/post_suggest', [App\Http\Controllers\CommunityController::class,'post_suggest'])->name('post.suggest');

});

Route::post('/community/topic/like', [App\Http\Controllers\CommunityController::class,'post_like'])->name('post_like');
Route::group(['middleware' => ['isAdminOrAgentOrCandidate','isActive','hasCommunityReadWriteAccess']], function() {
    Route::post('/community/topic/comment', [App\Http\Controllers\CommunityController::class,'post_comment'])->name('post_comment');
    Route::post('/community/topic/reply_comment', [App\Http\Controllers\CommunityController::class,'reply_comment'])->name('reply_comment');
});

// Route::get('/single-topic', function () {
//     return view('web.pages.single-topic');
// })->name('single-topic');


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
Route::get('model/{link}', [App\Http\Controllers\HomeController::class, 'models'])->name('model');

Route::middleware(['auth'])->group(function () {
    Route::get('model/single/{id}', [App\Http\Controllers\HomeController::class, 'modelsingle'])->name('model.single');
});

Route::get('/find-talent', [App\Http\Controllers\HomeController::class, 'findtalent'])->name('findtalent');
Route::get('/search_talent', [App\Http\Controllers\HomeController::class, 'searchTalent'])->name('search_talent');



Route::get('/find-productions', [App\Http\Controllers\HomeController::class, 'findproductions'])->name('findproductions');
Route::get('/production/single', [App\Http\Controllers\HomeController::class, 'singleproduction'])->name('singleproduction');
Route::get('/production/apply', [App\Http\Controllers\HomeController::class, 'applyproduction'])->name('applyproduction');

Route::middleware(['isGuestOrCandidate'])->group(function () {
    Route::get('/pricing', [App\Http\Controllers\PlanController::class, 'index'])->name('pricing');
    Route::resource('user_request', App\Http\Controllers\UserRequestController::class);
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

Route::group(['prefix' => '/account', 'middleware' => ['auth','verified','isCandidate'], 'namespace' => 'Account', 'as' => 'account.'], function () {

    /**
     * Profile
     */
    Route::middleware(['subscription.customer','subscription.active'])->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Account\DashboardController::class, 'index'])->name('dashboard');

        Route::middleware(['isActive'])->group(function () {
            Route::post('/dashboard/profile', [App\Http\Controllers\Account\DashboardController::class, 'store'])->name('dashboard.profile');
            Route::post('/storeMedia', [App\Http\Controllers\Account\DashboardController::class, 'storeMedia'])->name('storeMedia');
            Route::delete('/fileDestroy', [App\Http\Controllers\Account\DashboardController::class, 'fileDestroy'])->name('fileDestroy');
            Route::post('/talent/profile', [App\Http\Controllers\Account\TalentController::class, 'store'])->name('talent-profile.store');
            Route::put('/talent/profile', [App\Http\Controllers\Account\TalentController::class, 'store'])->name('talent-profile.store');

            Route::post('/dashboard/social_links', [App\Http\Controllers\Account\DashboardController::class, 'social_links'])->name('dashboard.social_links');
        });
        
        Route::get('/talent/profile', [App\Http\Controllers\Account\TalentController::class, 'profile'])->name('talent.profile');
        Route::get('/talent/checkCustomLink', [App\Http\Controllers\Account\TalentController::class, 'checkCustomLink'])->name('talent.checkCustomLink');
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

    Route::get('/generate_referal', [App\Http\Controllers\Account\ReferalController::class, 'index'])->name('generate_referal');

    Route::get('/reward', [App\Http\Controllers\Account\ReferalController::class, 'reward'])->name('reward');

});

//Backend Routes

Route::group([
	'prefix' => 'backend',
    'as' => 'backend.',
	'middleware' => ['isAdmin'],
],function(){
    Route::get('/', function () {
        return 123123;
    })->name('dashboard');
    Route::resource('plan', App\Http\Controllers\Admin\PlanController::class);

    Route::resource('topic', App\Http\Controllers\Admin\TopicController::class);
    Route::get('/topic_status', [App\Http\Controllers\Admin\TopicController::class, 'updateStatus'])->name('topic.updateStatus');

    Route::resource('user', App\Http\Controllers\Admin\UserController::class);
    Route::get('/user_status', [App\Http\Controllers\Admin\UserController::class, 'updateStatus'])->name('user.updateStatus');
    Route::get('/user/impersonate/{id}', [App\Http\Controllers\Admin\UserController::class, 'impersonate'])->name('user.impersonate');
    Route::get('/user_request', [App\Http\Controllers\Admin\UserRequestController::class, 'userRequest'])->name('user.requests');
    Route::put('/user_request/{id}', [App\Http\Controllers\Admin\UserRequestController::class, 'acceptRequest'])->name('user.accept_request');
    Route::delete('/user_request/{id}', [App\Http\Controllers\Admin\UserRequestController::class, 'deleteRequest'])->name('user.delete_request');

    Route::resource('picklist', App\Http\Controllers\Admin\PicklistController::class);
    Route::get('/delete_picklist_item/{id}', [App\Http\Controllers\Admin\PicklistController::class, 'delete_picklist_item'])->name('delete_picklist_item');
    Route::post('/picklist_share/{id}', [App\Http\Controllers\Admin\PicklistController::class, 'picklist_share'])->name('picklist_share');

    Route::resource('tag', App\Http\Controllers\Admin\TagController::class);
    Route::resource('room', App\Http\Controllers\Admin\RoomController::class);
    Route::get('/room_status', [App\Http\Controllers\Admin\RoomController::class, 'updateStatus'])->name('room.updateStatus');

    Route::get('/view_save_search', [App\Http\Controllers\Admin\DashboardController::class, 'viewSaveSearch'])->name('view_save_search');
    Route::get('/apply_saved_search/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'applySaveSearch'])->name('apply_saved_search');
    Route::post('/save_search', [App\Http\Controllers\Admin\DashboardController::class, 'saveSearch'])->name('save_search');
});

Route::group([
	'prefix' => 'agent',
    'as' => 'agent.',
	'middleware' => ['isAgent'],
],function(){
    /* Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard'); */
    Route::resource('picklist', App\Http\Controllers\Agent\PicklistController::class);
    Route::resource('topic', App\Http\Controllers\Agent\TopicController::class);
    Route::post('mail_talent',[App\Http\Controllers\Agent\DashboardController::class, 'mailTalent'])->name('mail_talent');

});


//postjob controller
Route::resource('postjob',App\Http\Controllers\PostJobController::class);