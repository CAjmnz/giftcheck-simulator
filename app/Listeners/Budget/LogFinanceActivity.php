<?php

namespace App\Listeners\Budget;

use App\Models\LogDetails;

class LogFinanceActivity
{
    public function handle($event)
    {
        LogDetails::create([
            'user_id' => $event->request->user()->user_id,
            'transaction_details' => 'Approved Budget Request (Event Driven)',
        ]);
    }
}
