@include('Userlayout.link')
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
      <li class="nav-item active scrollto active">
        <a class="nav-link" href="#">Employees</a>
      </li>
      <li class="nav-item active scrollto active">
        <a class="nav-link" href="{{url('/companiesform')}}">Companies</a>
      </li>
      
    </ul>
    <ul class="navbar-nav ms-auto">
    <li class="nav-item">
          <i class="fa fa-sign-out ml-3 text-light fa-fw mr-4"></i>
                <a class="text-light" href="{{ route('logout') }}"   onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
           
           </li>
                    </ul>    
      
</nav>