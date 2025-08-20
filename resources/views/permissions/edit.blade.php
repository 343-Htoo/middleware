@extends('dashboard')

@section('content')
    <div>
        <form action="{{ route('permission.update' , $permission->id) }}" class="form-control w-75" method="post">
            @csrf
            <div class="form-group w-50">
                <label for="name"> Permission Name :</label>
                <input type="text" name="name" value="{{$permission->name}}" class="form-control" id="name" plaseholder= "enter permession">
            </div>
            <button type="submit" class="mt-3 btn btn-primary">Update</button>
        </form>
    </div>
@endsection
