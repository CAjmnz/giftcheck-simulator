<?php

namespace App\Domain\Budget;

class BudgetRules
{
    public static function canApprove($budget)
    {
        return $budget->br_request_status === '0';
    }

    public static function canCancel($budget)
    {
        return $budget->br_request_status === '0';
    }

    public static function requiresPreApproval($request)
    {
        return $request->br_group === '1';
    }
}