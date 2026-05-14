<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LedgerBudget extends Model
{
    protected $table = 'ledger_budgets';

    protected $fillable = [
        'bledger_no',
        'bledger_trid',
        'bledger_datetime',
        'bledger_type',
        'bdebit_amt',
        'bcredit_amt',
        'bledger_typeid',
        'bledger_group',
        'bledger_category',
    ];
}