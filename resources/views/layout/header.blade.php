<html>
    <head>
        <title> welcome to gruhseva</title>
    </head>
 
</head>
<body>
<div class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0 pe-4">
                <a href="" class="nav-item nav-link">Edit Profile</a>
                <a href="" class="nav-item nav-link">Bookings</a>
                <a href="" class="nav-item nav-link">view proposals</a>
                
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
            
                <input type="submit" class="btn btn-primary py-2 px-4" value="logout" onclick="event.preventDefault();
                                    this.closest('form').submit();">
               </form>
        </div>
    </nav>
</div>
    </body>