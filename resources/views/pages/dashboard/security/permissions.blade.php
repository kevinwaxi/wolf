@extends('layouts.dashboard')
@section('content')
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Permissions</th>
                    <th>Role Count</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td></td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->roles_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
