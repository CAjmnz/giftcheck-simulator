<?php

namespace App\Domain\Adjustment;

class AdjustmentRules
{
    public static function canApprove($adj)
    {
        return $adj->adj_request_status === '0';
    }

    public static function canCancel($adj)
    {
        return $adj->adj_request_status === '0';
    }

    public static function isNegativeAllowed($amount, $currentBudget)
    {
        return $amount <= $currentBudget;
    }
}