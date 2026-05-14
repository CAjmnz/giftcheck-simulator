<?php

namespace App\Actions\Adjustment;

use App\Models\LedgerBudget;
use App\Helpers\NumberHelper;

class CreateAdjustmentLedgerAction
{
    public function execute($request)
    {
        $request = (object) $request;

        $ledgerNo = LedgerBudget::max('bledger_no') + 1;

        return LedgerBudget::create([
            'bledger_no' => NumberHelper::leadingZero($ledgerNo, "%013d"),
            'bledger_trid' => $request->id,
            'bledger_datetime' => now(),
            'bledger_type' => 'BA',
            'bdebit_amt' => $request->type === 'positive' ? $request->adjrequest : null,
            'bcredit_amt' => $request->type === 'negative' ? $request->adjrequest : null,
            'bledger_typeid' => $request->btype,
            'bledger_group' => $request->bgroup,
        ]);
    }
}