<?php

namespace App\Actions\Budget;

use App\Models\BudgetRequest;
use App\Domain\Budget\BudgetRules;
use App\Models\LedgerBudget;
use App\Helpers\NumberHelper;

class ApproveBudgetAction
{
    public function execute($request, $ledgerNo, $file = null)
    {
        $request = (object) $request;

        $budget = BudgetRequest::findOrFail($request->br_id);

        if (!BudgetRules::canApprove($budget)) {
            return false;
        }

        if (BudgetRules::requiresPreApproval($request) && $request->br_preappby != 1) {
            return false;
        }

        $approved = app(\App\Actions\Budget\CreateApprovedBudgetAction::class)
            ->execute($request, $ledgerNo, $file);

        BudgetRequest::where('br_id', $request->br_id)
            ->update(['br_request_status' => '1']);

        return $approved;
    }
}