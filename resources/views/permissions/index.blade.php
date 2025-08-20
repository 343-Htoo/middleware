@extends('dashboard')

@section('content')
    <div>
        @if (Auth::user()->userType === 'admin')
            <form action="{{ route('permission.store') }}" class="form-control w-75" method="post">
                @csrf
                <div class="form-group w-50">
                    <label for="name"> Permission Name :</label>
                    <input type="text" name="name" class="form-control" id="name" plaseholder= "enter permession">
                </div>
                @can('manage-permissions')
                    <a href="{{ route('permission.store') }}" class="btn btn-primary">Add Permission</a>
                @endcan

            </form>
            {{-- table permission --}}
            <div class="table-responsive mt-5">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    @if (Auth::user()->userType === 'admin')
                                        <a href="{{ route('permission.edit', $permission->id) }}"
                                            class="btn btn-info btn-sm"></a>
                                        <a href="{{ route('permission.delete', $permission->id) }}"
                                            class="btn btn-danger btn-sm">Delete</a>
                                        <a href="{{ route('permission.view', $permission->id) }}"
                                            class="btn btn-success btn-sm">View</a>
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-warning">Login</a>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            {{-- table permission --}}
            <div class="table-responsive mt-5">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    @if (Auth::user()->userType === 'admin')
                                        <a href="{{ route('permission.edit', $permission->id) }}"
                                            class="btn btn-info btn-sm">Edit</a>
                                        <a href="{{ route('permission.delete', $permission->id) }}"
                                            class="btn btn-danger btn-sm">Delete</a>
                                        <a href="{{ route('permission.view', $permission->id) }}"
                                            class="btn btn-success btn-sm">View</a>
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-warning">Login</a>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
