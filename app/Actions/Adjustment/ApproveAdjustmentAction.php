<?php

namespace App\Actions\Adjustment;

use App\Domain\Adjustment\AdjustmentRules;
use App\Models\BudgetAdjustment;
use App\Models\ApprovedAdjustmentRequest;
use App\Events\Adjustment\AdjustmentApproved;
use Illuminate\Support\Facades\DB;

class ApproveAdjustmentAction
{
    public function execute($request)
    {
        $request = (object) $request;

        $adj = BudgetAdjustment::findOrFail($request->id);

        if (!AdjustmentRules::canApprove($adj)) {
            return false;
        }

        return DB::transaction(function () use ($request, $adj) {

            ApprovedAdjustmentRequest::create([
                'app_adj_request_id' => $request->id,
                'app_approved_by' => $request->appby,
                'app_checked_by' => $request->checkby,
                'app_approved_at' => now(),
                'app_prepared_by' => $request->user()->user_id,
                'app_adj_remark' => $request->remarks,
                'app_file_doc_no' => $request->file ?? '',
                'app_ledgeregnum' => $request->ledgerNo ?? null,
            ]);

            $adj->update([
                'adj_request_status' => '1'
            ]);

            event(new AdjustmentApproved($request));

            return true;
        });
    }
}