<?php

namespace App\Events\Budget;

class BudgetCancelled
{
    public $request;

    public function __construct($request)
    {
        $this->request = $request;
    }
}