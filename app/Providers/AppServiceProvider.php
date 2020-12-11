<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Schema::defaultStringLength(191);

      VerifyEmail::toMailUsing(function ($notifiable) {
        $verifyUrl = URL::temporarySignedRoute(
             'verification.verify', Carbon::now()->addMinutes(60), ['id' => $notifiable->getKey(),'hash' => sha1($notifiable->getEmailForVerification()),]
         );

        // Return your mail here...
        return (new MailMessage)
        ->subject('Verify Email Address')
        ->markdown('emails.verify', ['url' => $verifyUrl,'user'=>auth()->user()->f_name]);
      });
    }
}
