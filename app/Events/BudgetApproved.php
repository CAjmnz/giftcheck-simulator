<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BudgetApproved
{
    use Dispatchable, SerializesModels;

    public $request;

    public function __construct($request)
    {
        $this->request = $request;
    }
}