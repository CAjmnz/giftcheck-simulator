<?php

namespace App\Listeners;

use App\Events\Budget\BudgetApproved;
use App\Events\Budget\BudgetRequested;
use App\Events\Budget\BudgetCancelled;

class LogFinanceActivity
{
    public function handle($event)
    {
        // placeholder logging
    }
}
