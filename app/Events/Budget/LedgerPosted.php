<?php

namespace App\Events\Budget;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LedgerPosted
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public array $data = []
    ) {}
}