<!-- Start Header/Navigation -->
<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

    <div class="container">
        <a class="navbar-brand" href="">User<span>.</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('index') }}">Home</a>
                </li>
                <li><a class="nav-link" href="">Shop</a></li>
                <li><a class="nav-link" href="">About us</a></li>
                <li><a class="nav-link" href="">Services</a></li>
                <li><a class="nav-link" href="{{ route('listsProduct') }}">Product</a></li>
                <li><a class="nav-link" href="">Contact us</a></li>
            </ul>

            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                
                <li><a class="nav-link" href="{{ route('account') }}"><img src="{{ asset('users/images/user.svg') }}"></a></li> 
                <li><a class="nav-link" href="cart.html"><img src="{{ asset('users/images/cart.svg') }}"></a></li>
                <?php 
                    if (Auth::check()) {
                ?>
                    <li><a class="nav-link" href="{{ route('logout') }}">logout</a></li>
                <?php
                    }else{
                ?>
                    <li><a class="nav-link" href="{{ route('loginUser') }}">Login</a></li>
                <?php
                    }
                ?>
                
            </ul>
        </div>
    </div>
        
</nav>
<!-- End Header/Navigation -->