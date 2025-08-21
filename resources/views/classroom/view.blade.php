@extends('dashboard')

@section('content')
<div class="container">
    <h1 class="mb-4">Classroom Details</h1>

    <div class="card">
        <div class="card-header">
            Classroom #{{ $classroom->id }}
        </div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $classroom->name }}</p>
            <p><strong>Created At:</strong> {{ $classroom->created_at->format('Y-m-d H:i') }}</p>
            <p><strong>Updated At:</strong> {{ $classroom->updated_at->format('Y-m-d H:i') }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('class.index') }}" class="btn btn-secondary">Back to List</a>
            <a href="{{ route('class.edit', $classroom->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('class.delete', $classroom->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete this classroom?')">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
