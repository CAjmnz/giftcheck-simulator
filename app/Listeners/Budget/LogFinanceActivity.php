<?php

namespace App\Listeners\Budget;

use App\Events\Budget\BudgetApproved;
use Illuminate\Support\Facades\DB;

class LogFinanceActivity
{
    public function handle(BudgetApproved $event)
    {
        DB::table('audit_logs')->insert([
            'module'       => 'Budget',
            'action'       => 'Approved',
            'reference_id' => $event->request->br_id ?? null,
            'user_id'      => optional($event->request->user())->id ?? null,
            'old_values'   => null,
            'new_values'   => json_encode(['ledger_no' => $event->ledgerNo]),
            'description'  => 'Budget Approved - Ledger ' . $event->ledgerNo,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);
    }
}