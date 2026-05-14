<?php

namespace App\Events\Budget;

class BudgetApproved
{
    public $request;

    public function __construct($request)
    {
        $this->request = $request;
    }
}