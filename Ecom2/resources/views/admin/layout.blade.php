<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>



<div class="wrapper">
    <div class="sidenav">
        <div class="sidenav_header text-center text-light">
            Dashboard <hr>
        </div>
        <div class="sidenav_header">
            <ul class="list-unstyled">
                <li><a href="/tsadmin/dashboard"">Home</a></li>
                <li><a href="/tsadmin/manageproducts">Products</a></li>
                <li><a href="/tsadmin/managecategories">Categories</a></li>
                <li><a href="/tsadmin/manageadmins">Admins</a></li>
                <li><a href="">Users</a></li>
            </ul>
        </div>
    </div>
    
    <div class="main">
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand h1 cursor-pointer"  href="/tsadmin/dashboard">TechStack ADMIN</a>
                <div class="d-flex">
                    <span class="text-light mx-5 h5"> Hello {{ session('adminuser') }} </span>
                    <a href="aLogOut" class="text-decoration-none text-light">LogOut</a>
                </div>
            </div>
        </nav>
    
        @yield('content')
        
    </div>
</div>




<style>
    
    .navbar{
        height: 60px;
    }
    .sidenav{
        height: 100%;
        width: 200px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background: black;
        overflow-x: hidden;
    }
    .sidenav hr{
        color: white;
    }
    .sidenav_header{
        font-size: 30px; 
        padding: 10px 0;
    }
    .sidenav li a{
        font-size: 20px;
        text-decoration: none;
        color: white;
        padding: 0 0 0 10px;
    }
    
    .main{
        margin-left: 200px;
        height: 100%;
    }
</style>