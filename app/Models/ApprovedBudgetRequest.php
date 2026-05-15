<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApprovedBudgetRequest extends Model
{
    protected $table = 'approved_budget_requests';

    protected $fillable = [
        'abr_budget_request_id',
        'abr_approved_by',
        'abr_checked_by',
        'approved_budget_remark',
        'abr_approved_at',
        'abr_file_doc_no',
        'abr_prepared_by',
        'abr_ledgerefnum',
    ];
}