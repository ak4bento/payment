<?php
namespace Akill\Payment\App;

use Exception;
use Akill\Payment\Midtrans\Midtrans;
use phpDocumentor\Reflection\Types\This;

abstract class AbstractPayment {
    
    protected $param;

    /**
     * Defined custom expiry payment.
     * [optinal]
     * @var array
     */
    protected $custom_expiry = [];
    
    /**
     * Defined secure payment with credit card.
     * [optinal]
     * @var array
     */
    protected $credit_card = [];
    
    /**
     * Defined customer details for list data.
     * [optinal]
     * @var array
     */
    protected $customer_details = [];
    
    /**
     * Defined address customer sender.
     * [optinal]
     * @var array
     */
    protected $billing_address = [];
    
    /**
     * Defined addreess customer receive.
     * [optinal]
     * @var array
     */
    protected $shipping_address = [];
    
    /**
     * Defined all transaction for generate token MIDTRANS.
     * 
     * @var array
     */
    protected $transaction_data = [];
    
	public function __construct(){
    }
    
    public function all(){
        $midtrans = new Midtrans;

        $token = $midtrans->getSnapToken($this->transaction_data);
        $this->transaction_data['result']['token'] = $token;

        return $this->transaction_data;
    }

    public function get($byResponse){
        $midtrans = new Midtrans;

        $token = $midtrans->getSnapToken($this->transaction_data);
        $this->transaction_data['result']['token'] = $token;

        return $this->transaction_data[$byResponse];
    }
}