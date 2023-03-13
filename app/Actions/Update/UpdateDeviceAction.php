<?php

namespace App\Actions\Update;

class UpdateDeviceAction
{
    public function execute($request, $device)
    {
        $device->update([
            'customer_id' => $request->customer_id,
            'name' => $request->name,
            'brand' => $request->brand,
            'model_number' => $request->model_number,
            'serial_number' => $request->serial_number,
        ]);
    }
}
