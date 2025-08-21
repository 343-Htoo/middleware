<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <h3>Hello world</h3>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="">auth CRUD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    @if (Auth::user()->userType === 'admin')
                    <li class="nav-item">
                        <a href="nav-link">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('permission.index')}}">Permisssion</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{route('role.index')}}">Roles</a>

                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{route('user.index')}}">User</a>
                    </li>
                    @else

                     @if(Auth::user()->userType === 'teacher')
                     <li class="nav-item">
                        <a href="{{route('student.index')}}" class="nav-link">Add Student</a>
                     </li>
                     <li>
                        <a class="nav-link" href="{{route('class.index')}}" >Add Class</a>
                     </li>
                     @endif
                       <li>Hello world</li>

                    @endif
                </ul>
            </div>
        </div>
    </nav>

     <div class="container content-wrapper">
        @yield('content')
    </div>
</x-app-layout>
