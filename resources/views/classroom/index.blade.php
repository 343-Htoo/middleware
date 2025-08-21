@extends('dashboard')

@section('content')
<div class="container">

    <div class="row">
        {{-- Create Form --}}
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">Add New Classroom</div>
                <div class="card-body">
                    <form action="{{ route('class.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Classroom Name</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Add Classroom</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Classroom Table --}}
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Classroom List</div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Created At</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($classrooms as $classroom)
                                <tr>
                                    <td>{{ $classroom->id }}</td>
                                    <td>{{ $classroom->name }}</td>
                                    <td>{{ $classroom->created_at->format('Y-m-d') }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('class.show', $classroom->id) }}" class="btn btn-sm btn-info">View</a>
                                        <a href="{{ route('class.edit', $classroom->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('class.delete', $classroom->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this classroom?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No classrooms found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
