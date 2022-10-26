<nav class="navbar navbar-expand-md navbar-light shadow-sm " style="background:teal">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    @if(!Auth::user())

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item ">
                                <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif                            
                        @endguest

                    @else
                        <!-- Left Side Of Navbar -->

                      <a class="nav-item nav-link active text-white" href="{{url('/')}}">Home </a>
                    
                      <a class="nav-item nav-link text-white" href="{{url('admin/panel')}}">Admin</a>
                      <a class="nav-item nav-link text-white" href="{{url('category')}}">Category </a>
                      <a class="nav-item nav-link text-white" href="{{url('brand')}}"> Brands </a>
                      <a class="nav-item nav-link text-white" href="{{url('product')}}">Products</a>
                      <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item bg-primary text-white" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                    </ul>
                    @endif
                </div>
            </div>
        </nav>