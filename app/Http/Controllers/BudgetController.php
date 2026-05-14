<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\Budget\ApproveBudgetAction;
use App\Actions\Budget\CancelBudgetAction;

class BudgetController extends Controller
{
    public function approve(Request $request)
    {
        return (new ApproveBudgetAction())->execute(
            $request,
            $request->ledgerNo,
            $request->file ?? null
        );
    }

    public function cancel(Request $request)
    {
        return (new CancelBudgetAction())->execute($request);
    }
}