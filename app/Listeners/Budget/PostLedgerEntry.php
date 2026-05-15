<?php

namespace App\Listeners\Budget;

use App\Events\Budget\BudgetApproved;

class PostLedgerEntry
{
    public function handle(BudgetApproved $event)
    {
        // ledger already created in controller
        return;
    }
}