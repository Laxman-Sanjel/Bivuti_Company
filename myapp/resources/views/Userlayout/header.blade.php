<nav class="navbar navbar-expand-lg py-0 navbar-dark bg-success scrollto active">
<img loading="lazy" src="{{ asset('Image/image.png')}}" alt="..." width="60" height="60" class="mr-3 rounded-circle img-thumbnail shadow-sm">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active scrollto active">
        <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Facilities</a>
      </li>
    </ul>
    @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-lg text-gray-700 dark:text-gray-500 underline">AdminDashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-lg text-danger-700 dark:text-gray-500 underline text-light">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline text-light">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

                    
                </div>
            </div>
</nav>