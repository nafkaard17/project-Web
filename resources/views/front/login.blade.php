@extends('template.front.layout')
@section('content')
    <div class="container" style="margin-bottom:100px; margin-top:100px;">
        @if (\Session::has('danger'))
            <div class="mb-5 mx-auto alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{!! \Session::get('danger') !!}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (\Session::has('success'))
            <div class="mb-5 mx-auto alert alert-success alert-dismissible fade show" role="alert">
                <strong>{!! \Session::get('success') !!}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="mx-auto container-login shadow-lg rounded-5" style="padding:50px;">
            <form class="w-75 mx-auto" method="POST" action="{{url('/login')}}">
                <div class="mb-3">
                    <h1 class="text-center fw-bolder">Sign in</h1>
                    <hr class="my-4">
                </div>
                @csrf
                <div class="form-floating mb-3">
                    <input name="email" value="{{ old('email') }}" type="email" class="form-control" id="email" aria-describedby="emailHelp" required autofocus>
                    <label for="email" class="form-label">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="password" type="password" class="form-control" id="password" required>
                    <label for="password" class="form-label">Password</label>
                </div>
                <div class="mb-3">
                    Belum punya akun? <a class="text-decoration-none" href="{{url('/register')}}">Register</a>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Login</button>
            </form>
        </div>
    </div>

@endsection
