<?php

namespace App\Http\Controllers\Dashboard\Catalogue;

use App\Actions\Store\StoreIssueAction;
use App\Http\Requests\Store\StoreIssueRequest;
use App\Models\Device;
use App\Http\Controllers\Controller;

class IssueController extends Controller
{
    public function index()
    {
        //code ...
    }

    public function create(Device $device)
    {
        $device = Device::find($device->id);

        return view('pages.dashboard.catalogue.issues.create', compact('device'));
    }

    public function store(StoreIssueRequest $request, Device $device, StoreIssueAction $action)
    {
        $action->execute($request, $device);

        return redirect()
            ->route('dashboard.catalogue.devices.index')
            ->withSuccess(__('User created successfully.'));
    }
}
