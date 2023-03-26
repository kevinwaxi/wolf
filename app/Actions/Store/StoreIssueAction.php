<?php

namespace App\Actions\Store;

use App\Enums\StatusEnum;
use App\Models\Issue;

class StoreIssueAction
{
    public function execute($request, $device)
    {
        Issue::create([
            'device_id' => $device->id,
            'date' => now(),
            'description' => $request->description,
            'isUrgent' => $request->isUrgent,
            'pricing' => $request->pricing,
            'status' => StatusEnum::INPROGRESS,
            'status_log' => 'none'
        ]);
    }
}
