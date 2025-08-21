@extends('dashboard')

@section('content')
<div class="container">
    <h1 class="mb-4">Students</h1>
    <div class="row">
        {{-- Create Form --}}
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">Add New Student</div>
                <div class="card-body">
                    <form action="{{ route('student.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Student Name</label>
                            <input type="text" name="name" id="name"
                                   class="form-control" required>

                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" id="address"
                                   class="form-control"
                                  required>

                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" name="phone" id="phone"
                                   class="form-control"
                                    required>

                        </div>

                        <div class="mb-3">
                            <label for="class_id" class="form-label">Classroom</label>
                            <select name="class_id" id="class_id"
                                    class="form-select @error('class_id') is-invalid @enderror" required>
                                <option value="">Select Classroom</option>
                                @foreach($classrooms as $classroom)
                                    <option value="{{ $classroom->id }}"
                                        {{ old('class_id') == $classroom->id ? 'selected' : '' }}>
                                        {{ $classroom->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('class_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Add Student</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Student Table --}}
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Student List</div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Classroom</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->address }}</td>
                                    <td>{{ $student->phone }}</td>
                                    <td>{{ $student->classroom->name ?? '-' }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('student.show', $student->id) }}" class="btn btn-sm btn-info">View</a>
                                        <a href="{{ route('student.edit', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('student.destroy', $student->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this student?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No students found.</td>
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
