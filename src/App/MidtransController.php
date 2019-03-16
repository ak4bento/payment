<?php

namespace Akill\Payment\App;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Akill\Payment\Midtrans\Midtrans;
use Akill\Message\Message;
use Akill\Payment\Helpers\InMethodPayment;
use phpDocumentor\Reflection\Types\Array_;

class MidtransController extends AbstractPayment implements InMethodPayment
{
    /**
     * MidtransController constructor.
     * @param null $transaction_details
     */
    public function __construct($transaction_details = null){
        Midtrans::$serverKey = config('payment.midtrans_server_key');
        Midtrans::$isProduction = config('payment.production');
        if(!Midtrans::$serverKey) {
            return die('Please complete the Midtrans settings');
        }
        $this->create($transaction_details);
    }

    /** Actually send request to MIDTRANS server
     *
     * @param array transaction_details ['order_id', 'gross_amount']
     * @return MidtransController
     */
    public function create($transaction_details = null){
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
     * @param null $billing_address
     * @param null $shipping_address
     * @return MidtransController
     * @throws Exception
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
     * @return MidtransController
     */
    public function cc($bool){
        $this->transaction_data['credit_card'] = array('secure' => $bool);
        return $this;
    }

    /** Expiry time active
     *
     * @param int  $duration
     * @return MidtransController
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

    /**
     * @param Request $request
     * @param $value
     */
    public function status(Request $request , $value){

    }

    public function approve($value){
//        {
//            "status_code" : "200",
//            "status_message" : "Success, transaction is approved",
//            "transaction_id" : "ca297170-be4c-45ed-9dc9-be5ba99d30ee",
//            "masked_card" : "451111-1117",
//            "order_id" : "testing-0.4555-1414741517",
//            "payment_type" : "credit_card",
//            "transaction_time" : "2014-10-31 14:46:44",
//            "transaction_status" : "capture",
//            "fraud_status" : "accept",
//            "bank" : "bni",
//            "gross_amount" : "30000.00"
//        }
    }
    public function cancel($value){
//        {
//            "status_code" : "200",
//            "status_message" : "Success, transaction is canceled",
//            "transaction_id" : "249fc620-6017-4540-af7c-5a1c25788f46",
//            "masked_card" : "481111-1114",
//            "order_id" : "example-1424936368",
//            "payment_type" : "credit_card",
//            "transaction_time" : "2015-02-26 14:39:33",
//            "transaction_status" : "cancel",
//            "fraud_status" : "accept",
//            "bank" : "bni",
//            "gross_amount" : "30000.00"
//        }
    }
    public function expire($value){
//        {
//            "status_code": "407",
//            "status_message": "Success, transaction has expired",
//            "transaction_id": "447e846a-403e-47db-a5da-d7f3f06375d6",
//            "order_id": "vtmbill05",
//            "payment_type": "echannel",
//            "transaction_time": "2015-06-15 13:36:24",
//            "transaction_status": "expire",
//            "gross_amount": "10000.00"
//        }
    }
}
