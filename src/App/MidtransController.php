<?php

namespace Akill\Payment\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Akill\Payment\Midtrans\Midtrans;
use Akill\Message\Message;

class MidtransController extends AbstractPayment
{
    public function __construct($transaction_details){
        Midtrans::$serverKey = config('payment.midtrans_server_key');
        Midtrans::$isProduction = config('payment.production');
		$this->create($transaction_details);
    }
    
    /** Actually send request to MIDTRANS server 
     * 
     * @param array transaction_details ['order_id', 'gross_amount']
     * 
     */
    public function create($transaction_details){
        $this->transaction_data = array('transaction_details'=> $transaction_details);

        try
        {
            $token = null;

            $result = [
                'unique_code' => $transaction_details['order_id'],
                'token' => $token,
                'amount' => $transaction_details['gross_amount']
            ];

            $this->transaction_data['result'] = $result;
            return $this;
        }
        catch (Exception $e) 
        {   
            return Message::Error(400)->get();
        }
    }

    /** Generate data customer request to MIDTRANS server 
     * 
     * @param array customer_details [
     *      'first_name', //optional
     *      'last_name', //optional
     *      'email', 
     *      'phone', 
     *      'billing_address', //optional
     *      'shipping_address' //optional
     * ]
     */
    public function customer($customer_details, $billing_address = null, $shipping_address = null){

        $this->customer_details = $customer_details;

        if( empty($billing_address) && empty($shipping_address)) {
            return $this;
        }

        if(!is_array($billing_address) && !is_array($shipping_address)) {
            throw new Exception('Billing address not array');
        }
        
        // Optional
        $this->billing_address = $billing_address;

        // Optional
        $this->shipping_address = $shipping_address;

        $this->customer_details['billing_address'] = $this->billing_address;
        $this->customer_details['shipping_address'] = $this->shipping_address;
        $this->transaction_data['customer_details'] = $this->customer_details;

        return $this;
    }

    /** Credit Card secure 
     * 
     * @param boolean $bool
     */
    public function cc($bool){
        $this->transaction_data['credit_card'] = array('secure' => $bool);
        return $this;
    }

    /** Expiry time active 
     * 
     * @param string  $duration
     */
    public function expiry(int $duration = 1){
        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit'       => 'hour', 
            'duration'   => $duration
        );
        $this->transaction_data['custom_expiry'] = $custom_expiry;
        return $this;
    }

    public function status($value){}
    public function approve($value){}
    public function cancel($value){}
    public function expire($value){}
}
