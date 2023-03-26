<?php

namespace App\Http\Controllers\Dashboard\Catalogue;

use App\Actions\Store\StoreDeviceAction;
use App\Actions\Update\UpdateDeviceAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Store\StoreDeviceRequest;
use App\Http\Requests\Update\UpdateDeviceRequest;
use App\Models\Brands;
use App\Models\Device;
use App\Models\User;
use Illuminate\View\View;

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
        $customers = User::userQuery()->get();
        $brands = Brands::all();

        return view('pages.dashboard.catalogue.devices.create', compact('customers', 'brands'));
    }

    public function store(StoreDeviceRequest $request, StoreDeviceAction $action)
    {
        $action->execute($request);

        return redirect()
            ->route('dashboard.catalogue.devices.index')
            ->withSuccess(__('New device added successfully'));
    }

    public function show($id): View
    {
        $device = Device::findOrFail($id);
        return view('pages.dashboard.catalogue.devices.show', compact('device'));
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
