<?php

namespace Akill\Payment\Helpers;

use Illuminate\Http\Request;

interface InMethodPayment
{
    public function create($value);
    public function status();
    public function approve();
    public function cancel();
    public function expire();
}
