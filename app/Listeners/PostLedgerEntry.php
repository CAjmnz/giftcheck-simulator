<?php

namespace App\Listeners;

use App\Events\BudgetApproved;
use App\Actions\Budget\CreateLedgerEntryAction;

class PostLedgerEntry
{
    public function handle(BudgetApproved $event)
    {
        (new CreateLedgerEntryAction())->execute($event->request);
    }
}