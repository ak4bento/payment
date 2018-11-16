<?php

namespace Akill\Payment;

use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/payment.php' => app()->basePath().'/config/payment.php',
        ], 'config');
    }

    public function register()
    {
        $this->app->bind(
            'Akill\Payment\App\MidtransController',
            'Akill\Payment\Midtrans\Midtrans',
            'Akill\Payment\Midtrans\Veritrans',
            'Akill\Payment\App\AbstractPayment',
            'Akill\Payment\Helpers\InMethodPayment'
        );
    }
}