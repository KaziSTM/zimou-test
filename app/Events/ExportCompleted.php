<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;

class ExportCompleted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets;

    public string $filePath = '';

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function broadcastOn(): PrivateChannel
    {
        return new PrivateChannel('export');
    }

}
