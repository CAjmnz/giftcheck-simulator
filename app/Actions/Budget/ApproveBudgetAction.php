<?php

namespace App\Actions\Budget;

use App\Models\ApprovedBudgetRequest;

class ApproveBudgetAction
{
    public function execute($request, $ledgerNo, $file = null)
    {
        return ApprovedBudgetRequest::create([
            'abr_budget_request_id' => $request->br_id,
            'abr_approved_by' => $request->br_appby,
            'abr_checked_by' => $request->br_checkby,
            'approved_budget_remark' => $request->br_remarks,
            'abr_approved_at' => now(),
            'abr_file_doc_no' => $file ?? '',
            'abr_prepared_by' => $request->user()->user_id,
            'abr_ledgerefnum' => $ledgerNo,
        ]);
    }
}