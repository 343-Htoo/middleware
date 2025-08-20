@extends('dashboard')

@section('content')
    <div>

            <div class="container rounded shadow-lg w-50">
                <h3>Permission Name</h3>
                <h6 class="text-info mb-4 ">{{$permission->name}}</h6>
                 <a href="{{route('permission.index')}}">
                <button class="btn btn-primary mb-3">Back</button>
                 </a>
            </div>

    </div>
@endsection
