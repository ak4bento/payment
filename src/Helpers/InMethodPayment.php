<?php

namespace Akill\Payment\Helpers;

use Illuminate\Http\Request;

interface InMethodPayment
{
    public function create($value);
    public function status(Request $request, $value);
    public function approve($value);
    public function cancel($value);
    public function expire($value);
}