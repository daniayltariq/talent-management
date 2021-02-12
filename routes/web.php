<?php

use Illuminate\Http\Request;
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
Auth::routes(/* ['verify' => true] */);
/* Auth::routes(); */

Route::get('signup',  [App\Http\Controllers\HomeController::class,'showSignUp'])->name('signup');
// Authentication Routes...
Route::get('login',  [App\Http\Controllers\Auth\LoginController::class,'showLoginForm'])->name('login');
Route::post('login',  [App\Http\Controllers\Auth\LoginController::class,'login']);
Route::post('logout',  [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

// Registration Routes...
Route::get('register',  [App\Http\Controllers\Auth\RegisterController::class,'showRegistrationForm'])->name('register');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class,'register']);
Route::get('agent_register',  [App\Http\Controllers\Auth\AgentRegisterController::class,'showAgentForm'])->name('agent_register');
Route::post('agent_register',  [App\Http\Controllers\Auth\AgentRegisterController::class,'validateAgentForm'])->name('agent_register');

// Password Reset Routes...
Route::get('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class,'showResetForm'])->name('password.reset');
Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class,'reset'])->name('password.update');

// Confirm Password (added in v6.2)
Route::get('password/confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class,'showConfirmForm'])->name('password.confirm');
Route::post('password/confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class,'confirm']);

// Email Verification Routes...
Route::get('email/verify', [App\Http\Controllers\Auth\VerificationController::class,'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class,'verify'])->name('verification.verify'); // v6.x
/* Route::get('email/verify/{id}', [App\Http\Controllers\Auth\VerificationController::class,verify')->name('verification.verify'); // v5.x */
Route::get('email/resend', [App\Http\Controllers\Auth\VerificationController::class,'resend'])->name('verification.resend');

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

Route::get('/about', function () {
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
Route::get('/testimonials', [App\Http\Controllers\HomeController::class, 'testimonials'])->name('testimonials');


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
Route::get('/ensura', function () {
    return view('print.ensura');
})->name('ensura');

Route::get('/404', function () {
    return view('web.errors.404');
})->name('404');

Route::get('/419', function () {
    return view('web.pages.419');
})->name('419');


Route::get('/500', function () {
    return view('web.errors.500');
})->name('500');


Route::get('/403', function () {
    return view('web.errors.403');
})->name('403');
// End error routes

Route::get('/user_agreement', function () {
    return view('web.pages.user_agreement');
})->name('user_agreement');

Route::get('/license_agreement', function () {
    return view('web.pages.license_agreement');
})->name('license_agreement');

Route::get('/denial', function (Request $request) {
    return view('web.pages.denial')->with('message',session('message'));
})->name('denial');

Route::get('/magzine', [App\Http\Controllers\HomeController::class, 'magzine'])->name('magzine');
Route::get('/magzine/single', [App\Http\Controllers\HomeController::class, 'magzinesingle'])->name('magzine-single');

Route::get('/models', [App\Http\Controllers\HomeController::class, 'models'])->name('models');
Route::get('models/grid', [App\Http\Controllers\HomeController::class, 'modelsgrid'])->name('models.grid');
Route::get('member/{link}', [App\Http\Controllers\HomeController::class, 'models'])->name('model');

Route::middleware(['auth'])->group(function () {
    Route::get('model/single/{id}', [App\Http\Controllers\HomeController::class, 'modelsingle'])->name('model.single');
});

Route::middleware(['isAdminOrAgent'])->group(function () {
    Route::get('/find-talent', [App\Http\Controllers\HomeController::class, 'findtalent'])->name('findtalent');
});
Route::get('/featured-talents', [App\Http\Controllers\HomeController::class, 'featured_talents'])->name('featured_talents');
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

    /* Route::middleware(['auth'])->group(function () { */
        Route::get('/subscription/{plan}', [App\Http\Controllers\Subscription\SubscriptionController::class, 'index'])->name('subscription.index');
        Route::post('/subscription', [App\Http\Controllers\Subscription\SubscriptionController::class, 'store'])->name('subscription.store');
        Route::get('/sendOtp', [App\Http\Controllers\Subscription\SubscriptionController::class, 'sendOtp'])->name('subscription.sendOtp');
        Route::get('/verifyOtp', [App\Http\Controllers\Subscription\SubscriptionController::class, 'verifyOtp'])->name('subscription.verifyOtp');
    /* }); */
});

Route::group(['prefix' => '/account', 'middleware' => ['auth'/* ,'verified' */,'isCandidate'], 'namespace' => 'Account', 'as' => 'account.'], function () {

    /**
     * Profile
     */
    Route::middleware(['subscription.customer','subscription.active'])->group(function () {
        Route::middleware(['hasNoData'])->group(function () {
            Route::get('/signup', [App\Http\Controllers\Account\DashboardController::class, 'signup'])->name('signup');
            Route::post('/signup', [App\Http\Controllers\Auth\RegisterController::class,'candidateSignup'])->name('candidate_signup');
            
        });
        
        

        Route::middleware(['isActive','hasData'])->group(function () {
            Route::get('/talent/profile', [App\Http\Controllers\Account\TalentController::class, 'profile'])->name('talent.profile');
            Route::get('/dashboard', [App\Http\Controllers\Account\DashboardController::class, 'index'])->name('dashboard');
            Route::post('/dashboard/profile', [App\Http\Controllers\Account\DashboardController::class, 'store'])->name('dashboard.profile');
            Route::post('/storeMedia', [App\Http\Controllers\Account\DashboardController::class, 'storeMedia'])->name('storeMedia');
            Route::delete('/fileDestroy', [App\Http\Controllers\Account\DashboardController::class, 'fileDestroy'])->name('fileDestroy');
            Route::post('/talent/profile', [App\Http\Controllers\Account\TalentController::class, 'store'])->name('talent-profile.store');
            Route::put('/talent/profile', [App\Http\Controllers\Account\TalentController::class, 'store'])->name('talent-profile.store');

            Route::post('/dashboard/social_links', [App\Http\Controllers\Account\DashboardController::class, 'social_links'])->name('dashboard.social_links');
            Route::get('resume', [App\Http\Controllers\Account\DashboardController::class, 'resume'])->name('resume');
        });
        
        Route::middleware(['hasData'])->group(function () {
            
            
            Route::get('/talent/checkCustomLink', [App\Http\Controllers\Account\TalentController::class, 'checkCustomLink'])->name('talent.checkCustomLink');
        });
    });
    
    Route::middleware(['hasData'])->group(function () {
        Route::get('/talent/detail', [App\Http\Controllers\Account\TalentController::class, 'detail'])->name('talent.detail');
        Route::get('/fetch_attachments', [App\Http\Controllers\Account\DashboardController::class, 'fetchAttachments'])->name('fetch_attachments');
        Route::get('/get_limit', [App\Http\Controllers\Account\DashboardController::class, 'index'])->name('get_limit');
    });

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
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class,'dashboard'])->name('dashboard');
    Route::get('/profile', [App\Http\Controllers\Admin\DashboardController::class,'profile'])->name('profile');
    Route::post('/profile', [App\Http\Controllers\Admin\DashboardController::class,'profileUpdate'])->name('profile.update');
    Route::resource('plan', App\Http\Controllers\Admin\PlanController::class);

    Route::resource('topic', App\Http\Controllers\Admin\TopicController::class);
    Route::get('/topic_comments', [App\Http\Controllers\Admin\TopicController::class, 'comments'])->name('topic.comments');
    Route::get('/approve_comment', [App\Http\Controllers\Admin\TopicController::class, 'approveComment'])->name('topic.approve_comment');
    Route::get('/topic_status', [App\Http\Controllers\Admin\TopicController::class, 'updateStatus'])->name('topic.updateStatus');

    Route::resource('user', App\Http\Controllers\Admin\UserController::class);
    Route::get('/user_status', [App\Http\Controllers\Admin\UserController::class, 'updateStatus'])->name('user.updateStatus');
    Route::get('/user_featured', [App\Http\Controllers\Admin\UserController::class, 'markFeatured'])->name('user.markFeatured');
    Route::get('/invite_user', [App\Http\Controllers\Admin\UserController::class, 'inviteUser'])->name('user.invite');

    Route::get('/user/impersonate/{id}', [App\Http\Controllers\Admin\UserController::class, 'impersonate'])->name('user.impersonate');
    Route::get('/user_request', [App\Http\Controllers\Admin\UserRequestController::class, 'userRequest'])->name('user.requests');
    Route::put('/user_request/{id}', [App\Http\Controllers\Admin\UserRequestController::class, 'acceptRequest'])->name('user.accept_request');
    Route::delete('/user_request/{id}', [App\Http\Controllers\Admin\UserRequestController::class, 'deleteRequest'])->name('user.delete_request');

    Route::resource('picklist', App\Http\Controllers\Admin\PicklistController::class);
    Route::get('/delete_picklist_item/{id}', [App\Http\Controllers\Admin\PicklistController::class, 'delete_picklist_item'])->name('delete_picklist_item');
    Route::get('/picklist_share/{id}', [App\Http\Controllers\Admin\PicklistController::class, 'picklist_share'])->name('picklist_share');

    Route::get('/text_talent/{id}', [App\Http\Controllers\Admin\PicklistController::class, 'text_talent'])->name('text_talent');

    Route::resource('tag', App\Http\Controllers\Admin\TagController::class);
    Route::resource('room', App\Http\Controllers\Admin\RoomController::class);
    Route::get('/room_status', [App\Http\Controllers\Admin\RoomController::class, 'updateStatus'])->name('room.updateStatus');

    Route::get('/view_save_search', [App\Http\Controllers\Admin\DashboardController::class, 'viewSaveSearch'])->name('view_save_search');
    Route::get('/apply_saved_search/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'applySaveSearch'])->name('apply_saved_search');
    Route::post('/save_search', [App\Http\Controllers\Admin\DashboardController::class, 'saveSearch'])->name('save_search');

    Route::resource('testimonial', App\Http\Controllers\Admin\TestimonialController::class);
});

Route::group([
	'prefix' => 'agent',
    'as' => 'agent.',
	'middleware' => ['isAgent','verified'],
],function(){
    /* Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard'); */
    Route::resource('picklist', App\Http\Controllers\Agent\PicklistController::class)->except(['destroy']);
    Route::get('/delete_picklist/{id}', [App\Http\Controllers\Agent\PicklistController::class, 'delete_picklist'])->name('delete_picklist');
    Route::get('/delete_picklist_user/{id}', [App\Http\Controllers\Agent\PicklistController::class, 'delete_picklist_user'])->name('delete_picklist_user');

    Route::resource('topic', App\Http\Controllers\Agent\TopicController::class);
    Route::post('mail_talent',[App\Http\Controllers\Agent\DashboardController::class, 'mailTalent'])->name('mail_talent');

    Route::post('send_text',[App\Http\Controllers\Agent\PicklistController::class, 'sendText'])->name('send_text');

    Route::get('/generate_referal', [App\Http\Controllers\Agent\ReferalController::class, 'index'])->name('generate_referal');
    Route::get('/reward', [App\Http\Controllers\Agent\ReferalController::class, 'reward'])->name('reward');
});


//postjob controller
Route::resource('postjob',App\Http\Controllers\PostJobController::class);