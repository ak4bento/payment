<?php

namespace Akill\Payment\Helpers;

interface InMethodPayment 
{
    public function create($value);
    public function status($value);
    public function approve($value);
    public function cancel($value);
    public function expire($value);
}