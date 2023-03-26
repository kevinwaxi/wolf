<?php

namespace App\Actions\Store;

use App\Models\Device;

class StoreDeviceAction
{
    public function execute($request)
    {
        Device::create([
            'customer_id' => $request->customer_id,
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'model_number' => $request->model_number,
            'serial_number' => $request->serial_number,
        ]);
    }
}
