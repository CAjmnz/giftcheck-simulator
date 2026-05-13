<?php

namespace App\Listeners;

use App\Events\BudgetApproved;
use Barryvdh\DomPDF\Facade\Pdf;

class GenerateApprovalPdf
{
    public function handle(BudgetApproved $event): void
    {
        $request = $event->request;

        $pdf = Pdf::loadView('pdf.giftcheck', [
            'request' => $request
        ]);

        // Example save
        $path = storage_path('app/public/pdfs');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $pdf->save($path . '/budget-' . $request->br_id . '.pdf');
    }
}