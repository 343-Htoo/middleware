@extends('dashboard')

@section('content')
    <div>

        @if (Auth::user()->userType === 'admin')

        <form action="{{ route('role.store') }}" method="POST" class="form-control w-75">
            @csrf

            {{-- Role Name --}}
            <div class="form-group w-50">
                <label for="name">Role Name :</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter role name">
            </div>

            {{-- Permissions --}}
            <div class="mt-3">
                <label for="permission">Select Permissions</label>
                <div class="d-flex flex-wrap">
                    @foreach ($permissions as $permission)
                        <div class="form-check me-3">
                            <input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                                class="form-check-input" id="perm_{{ $permission->id }}">
                            <label class="form-check-label" for="perm_{{ $permission->id }}">
                                {{ $permission->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Add</button>
        </form>

          {{-- table permission --}}
        <div class="table-responsive mt-5">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Permission</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                @forelse ($role->permissions as $perm)
                                    <span class="badge bg-primary">{{ $perm->name }}</span>
                                @empty
                                    <span class="text-muted">No Permissions</span>
                                @endforelse
                            </td>
                            <td>
                                @if (Auth::user()->userType === 'admin')
                                <a href="{{route('role.edit' , $role->id)}}" class="btn btn-info btn-sm">Edit</a>
                                <a href="" class="btn btn-danger btn-sm">Delete</a>
                                <a href="" class="btn btn-success btn-sm">View</a>
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
                        <th>Permission</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                @forelse ($role->permissions as $perm)
                                    <span class="badge bg-primary">{{ $perm->name }}</span>
                                @empty
                                    <span class="text-muted">No Permissions</span>
                                @endforelse
                            </td>
                            <td>
                                @if (Auth::user()->userType === 'admin')
                                <a href="{{route('role.edit' , $role->id)}}" class="btn btn-info btn-sm">Edit</a>
                                <a href="" class="btn btn-danger btn-sm">Delete</a>
                                <a href="" class="btn btn-success btn-sm">View</a>
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
