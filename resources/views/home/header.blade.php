
<script src="home/js/popper.min.js"></script>
    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <li class= class="active" style='list-style:none;'>
                            <a href=" {{url('/')}} " style="color:#66EB9A; font-size:30px;">We Fashion</a>
                        </li>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                                <li  data-filter=".soldes"><a href="#">Soldes</a></li>
                                <li data-filter=".man" class="listyle"><a href="#">Men</a></li>
                                <li data-filter=".woman" class="listyle"><a href="#">Women</a></li>
                        </ul>
                    </nav>
                </div>


                <div class="col-lg-4 col-md-3">
                    <div class="header__nav__option">
                        <ul>
                            
                        </ul>
                        <li>
                        <a href="{{url('show_cart')}}  ">
                            <i class="uil uil-shopping-bag"></i> panier
                        </a>
                        <!-- <span class="btn btn-danger">0</span> -->
                        </li>
                                    @if (Route::has('login'))
                                    @auth
                                    <li >

                                            <x-app-layout>
                                                </x-app-layout>

                                    </li>
                                    @else
                                    <li><a class="dropdown-item" href="{{ route('login') }}">login</a></li>
                                    <li><a class="dropdown-item" href="{{ route('register') }}">register</a></li>        
                                    @endauth
                                    @endif
                    </div>
                    
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->
