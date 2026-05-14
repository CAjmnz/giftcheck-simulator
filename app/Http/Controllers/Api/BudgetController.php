<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\Budget\ApproveBudgetAction;
use App\Actions\Budget\CancelBudgetAction;
use App\Models\LedgerBudget;

class BudgetController extends Controller
{
    public function approve(Request $request)
    {
        $ledgerNo = LedgerBudget::max('bledger_no') + 1;

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
        $result = (new CancelBudgetAction())->execute($request);

        return response()->json([
            'success' => true,
            'data' => $result
        ]);
    }
}