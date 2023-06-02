<?php

namespace App\Providers;

use App\Models\Order;
use App\Observers\OrderObserve;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\ProductionEnvironment;
use PayPalCheckoutSdk\Core\SandboxEnvironment;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('paypal.client',function($app){
            $config=config('services.paypal');
            if($config['mode']=='sandbox'){
                $environment = new SandboxEnvironment($config['client_id'], $config['secret']);
            }else{
                $environment = new ProductionEnvironment($config['client_id'], $config['secret']);
            }
            $client = new PayPalHttpClient($environment);
            return $client;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         
            Paginator::useBootstrap();
            Order::observe(OrderObserve::class);
    }
}
