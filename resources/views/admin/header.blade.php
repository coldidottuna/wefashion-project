
<!--  -->
        <header class="header">
        <div class="container" >
            
            <div class="row"style="border-bottom:1px solid black">
                <div class="col-lg-4 col-md-4">
                    <div class="header__logo">
                        <li class= class="active" style='list-style:none;'>
                            <a href=" {{url('/admin')}} " style="color:#66EB9A; font-size:30px;">We Fashion</a>
                        </li>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <nav class="header__menu mobile-menu " style="text-align:right;">
                        <ul>
                        <li style="padding-right: 20px; font-size:20px"><a href=" {{url('view_category')}} ">Categories</a></li>
                        <li  style="padding-right: 20px; font-size:20px"><a href=" {{url('/view_product')}}">Produits</a></li>
                        </ul>
                    </nav>
                </div>

            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>