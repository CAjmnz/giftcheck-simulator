<?php

namespace App\Domain\Budget;

use App\Models\LedgerBudget;

class BudgetPolicy
{
    public static function canApprove($request): bool
    {

        if ($request->br_request <= 0) {
            return false;
        }

        return true;
    }

    public static function hasEnoughBudget($amount): bool
    {
        $current = LedgerBudget::sum('bdebit_amt') - LedgerBudget::sum('bcredit_amt');

        return $amount <= $current;
    }
}