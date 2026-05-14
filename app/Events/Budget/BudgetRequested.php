<?php

namespace App\Events\Budget;

class BudgetRequested
{
    public $request;

    public function __construct($request)
    {
        $this->request = $request;
    }
}