<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\AdminSystemPolicy;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Gate::policy(User::class, AdminSystemPolicy::class);

        VerifyEmail::toMailUsing(function ($notifiable, $url) { 
            return (new MailMessage)
                 ->subject('Confirmez votre adresse email')
                 ->view('emails.verify', 
                    [ 
                     'action' => $url, 
                     'user' => $notifiable
                    ]); 
            });
    }
}
