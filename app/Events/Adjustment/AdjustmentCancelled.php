<?php

namespace App\Events\Adjustment;

class AdjustmentCancelled
{
    public $request;

    public function __construct($request)
    {
        $this->request = $request;
    }
}