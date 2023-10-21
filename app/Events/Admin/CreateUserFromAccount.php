<?php

namespace App\Events\Admin;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Account; // Import model Account

class CreateUserFromAccount
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $account; // Thêm thuộc tính account

    /**
     * Create a new event instance.
     */
    public function __construct(Account $account) // Truyền tham số $account vào constructor
    {
        $this->account = $account; // Gán giá trị cho thuộc tính account
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}