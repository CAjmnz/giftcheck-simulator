<?php

namespace App\Listeners;

use App\Events\Adjustment\AdjustmentApproved;
use App\Actions\Adjustment\CreateAdjustmentLedgerAction;

class PostAdjustmentLedger
{
    public function handle(AdjustmentApproved $event)
    {
        (new CreateAdjustmentLedgerAction())->execute($event->request);
    }
}