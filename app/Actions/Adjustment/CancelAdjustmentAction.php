<?php

namespace App\Actions\Adjustment;

use App\Models\BudgetAdjustment;
use App\Events\Adjustment\AdjustmentCancelled;
use App\Models\CancelledAdjRequest;
use Illuminate\Support\Facades\DB;

class CancelAdjustmentAction
{
    public function execute($request)
    {
        $request = (object) $request;

        return DB::transaction(function () use ($request) {

            $adj = BudgetAdjustment::where('adj_id', $request->id)
                ->where('adj_request_status', '0')
                ->first();

            if (!$adj) {
                return false;
            }

            $adj->update([
                'adj_request_status' => '2'
            ]);

            CancelledAdjRequest::create([
                'cadj_req_id' => $request->id,
                'cadj_at' => now(),
                'cadj_by' => $request->user()->user_id,
            ]);

            event(new AdjustmentCancelled($request));

            return true;
        });
    }
}