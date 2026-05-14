<?php

namespace App\Events\Adjustment;

class AdjustmentApproved
{
    public $request;

    public function __construct($request)
    {
        $this->request = $request;
    }
}
