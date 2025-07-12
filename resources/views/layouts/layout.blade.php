<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>@yield('title')</title>
    <script src="https://kit.fontawesome.com/acfe7d3f67.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <header data-bs-theme="dark"> 
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"> 
            <div class="container"> 
                <a class="navbar-brand" href="{{route('index')}}">To do App</a> 
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button> 
                <div class="collapse navbar-collapse" id="navbarCollapse"> 
                    <ul class="navbar-nav me-auto mb-2 mb-md-0"> 
                        {{-- <li class="nav-item"> <a class="nav-link active" aria-current="page" href="#">Home</a> </li>  --}}
                    </ul> 
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-outline-success">Logout <i class="fa-solid fa-right-from-bracket" style="margin-left: 5px;"></i></button>
                    </form>
                </div> 
            </div> 
        </nav> 
    </header>
    
    <main class="layout__main">
        <h1>@yield('title-page')</h1>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3 w-100" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @yield('content')
    </main>
    <footer class="bg-dark text-white-50 py-3 mt-3 w-100">
        <div class="container text-center">
            <p class="mb-0">
                By @ErickDeps.
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>