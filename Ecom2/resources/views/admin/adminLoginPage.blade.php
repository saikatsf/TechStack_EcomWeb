<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

<body>
    <div class="container-fluid w-25 loginDiv">
        <span class="h3 text-center">TechStack Admin Login</span>
        <form class="form-inline mt-1" method="POST" action="adminlogin">
            @csrf
            
            @if(session()->get('adminloginmessage'))
                <p class="alert alert-danger mt-1">{{ session()->get('adminloginmessage') }}</p>
            @endif

            <div class="form-group m-1">
            <label for="aUsername">Username :</label>
            <input type="text" class="form-control" name="aUnameLogin" id="aUsername">
            </div>
            <div class="form-group m-1">
            <label for="aPwd">Password :</label>
            <input type="password" class="form-control" name="aPwdLogin" id="aPwd">
            </div>
            <div class="text-center mt-2">
                <button type="submit" class="btn btn-primary m-2">Log In</button>
            </div>
        </form>
    </div>
</body>
<style>
    body{
        background: rgba(0, 0, 0, 0.7);
        opacity: 1;
    }
    .loginDiv{
        padding: 30px;
        color: white;
        background: black;
	    margin-top: 60px;
        border-radius: 10px; 
    }
</style>
    