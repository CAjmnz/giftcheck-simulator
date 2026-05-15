<?php

namespace App\Listeners;

use App\Events\Budget\BudgetApproved;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class SendApprovalEmail
{
    public function handle(BudgetApproved $event)
    {
        $req  = $event->request;

        // ✅ get authenticated user, not by br_id
        $user = User::where('id', optional($req->user())->id)->first();

        if (!$user) return;

        Mail::raw(
            "Your budget request #{$req->br_id} has been approved.",
            function ($message) use ($user) {
                $message->to($user->email ?? 'test@example.com')
                    ->subject('Budget Approved');
            }
        );
    }
}