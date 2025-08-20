@extends('dashboard')

@section('content')
    <div>
        <form action="" class="form-control w-75" method="post">
            @csrf
            <div class="form-group w-50">
                {{-- <label for="name"> role Name :</label> --}}
                <input type="text"  value="{{$role->name}}" class="form-control" id="name" plaseholder= "enter permession">
                 {{-- <h3>{{$role->permission->name}}</h3> --}}
                {{-- <div class="mt-3">
                    <h4>Permission all</h4>
                    <div>
                        @forelse ($role->permissions as $perm)
                        <span class="badge bg-primary">{{ $perm->name }}</span>
                        @endforelse
                    </div>
                </div> --}}
            </div>
            <button type="submit" class="mt-3 btn btn-primary">Update</button>
        </form>
    </div>
@endsection
