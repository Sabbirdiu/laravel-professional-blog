<header class="header">
      <!-- Main Navbar-->
      <nav class="navbar navbar-expand-lg">
        <div class="search-area">
          <div class="search-area-inner d-flex align-items-center justify-content-center">
            <div class="close-btn"><i class="icon-close"></i></div>
            <div class="row d-flex justify-content-center">
              <div class="col-md-8">
                <form action="{{route('search')}}" method="GET">
                  <div class="form-group">
                    <input type="search" name="search" id="search" placeholder="What are you looking for?">
                    <button type="submit" class="submit"><i class="icon-search-1"></i></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <!-- Navbar Brand -->
          <div class="navbar-header d-flex align-items-center justify-content-between">
            <!-- Navbar Brand --><a href="{{route('home')}}" class="navbar-brand">Laravel Blog</a>
            <!-- Toggle Button-->
            <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span></span><span></span><span></span></button>
          </div>
          <!-- Navbar Menu -->
          <div id="navbarcollapse" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a href="{{route('home')}}" class="nav-link active ">Home</a>
              </li>
              <li class="nav-item"><a href="{{route('posts')}}" class="nav-link ">Blog</a>
              </li>
              <li class="nav-item"><a href="{{route('categories')}}" class="nav-link ">Category</a>
              </li>
              @if (Route::has('login'))
               
                    @auth
                    @if (Auth::user()->role->id == 1)
                    
                    <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link ">Dashboard</a>
                    @elseif(Auth::user()->role->id == 2)
                    <li class="nav-item"><a href="{{ route('user.dashboard') }}" class="nav-link ">Dashboard</a>
                    @else
                    null
                    @endif

                    @else
                    <li class="nav-item"><a  class="nav-link " href="{{ route('login') }}">Login</a></li>
                        

                        @if (Route::has('register'))
                           <li class="nav-item"><a  class="nav-link " href="{{ route('register') }}">Register</a></li> 
                        @endif
                    @endauth
                
                   @endif
            </ul>
            <!-- Dropdown -->
           
            <div class="navbar-text"><a href="" class="search-btn"><i class="icon-search-1"></i></a></div>
          
          </div>
        </div>
      </nav>
    </header>