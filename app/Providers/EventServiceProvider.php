<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use App\Events\Budget\BudgetApproved;
use App\Events\Budget\BudgetRequested;
use App\Events\Budget\BudgetCancelled;
use App\Events\Budget\LedgerPosted;

use App\Listeners\PostLedgerEntry;
use App\Listeners\GenerateApprovalPdf;
use App\Listeners\LogFinanceActivity;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        BudgetApproved::class => [
            PostLedgerEntry::class,
            GenerateApprovalPdf::class,
            LogFinanceActivity::class,
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
    ];
}