<?php

namespace Akill\Payment;

use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([__DIR__.'/../config/payment.php' => app()->basePath().'/config/payment.php',], 'config');
        $this->publishes([  __DIR__.'/Assets' => public_path('vendor/asset_payment/')],'payment_assets');
        $this->loadViewsFrom(__DIR__.'/Views', 'Akill\Payment');

        require __DIR__.'/routes.php';
    }

    public function register()
    {
        $this->app->bind(
            'Akill\Payment\App\MidtransController',
            //'Akill\Payment\App\DokuController',
            'Akill\Payment\App\Controller',
            'Akill\Payment\Midtrans\Midtrans',
            'Akill\Payment\Midtrans\Veritrans',
            'Akill\Payment\App\AbstractPayment',
            'Akill\Payment\Helpers\InMethodPayment'
        );
    }
}
