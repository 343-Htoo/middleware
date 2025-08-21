@extends('dashboard')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Student</h1>

   

    <div class="card">
        <div class="card-header">Update Student</div>
        <div class="card-body">
            <form action="{{ route('student.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Student Name</label>
                    <input type="text" name="name" id="name"
                           class="form-control"
                           value="{{ old('name', $student->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" id="address"
                           class="form-control"
                           value="{{ old('address', $student->address) }}" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" id="phone"
                           class="form-control"
                           value="{{ old('phone', $student->phone) }}" required>
                </div>

                <div class="mb-3">
                    <label for="class_id" class="form-label">Classroom</label>
                    <select name="class_id" id="class_id" class="form-select" required>
                        <option value="">Select Classroom</option>
                        @foreach($classrooms as $classroom)
                            <option value="{{ $classroom->id }}"
                                {{ $student->class_id == $classroom->id ? 'selected' : '' }}>
                                {{ $classroom->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update Student</button>
                <a href="{{ route('student.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
