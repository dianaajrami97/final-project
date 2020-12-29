	<nav id="nav" class="navbar nav-transparent">
        <div class="container">
            <ul class="main-nav nav navbar-nav navbar-left">
                <li class="active">
                    <a href="#home">Home</a>
                </li>
                <li class="">
                    <a href="#about">About us</a>
                </li>
                <li class="">
                    <a href="#portfolio">Latest Books</a>
                </li>
                <li class="">
                    <a href="#service">Offers</a>
                </li>
                <li>
                    <a href="#pricing">Pricing</a>
                </li>
                <li>
                    <a href="#contact">Contact us</a>
                </li>
                <li>
                    <a href="#team">Login</a>
                </li>
                <li class="has-dropdown">
                    <a href="#blog">Categories</a>
                    <ul class="dropdown">
                        @foreach($categories as $category)
                        <li>
                            <a href="#">{{ $category['name'] }}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>

            </ul>
            <div class="navbar-header navbar-right">
                <div class="navbar-brand">
                    <a href="index.html">
                        <img class="logo" src="img/logo.png" alt="logo">
                        <img class="logo-alt" src="img/logo-alt.png" alt="logo">
                    </a>
                </div>
                <div class="nav-collapse">
                    <span></span>
                </div>
            </div>

        </div>
    </nav>