<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light px-5">
            <a class="navbar-brand" href="/">Car wash facility</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active mx-3">
                  <a class="nav-link" href="{{route('home')}}">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item mx-3">
                  <a class="nav-link" href="{{route('readme')}}">Readme</a>
                </li>
                @auth
                  <li class="nav-item mx-3">
                    <a id="dashboardLink" class="nav-link btn btn-outline-primary onHoverWhite" href="{{route('dashboard.show')}}">
                      {{auth()->user()->role->name == "client" ? "User dashboard" : "Admin Dashboard"}}
                      <span class="sr-only">(current)</span>
                    </a>
                  </li>
                @endauth
              </ul>
              <div class="my-2 my-lg-0">
                @if (Route::has('login'))
                  @auth
                    <span class="mr-3">
                      Hi, {{ auth()->user()->username }}!
                    </span>

                    <form id="logOutForm" action="{{ route('logout') }}" method="POST" hidden>
                      @csrf
                    </form>

                    <a class="btn btn-primary btn-md"
                    onclick="
                    event.preventDefault()
                    submitForm('logOutForm')
                    ">Log out</a>
                  @else
                    <a href="{{ route('login') }}" class="btn btn-primary btn-md btn-rounded">
                      Login
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-md btn-rounded">
                      Register
                    </a>
                  @endauth
                @endif
              </div>
            </div>
          </nav>
    </header>
