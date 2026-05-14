<?php

namespace App\Actions\Budget;

use App\Events\Budget\BudgetCancelled;
use App\Models\BudgetRequest;
use App\Models\LogDetails;
use Illuminate\Support\Facades\DB;

class CancelBudgetAction
{
    public function execute($request)
    {
        return DB::transaction(function () use ($request) {

            $budget = BudgetRequest::where('br_id', $request->br_id)
                ->where('br_request_status', '0')
                ->first();

            if (!$budget) {
                return false;
            }

            $budget->update([
                'br_request_status' => '2',
                'br_remarks' => $request->br_remarks ?? null,
            ]);

            LogDetails::create([
                'user_id' => $request->user()->user_id,
                'transaction_details' => 'Cancelled Budget Request',
            ]);

            event(new BudgetCancelled($request));

            return true;
        });
    }
}