<?php

namespace App\Http\Controllers\Dashboard\Catalogue;

use App\Actions\Store\StoreDeviceAction;
use App\Actions\Update\UpdateDeviceAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Store\StoreDeviceRequest;
use App\Http\Requests\Update\UpdateDeviceRequest;
use App\Models\Device;
use App\Models\User;

class DeviceController extends Controller
{
    public function index()
    {
        // code...
        $perPage = request()->input('perPage') ?: 10;
        $devices = Device::deviceQuery()->paginate($perPage);

        return view('pages.dashboard.catalogue.devices.device_list', compact('devices'));
    }

    public function create()
    {
        $users = User::userQuery()->get();

        return view('pages.dashboard.catalogue.devices.create');
    }

    public function store(StoreDeviceRequest $request, StoreDeviceAction $action)
    {
        $action->execute($request);

        return redirect()
            ->route('dashboard.catalogue.devices.index')
            ->withSuccess(__('New device added successfully'));
    }

    public function edit(Device $device)
    {
        return view('pages.dashboard.catalogue.devices.edit', compact('device'));
    }

    public function update(UpdateDeviceRequest $request, Device $device, UpdateDeviceAction $action)
    {
        $action->execute($request, $device);

        return redirect()
            ->route('dashboard.catalogue.devices.index')
            ->withSuccess(__('Device information updated'));
    }

    public function destory(Device $device)
    {
        $device->delete();
    }
}
