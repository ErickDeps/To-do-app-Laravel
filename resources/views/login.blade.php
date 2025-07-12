@extends('layouts.auth')
@section('title', 'To do App - Login')
@section('content')
    <form action="{{route('login.post')}}" method="POST">
        @csrf 
            {{-- <img class="mb-4" src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">  --}}
            <h1 class="h3 mb-3 fw-normal">Please sing in</h1> 

            <div class="form-floating"> 
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com"> 
                <label for="floatingInput">Email address</label> 
            </div> 

            <div class="form-floating"> 
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password"> 
                <label for="floatingPassword">Password</label> 
            </div> 
            <div class="form-check text-start my-3"> 
                <input class="form-check-input" type="checkbox" name="remember" id="checkDefault"> 
                <label class="form-check-label" for="checkDefault">Remember me </label> 
            </div> 

            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3 w-100" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif 
            @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-3 w-100" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <a href="{{route('register')}}" class=" d-inline-block mt-3">Create an account</a>
            <p class="mt-5 mb-3 text-body-secondary text-center w-100 d-block">By ©Erickdeps - 2025</p> 
        </form>
@endsection