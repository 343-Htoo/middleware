@extends('dashboard')

@section('content')
    <div>
       <form action="{{route('user.update' , $user->id)}}" method="post" class="form-control w-75">
        @csrf
        <div class="form-group w-50">
            <div class="mt-3">
                <label for="name">User Name:</label>
                <input type="text" name="name" value="{{$user->name}}"  class="form-control" id="name" placeholder="Enter name" required>
            </div>

            <div class="mt-3">
                <label for="email">Email:</label>
                <input type="email" name="email" value="{{$user->email}}" class="form-control" id="email" placeholder="Enter email" required>
            </div>

            <div class="mt-3">
                <label for="role_id">Role:</label>
                <input type="role" name="role" value="{{$user->role->name}}" class="form-control" id="role" placeholder="Enter email" required>
            </div>
        </div>

        <button type="submit" class="mt-3 btn btn-primary">Update</button>
    </form>
    </div>
@endsection
