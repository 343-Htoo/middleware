@extends('dashboard')

@section('content')
<div class="container">
    <h1 class="mb-4">Student Details</h1>

    <div class="card">
        <div class="card-header">Details for {{ $student->name }}</div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $student->name }}</p>
            <p><strong>Address:</strong> {{ $student->address }}</p>
            <p><strong>Phone:</strong> {{ $student->phone }}</p>
            <p><strong>Classroom:</strong> {{ $student->classroom->name ?? '-' }}</p>

            <a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('student.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
