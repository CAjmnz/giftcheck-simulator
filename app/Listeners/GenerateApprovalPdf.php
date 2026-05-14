<?php

namespace App\Listeners;

use App\Events\Budget\BudgetApproved;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\BudgetRequest;
use App\Models\User;
use App\Helpers\NumberHelper;

class GenerateApprovalPdf
{
    public function handle(BudgetApproved $event)
    {
        $req = (object) $event->request;

        $budget = BudgetRequest::where('br_id', $req->br_id)->first();

        if (!$budget) return;

        $preparedBy = User::where('user_id', $budget->br_requested_by)
            ->value('firstname') . ' ' .
            User::where('user_id', $budget->br_requested_by)
            ->value('lastname');

        $checkedBy = User::where('user_id', $budget->br_checked_by)
            ->value('firstname') . ' ' .
            User::where('user_id', $budget->br_checked_by)
            ->value('lastname');

        $data = [
            'pr' => $budget->br_no,
            'budgetRequested' => $budget->br_request,
            'dateRequested' => now()->toFormattedDateString(),
            'preparedBy' => $preparedBy,
            'checkedBy' => $checkedBy,
            'approvedBy' => $req->user->full_name ?? 'SYSTEM',
        ];

        $pdf = Pdf::loadView('pdf.giftcheck', compact('data'));

        return $pdf->output();
    }
}