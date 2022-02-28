<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Kitchen's | {{ $title}}</title>

        {{-- ------------boostrap ---------icon---------------}}
   <link rel="stylesheet" href="https://cdn.jsdelivdr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

     {{-- My CSS --}}
     <link rel="stylesheet" href="/css/footers.css">


</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
            <div class="container">
             <a class="navbar-brand" ><h3>Kitchen's</h3></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li class="nav-item">
                <a class="nav-link {{($active === "home") ? 'active' : '' }}" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{($active === "categories") ? 'active' : '' }}" aria-current="page" href="/categories">Categories</a>
            </li>
            </ul>

            <ul class="navbar-nav ms-auto">
            @auth
            <div class="flex-shrink-0 dropdown">
              <a class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                {{ auth()->user()->username }}
              </a>
              <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                <li><a class="dropdown-item" href="/dashboard">My Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item">Logout</button>
                </form>
                </li>
              </ul>
            </div>
            @else
                <a href="/login" class="nav-link {{($active === "Login") ? 'active' : '' }}">Login</a>
                <a href="/signup" class="nav-link {{($active === "SignUp") ? 'active' : '' }}">Sign-up</a>
            @endauth
            </ul>
        </div>
    </div>
      </nav>
      <div class="container mt-4">
        @yield('container')
    </div>
</html>
