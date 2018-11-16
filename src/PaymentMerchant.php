<?php

namespace Akill\Payment;

use Akill\Payment\App\MidtransController;

class PaymentMerchant {
    
	public static function merchant($transaction, $value = 'midtrans') {
        switch ($value) {
			case 'midtrans':
				return new MidtransController($transaction);
		}
	}
}