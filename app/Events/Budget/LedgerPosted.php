<?php

namespace App\Events\Budget;

class LedgerPosted
{
    public $ledger;

    public function __construct($ledger)
    {
        $this->ledger = $ledger;
    }
}