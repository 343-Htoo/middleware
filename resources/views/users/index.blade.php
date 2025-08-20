<!-- resources/views/users/create.blade.php -->
@extends('dashboard')

@section('content')
    <div class="container mt-5">
         @if (Auth::user()->userType === 'admin')
        <div class="card shadow rounded-3">
            <div class="card-header bg-primary text-white">
                <h4>Create User</h4>
            </div>

            <div class="card-body">

                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Enter full name" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="Enter email" required>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Enter password" required>
                        </div>

                        <!-- Role -->
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" id="role" class="form-select" required>
                                <option value="">Select a role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Submit -->
                        <button type="submit" class="btn btn-primary w-100">Create User</button>
                    </form>
                    <div class="table-responsive mt-5">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Permission</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->role->name }}</td>
                                    <td>
                                        @if ($data->role && $data->role->permissions->count())
                                            @foreach ($data->role->permissions as $perm)
                                                <span class="badge bg-primary">{{ $perm->name }}</span>
                                            @endforeach
                                        @else
                                            <span class="text-muted">No Permissions</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if (Auth::user()->userType === 'admin')
                                            <a href="{{ route('user.edit', $data->id) }}"
                                                class="btn btn-info btn-sm">Edit</a>
                                            <a href="{{ route('user.delete', $data->id) }}"
                                                class="btn btn-danger btn-sm">Delete</a>
                                        @else
                                            <a href="{{ route('user.view', $data->id) }}"
                                                class="btn btn-success btn-sm">View</a>
                                            <a href="{{ route('login') }}" class="btn btn-warning">Login</a>
                                        @endif




                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
                @else

                <div class="table-responsive mt-5">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Permission</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->role->name }}</td>
                                    <td>
                                        @if ($data->role && $data->role->permissions->count())
                                            @foreach ($data->role->permissions as $perm)
                                                <span class="badge bg-primary">{{ $perm->name }}</span>
                                            @endforeach
                                        @else
                                            <span class="text-muted">No Permissions</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if (Auth::user()->userType === 'admin')
                                            <a href="{{ route('user.edit', $data->id) }}"
                                                class="btn btn-info btn-sm">Edit</a>
                                            <a href="{{ route('user.delete', $data->id) }}"
                                                class="btn btn-danger btn-sm">Delete</a>
                                        @else
                                            <a href="{{ route('user.view', $data->id) }}"
                                                class="btn btn-success btn-sm">View</a>
                                            <a href="{{ route('login') }}" class="btn btn-warning">Login</a>
                                        @endif




                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        @endif
    </div>
@endsection
