<?php

namespace App\Actions\Budget;

use App\Models\LedgerBudget;
use App\Helpers\NumberHelper;

class CreateLedgerEntryAction
{
    public function execute($request)
    {
        $ledger = LedgerBudget::max('bledger_no') + 1;

        return LedgerBudget::create([
            'bledger_no' => NumberHelper::leadingZero($ledger, "%013d"),
            'bledger_trid' => $request->br_id,
            'bledger_datetime' => now(),
            'bledger_type' => 'RFBR',
            'bdebit_amt' => $request->br_req,
            'bledger_typeid' => $request->br_budtype,
            'bledger_group' => $request->br_group,
        ]);
    }
}
