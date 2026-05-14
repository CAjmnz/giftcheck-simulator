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
use App\Listeners\SendApprovalEmail;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [

        \App\Events\Budget\BudgetApproved::class => [
            \App\Listeners\PostLedgerEntry::class,
            \App\Listeners\GenerateApprovalPdf::class,
            \App\Listeners\SendApprovalEmail::class,
            \App\Listeners\LogFinanceActivity::class,
        ],
    
        \App\Events\Budget\BudgetRequested::class => [
            \App\Listeners\LogFinanceActivity::class,
        ],
    
        \App\Events\Budget\BudgetCancelled::class => [
            \App\Listeners\LogFinanceActivity::class,
        ],
    
        \App\Events\Budget\LedgerPosted::class => [
            \App\Listeners\LogFinanceActivity::class,
        ],
    ];
}