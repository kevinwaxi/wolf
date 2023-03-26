@extends('layouts.dashboard')
@section('content')
    <div class="col-lg-12">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create device</h1>
            </div>
            <form method="post" action="{{ route('dashboard.catalogue.devices.store') }}">
                @method('post')
                @csrf
                <fieldset class="form-group">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <select class="form-select @error('customer') is-invalid @enderror" aria-label=".form-select-sm "
                            name="customer_id">
                            <option selected disabled>Open this select menu</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>
                        @error('customer')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </fieldset>

                <fieldset class="form-group">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <select class="form-select @error('brand') is-invalid @enderror" aria-label=".form-select-sm "
                            name="brand_id">
                            <option selected disabled>Open this select menu</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                        @error('brand')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </fieldset>
                <div class="form-group">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            placeholder="name" value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <input type="text" name="model_number"
                            class="form-control @error('model_number') is-invalid @enderror" placeholder="Model Numberf"
                            value="{{ old('model_number') }}" autofocus>
                        @error('model_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <input type="text" name="serial_number"
                            class="form-control @error('serial_number') is-invalid @enderror" placeholder="Serial Number"
                            value="{{ old('serial_number') }}" autofocus>
                        @error('serial_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn w-100 btn-success my-4 mb-2">{{ __('Create Device') }}</button>
                <a href="{{ route('dashboard.catalogue.devices.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>
    </div>
@endsection
