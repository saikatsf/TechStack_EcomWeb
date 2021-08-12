@php
use App\Models\cart;
use App\Models\category;

$cartCount = cart::where('userid',session('userid'))->count();
$categories = category::all();

@endphp



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="{{ URL::asset('css/layout.css') }}">

<script src="https://kit.fontawesome.com/06be0bfffe.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="{{ URL::asset('js/layout.js') }}"></script>

<body>
    <div class="wrapper">
        <div id="navs">
            {{-- first navbar --}}
            <nav id="navbar_top" class="navbar navbar-dark navbar-expand-lg py-1">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/"><h2>TechStack</h2></a>
                    <div class="m-2">
                        <form class="m-auto">
                            <div class="input-group">
                                <select id="select_category" class="searchCategory">
                                    <option selected>All Categories</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <input type="text" class="form-control" type="search" placeholder="Search" aria-label="Search">
                                <button class="input-group-text searchBtn"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                    

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mb-5 mb-lg-0 ms-auto">
                            <li class="nav-item me-4">
                                <div class="nav-link active" style="cursor:pointer" aria-current="page">
                                    @if (session('user'))
                                        <div class="dropdown ">
                                            <a class="dropdown-toggle text-light" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-user-circle"></i>
                                                Hello {{ strtok(session('user'), " ")}}
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="/profile">Your Profile</a></li>
                                                <li><a class="dropdown-item" href="/UlogOut">Log Out</a></li>
                                            </ul>
                                        </div>
                                    @else
                                        <div data-bs-toggle="modal" data-bs-target="#loginModal">
                                            <i class="fas fa-user-circle"></i>
                                            Sign in
                                        </div>
                                    @endif
                                </div>
                            </li>

                            <li class="nav-item me-4">
                                <a class="nav-link active" href="#">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Your Orders
                                </a>
                            </li>
                            
                            <li class="nav-item me-2">
                                <a class="nav-link active" href="/mycart">
                                    <i class="fas fa-shopping-cart"></i>
                                    Cart 
                                    @if ($cartCount != NULL)
                                        ({{$cartCount}})  
                                    @endif 
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            {{-- second navbar --}}
            <nav id="second_nav" class="p-2">
                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Menu</span>
                </button>
                <button class="btn btn-dark">Shop By Categories</button>
                <button class="btn btn-dark">Shop By Brand</button>
            </nav>
        </div>


        <!-- Sidebar  -->
        <nav id="sidebar">
            <div id="dismiss">
                <i class="fas fa-arrow-left"></i>
            </div>

            <div class="sidebar-header" style="cursor: pointer">
                @if (session('user'))
                    <i class="fas fa-user-circle"></i>
                    Hello {{ strtok(session('user'), " ")}}
                @else
                    <div data-bs-toggle="modal" data-bs-target="#loginModal">
                        <i class="fas fa-user-circle"></i>
                        Sign in
                    </div>
                @endif
            </div>
            <div class="sidebar-body pt-1">
                <ul class="list-unstyled ps-2">
                    <h6>Categories</h6>
                    @foreach ($categories as $category)
                    <li><a href="/products/{{$category->id}}">{{$category->name}}</a></li>
                    @endforeach
                </ul>
                <ul class="list-unstyled ps-2">
                    <h6>Help & Settings</h6>
                    <li><a href="#">Customer Service</a></li>
                    @if (session('user'))
                        <li><a href="#">Your Profile</a></li>
                        <li><a href="#">Invite a Friend</a></li>
                        <li><a href="/UlogOut">SignOut</a></li>
                    @endif
                </ul>
            </div>
        </nav>

        <!-- Modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body row p-0">
                        <div class="col bg-dark text-light text-center row">
                            <div class="align-self-center">
                                <h5>Welcome to TechStack</h5><br>
                                Making your life Easier.
                            </div>
                        </div>
                        <div class="col">
                            <div class="float-end">
                                <button type="button" class="btn-close m-2" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="p-5">
                                {{-- login form --}}
                                <form class="form-inline container-fluid" method="POST" action="/loginUser">
                                    @csrf

                                    @if(session()->get('loginmessage'))
                                    <p class="alert alert-danger mt-1">{{ session()->get('loginmessage') }}</p>
                                    @endif

                                    <div class="form-group">
                                        <a href="Ulogin/google" class="btn btn-danger form-control text-center m-1"><i class="fab fa-google me-2"></i>Login Using Google</a>
                                        <a href="Ulogin/facebook" class="btn btn-primary form-control text-center m-1"><i class="fab fa-facebook me-2"></i>Login Using Facebook</a>       
                                    </div>
                                
                                    <p class="text-center m-2">-- OR --</p>
                                    
                                    <div class="form-group m-1">
                                    <label for="loginemail">Email address:</label>
                                    <input type="email" class="form-control" name="uEmailLogin" id="loginemail">
                                    @error('uEmailLogin')
                                        <p class="alert alert-danger mt-1">{{$message}}</p>
                                    @enderror
                                    </div>
                                    <div class="form-group m-1">
                                    <label for="loginpwd">Password:</label>
                                    <input type="password" class="form-control" name="uPasswordLogin" id="loginpwd">
                                    @error('uPasswordLogin')
                                        <p class="alert alert-danger mt-1">{{$message}}</p>
                                    @enderror
                                    </div>
                                    <div class="float-end pb-3">
                                        <a href="forgotPasswordPage">Forgot Password ?</a>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary m-2">Log In</button>
                                    </div>
                                </form>

                                <div class="text-center">
                                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal">Create New Account</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body row p-0">
                        <div class="col bg-dark text-light text-center row">
                            <div class="align-self-center">
                                <h5>Welcome to TechStack</h5><br>
                                Making your life Easier.
                            </div>
                        </div>
                        <div class="col">
                            <div class="float-end">
                                <button type="button" class="btn-close m-2" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div><br>
                            <div class="p-5">
                                {{-- register form --}}
                                <form class="form-inline container-fluid" method="POST" action="/registerUser">
                                    @csrf

                                    <div class="form-group m-1">
                                        <label for="name">Enter your name:</label>
                                        <input type="text" class="form-control" id="name" name="uNameRegister">
                                        @error('uNameRegister')
                                            <p class="alert alert-danger mt-1">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group m-1">
                                        <label for="email">Email address:</label>
                                        <input type="text" class="form-control" id="email" name="uEmailRegister">
                                        @error('uEmailRegister')
                                        <p class="alert alert-danger mt-1">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group m-1">
                                        <label for="pwd">Password:</label>
                                        <input type="password" class="form-control" id="pwd" name="uPasswordRegister">
                                        @error('uPasswordRegister')
                                        <p class="alert alert-danger mt-1">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary m-2">Create Account</button>
                                    </div>
                                </form>

                                <div class="text-center">
                                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">Already Have An Account ? Log In</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- main content -->
        @yield('content')

        {{-- footer --}}
        <div class="container-fluid footer">               
            <div class="footerOptions row text-secondary">
        
                {{-- back to top --}}
                <div class="text-center text-light bg-secondary py-1 backToTop" onclick="topFunction()" style="cursor:pointer">
                    Back to Top
                </div>
                <div class="col-2 mt-1 mb-1">
                    <span class="font-weight-bold">About</span>
                    
                        <br><a href="">About Us</a>
                        <br><a href="">Contact Us</a>
                        <br><a href="">Career</a>
                </div>

                <div class="col-2 mt-1 mb-1">
                    <span class="font-weight-bold">Help</span>
                        <br><a href="">Payments</a>
                        <br><a href="">Shipping</a>
                        <br><a href="">Cancellation & Returns</a>
                        <br><a href="">FAQ</a>
                </div>

                <div class="col-2 mt-1">
                    <span class="font-weight-bold">Policy</span>
                        <br><a href="">Return Policy</a>
                        <br><a href="">Terms of Use</a>
                        <br><a href="">Security</a>
                        <br><a href="">Privacy</a>
                </div>

                <div class="col-2 mt-1">
                    <span class="font-weight-bold">Social</span>
                        <br><a href="">Facebook</a>
                        <br><a href="">Twitter</a>
                        <br><a href="">YouTube</a>
                </div>

                <div class="col-4 mt-1 ps-5 border-start">
                    <span class="font-weight-bold">Our Branches</span>
                        <br><a href="mapview">Howrah Maidan</a>
                        <br><a href="">Bally</a>
                        <br><a href="">College Street</a>
                        <br><a href="">Chandni Chawk, Kolkata</a>
                </div>
            </div>
        
            {{-- copyright and stuff --}}
            <div class="bg-dark row text-center footerCopyRight py-2">
                <div class="col"><a href="">Advertise</a></div>
                <div class="col"><a href="">Help Center</a></div>
                <div class="col"><a href="">© 2020-2021 Techstack.com</a></div>
        
            </div>
        </div>

    </div>


    <div class="overlay"></div>
</body>

@if(session()->get('loginmessage') || $errors->has('uEmailLogin') || $errors->has('uPasswordLogin'))
    <script>
        $(document).ready(function(){
            $("#loginModal").modal('show');
        });
    </script>
@endif

@if($errors->has('uEmailRegister') || $errors->has('uPasswordRegister'))
    <script>
        $(document).ready(function(){
            $("#registerModal").modal('show');
        });
    </script>
@endif

