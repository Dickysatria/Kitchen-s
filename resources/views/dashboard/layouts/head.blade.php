<header class="navbar navbar-warning sticky-top bg-warning flex-md-nowrap p-0">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 text-light">Dasboard</a>
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
    <div class="container">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav nav col-lg-auto mb-2 justify-content-left mb-md-0">
            <li class="nav-item">
                <a class="nav-link " aria-current="page"
                href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " aria-current="page"
                href="/categories">Categories</a>
              </li>
            </ul>
        <form action="/logout" method="post">
          @csrf
          <button type="submit" class="nav-link px-3 bg-warning border-0 text-light">
              Logout<span data-feather="log-out"></span></button>
      </form>
    </div>
    </div>
    </nav>
  </header>
