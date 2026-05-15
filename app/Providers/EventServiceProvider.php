<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use App\Events\Budget\BudgetApproved;
use App\Events\Budget\BudgetRequested;
use App\Events\Budget\BudgetCancelled;
use App\Events\Budget\LedgerPosted;
use App\Events\Adjustment\AdjustmentApproved;
use App\Events\Adjustment\AdjustmentCancelled;

use App\Listeners\Budget\PostLedgerEntry;
use App\Listeners\Budget\GenerateApprovalPdf;
use App\Listeners\Budget\LogFinanceActivity;
use App\Listeners\Adjustment\LogAdjustmentActivity;
use App\Listeners\Adjustment\PostAdjustmentLedger;
use App\Listeners\SendApprovalEmail;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        BudgetApproved::class => [
            PostLedgerEntry::class,
            GenerateApprovalPdf::class,
            LogFinanceActivity::class,
            SendApprovalEmail::class,
        ],
        BudgetRequested::class => [
            LogFinanceActivity::class,
        ],
        BudgetCancelled::class => [
            LogFinanceActivity::class,
        ],
        LedgerPosted::class => [
            LogFinanceActivity::class,
        ],
        AdjustmentApproved::class => [
            LogAdjustmentActivity::class,
            PostAdjustmentLedger::class,
        ],
        AdjustmentCancelled::class => [
            LogAdjustmentActivity::class,
        ],
    ];
}