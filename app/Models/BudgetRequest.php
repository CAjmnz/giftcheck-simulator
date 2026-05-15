<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BudgetRequest extends Model
{
    protected $table = 'budget_requests';

    protected $fillable = [
        'br_id',
        'br_req',
        'br_budtype',
        'br_group',
        'br_request_status',
    ];
}