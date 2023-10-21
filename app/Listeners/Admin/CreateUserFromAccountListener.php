<?php

namespace App\Listeners\Admin;

use App\Events\Admin\CreateUserFromAccount;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateUserFromAccountListener
{
    public function __construct()
    {
        //
    }

    public function handle(CreateUserFromAccount $event)
    {
        $account = $event->account;

        $user = new User;
        $user->firstname = $account->firstname;
        $user->lastname = $account->lastname;
        $user->save();
    }
    
}