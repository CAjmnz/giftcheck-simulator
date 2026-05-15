<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Actions\Budget\ApproveBudgetAction;
use App\Actions\Budget\CancelBudgetAction;
use App\Actions\Budget\CreateLedgerEntryAction;

use App\Events\Budget\BudgetApproved; // ✅ subfolder namespace

class BudgetController extends Controller
{
    public function approve(Request $request)
    {
        $request->validate([
            'br_id'     => 'required',
            'br_req'    => 'required',
            'br_budtype'=> 'required',
            'br_group'  => 'required',
        ]);

        $ledger   = (new CreateLedgerEntryAction())->execute($request);
        $approval = (new ApproveBudgetAction())->execute($request, $ledger->bledger_no);

        event(new BudgetApproved($request, $ledger->bledger_no)); // ✅

        return response()->json([
            'success'  => true,
            'ledger'   => $ledger,
            'approval' => $approval
        ]);
    }

    public function cancel(Request $request)
    {
        $result = (new CancelBudgetAction())->execute($request);

        return response()->json([
            'success' => true,
            'data'    => $result
        ]);
    }
}