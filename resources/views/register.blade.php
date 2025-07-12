@extends('layouts.auth')
@section('title', 'To do App - Register')
@section('content')
    <form action="{{route('register.post')}}" method="POST">
        @csrf 
            {{-- <img class="mb-4" src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">  --}}
            <h1 class="h3 mb-3 fw-normal">Please sign up</h1> 

            <div class="form-floating"> 
                <input type="name" name="name" class="form-control" id="floatingName" placeholder="John Doe"> 
                <label for="floatingName">Name</label> 
            </div> 

            <div class="form-floating"> 
                <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="name@example.com"> 
                <label for="floatingEmail">Email address</label> 
            </div> 

            <div class="form-floating"> 
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password"> 
                <label for="floatingPassword">Password</label> 
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
            @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <a href="{{route('login')}}" class=" d-inline-block mt-3">Do you have an account? Login</a> 
            <p class="mt-5 mb-3 text-body-secondary text-center w-100 d-block">By ©Erickdeps - 2025</p> 
        </form>
@endsection