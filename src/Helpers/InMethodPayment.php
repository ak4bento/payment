<?php

namespace Akill\Payment\Helpers;

use Illuminate\Http\Request;

interface InMethodPayment
{
    public function create($value);
    public function status($id);
    public function approve($id);
    public function cancel($id);
    public function expire($id);
}
