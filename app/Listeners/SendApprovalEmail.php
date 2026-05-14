<?php

namespace App\Listeners;

use App\Events\Budget\BudgetApproved;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class SendApprovalEmail
{
    public function handle(BudgetApproved $event)
    {
        $req = (object) $event->request;

        $user = User::where('user_id', $req->br_id)->first();

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