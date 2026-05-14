<?php

namespace App\Actions\Budget;

use App\Models\ApprovedBudgetRequest;
use Illuminate\Http\Request;

class ApproveBudgetAction
{
    public function execute(Request $request, int $ledgerNo)
    {
        return ApprovedBudgetRequest::create([
            'abr_budget_request_id' => $request->br_id,
            'abr_approved_by'       => $request->br_appby ?? null,
            'abr_checked_by'        => $request->br_checkby ?? null,
            'approved_budget_remark'=> $request->br_remarks ?? null,
            'abr_approved_at'       => now(),
            'abr_file_doc_no'       => null,
            'abr_prepared_by'       => $request->user()?->user_id ?? null,
            'abr_ledgerefnum'       => $ledgerNo,
        ]);
    }
}