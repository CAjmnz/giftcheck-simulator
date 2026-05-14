<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\Budget\ApproveBudgetAction;
use App\Actions\Budget\CancelBudgetAction;
use App\Actions\Budget\CreateLedgerEntryAction;

class BudgetController extends Controller
{

   public function approve(Request $request)
{
    // 1. create ledger first (MISSING IN YOUR CURRENT CODE)
    $ledgerNo = \App\Models\LedgerBudget::max('bledger_no') + 1;

    // 2. approve budget with ledger reference
    $result = (new ApproveBudgetAction())->execute(
        $request,
        $ledgerNo
    );

    return response()->json([
        'success' => true,
        'data' => $result
    ]);
}

    public function cancel(Request $request)
    {
        return (new CancelBudgetAction())->execute($request);
    }
}
