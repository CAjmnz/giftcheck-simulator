<?php

namespace App\Listeners;

use App\Events\Adjustment\AdjustmentApproved;
use App\Events\Adjustment\AdjustmentCancelled;

class LogAdjustmentActivity
{
    public function handle($event)
    {
        // placeholder logging
    }
}