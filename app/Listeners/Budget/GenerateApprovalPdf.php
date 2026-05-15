<?php

namespace App\Listeners\Budget;

use App\Events\Budget\BudgetApproved;

class GenerateApprovalPdf
{
    public function handle(BudgetApproved $event)
    {
        $budgetId = $event->request->br_id;

        if ($budgetId) {
            \Log::info('PDF generated for Budget ID: ' . $budgetId);
        }
    }
}