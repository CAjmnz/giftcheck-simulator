<?php

namespace App\Events\Budget;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BudgetApproved
{
    use Dispatchable, SerializesModels;

    public $request;
    public $ledgerNo;

    public function __construct($request, $ledgerNo)
    {
        $this->request  = $request;
        $this->ledgerNo = $ledgerNo;
    }
}