@extends('dashboard')

@section('content')
    <div>

        <div class="container rounded shadow-lg w-50">

            <h6 class="text-info mb-4 ">User Name :{{ $user->name }}</h6>
            <h6 class="text-info mb-4 ">User Email :{{ $user->email }}</h6>
            <h6 class="text-info mb-4 ">User Role :{{ $user->role->name }}</h6>
            {{-- <td>
                @if ($user->role && $user->role->permissions->count())
                    @foreach ($user->role->permissions as $perm)
                        <span class="badge bg-primary">{{ $perm->name }}</span>
                    @endforeach
                @else
                    <span class="text-muted">No Permissions</span>
                @endif
            </td> --}}
            <a href="{{ route('user.index') }}">
                <button class="btn btn-primary mb-3">Back</button>
            </a>
        </div>

    </div>
@endsection
