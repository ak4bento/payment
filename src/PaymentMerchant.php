<?php

namespace Akill\Payment;

use Akill\Payment\App\MidtransController;
use Akill\Payment\App\DokuController;

class PaymentMerchant {
    
	public static function merchant($value = 'midtrans',$transaction = null) {
        switch ($value) {
			case 'midtrans':
				return new MidtransController($transaction);
			case 'doku':
				return new DokuController($transaction);
		}
	}
}