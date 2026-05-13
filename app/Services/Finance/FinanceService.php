<?php

namespace App\Actions\Budget;

use App\Helpers\NumberHelper;
use App\Models\ApprovedBudgetRequest;
use App\Models\BudgetRequest;
use App\Models\LedgerBudget;
use Illuminate\Support\Facades\DB;
use App\Services\Documents\FileHandler;

class ApproveBudgetAction extends FileHandler
{
    public function __construct()
    {
        parent::__construct();
        $this->folderName = "financeUpload";
    }

    public function execute($request)
    {
        return DB::transaction(function () use ($request) {

            $ledgerNo = LedgerBudget::max('bledger_no') + 1;

            $file = $this->createFileName($request);

            $ledger = LedgerBudget::create([
                'bledger_no' => NumberHelper::leadingZero($ledgerNo, "%013d"),
                'bledger_trid' => $request->br_id,
                'bledger_datetime' => now(),
                'bledger_type' => 'RFBR',
                'bdebit_amt' => $request->br_req,
                'bledger_typeid' => $request->br_budtype,
                'bledger_group' => $request->br_group,
                'bledger_category' => $request->br_category,
            ]);

            ApprovedBudgetRequest::create([
                'abr_budget_request_id' => $request->br_id,
                'abr_approved_by' => $request->br_appby,
                'abr_checked_by' => $request->br_checkby,
                'approved_budget_remark' => $request->br_remarks,
                'abr_approved_at' => now(),
                'abr_file_doc_no' => $file ?? '',
                'abr_prepared_by' => $request->user()->user_id,
                'abr_ledgerefnum' => NumberHelper::leadingZero($ledgerNo, "%013d"),
            ]);

            BudgetRequest::where('br_id', $request->br_id)
                ->where('br_request_status', '0')
                ->update([
                    'br_request_status' => '1'
                ]);

            $this->saveFile($request, $file);

            return $ledger;
        });
    }
}