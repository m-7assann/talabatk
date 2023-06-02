<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Fortify::ignoreRoutes();

        $request=request();
        if(request()->is('admin/*')){
            Config::set('fortify.guard', 'admin');
            Config::set('fortify.prefix','admin');
            Config::set('fortify.passwords','admin');
            Config::set('fortify.home','admin/dashboard');
        }
        elseif($request->is('resturant/*')){
            Config::set('fortify.guard','resturant');
            Config::set('fortify.prefix','resturant');
            Config::set('fortify.passwords','resturant');
            Config::set('fortify.home','resturant/dashboard');
        }else{
            
            Config::set('fortify.prefix','');
            Config::set('fortify.passwords','users');
            Config::set('fortify.home','');
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
        Fortify::viewPrefix('auth.');
    }
}
