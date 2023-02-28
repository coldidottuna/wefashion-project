<!DOCTYPE html>
<html lang="zxx">
    <base href="/public">
    <!-- Head -->
    @include('home.head')

<body>
    
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Header -->
    @include('home.header')
    <!-- Header Section -->
    <!-- product section -->
    <section class="product spad mb-0">
        <div class="container">
            <div class="row product__filter">
                    <div class="col-lg-8 col-md-6 col-sm-12 col-md-12 col-sm-12 p-0" >
                        <div class="display-pic product__item">
                            <div class="product__item__pic set-bg" data-setbg="">
                                <img src="{{$products->image}}" alt="" class="display-img ">
                                @if($products->condition == 0)
                                <span class="label">en solde</span>
                                @endif
                            </div>
                        </div>
                        <ul class="product__hover">
                                </ul>
                        <div class="product__item__text " style="opacity:0.5; margin-bottom:20px; ">
                            </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-3 col-sm-12 col-md-12 col-sm-12 mix display-info">
                        <div style="text-align:left;">
                                <span ><h5 class="product-name"> {{$products->name}}</h5> </span>
                        </div>
                        <div style="text-align:left;">
                            <p class="description-text"> 
                                {{$products->description}}
                            </p>
                        </div>
                        <div style="text-align:left;"> 
                            @if($products->condition == 0)
                            <span class="badge text-bg-danger" style="background-color:red ; color:white">solde</span>
                                <h6 > <strike>
                                {{  number_format( $fakePrice, 2 ) }}€
                                </strike>
                            </h6>
                                <h4 class="display-price">{{  number_format( $products->price, 2 ) }}€</h4>
                            @elseif($products->condition == 1)
                            <h4 class="display-price">{{  number_format( $products->price, 2 ) }}€</h4>
                            @endif
                        </div>
                        <br>
                        <br>
                        <!-- size -->

                        <form action="{{url('add_cart', $products->id)}} " method="POST">
                        @csrf
                                <div style="text-align:left;">
                                    <h6 style="font-weight:bold; margin-bottom:20px;">Taille</h6>
                                        @foreach($productSizes as $sizes)
                                                @if($sizes->name == $products->name)  
                                                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                                        <input type="checkbox" class="btn-check  d-none" id="{{ $sizes->size }}" autocomplete="off" value="{{ $sizes->size }}" name="size">
                                                        <label class="btn btn-outline-dark size-btn" for="{{ $sizes->size }}">{{ $sizes->size }}</label>
                                                </div>
                                                @endif
                                            @endforeach
                                </div>
                                <div style="text-align:left;">
                                <div class="d-grid gap-2">
                                @foreach ($errors->all() as $error)
                                <li>{{$error = "Veuillez remplir le champ"}}</li><br>
                                @endforeach
                                <div class=" justify-center align-items-left mt-10" style="margin-top:20px;">
                                    <input type="hidden" name="id" value="{{ $products->id }}">
                                    <span >
                                        <label for="quantity"  style="font-weight:bold; margin-bottom:20px;" > Quantité</label>
                                        <input class="form-control text-center me-3" id="quantity" name="quantity" type="num" value="1" style="max-width: 3rem" />
                                    </span>
                                <br>
                                 <button class="btn btn-lg btn-dark"  style="color:white" type="submit">
                                    <i class="bi-cart-fill me-1"></i>
                                    Ajouter au panier
                                </button>
                                </div>
                        </form>  
                            <!-- <a class="btn btn-lg btn-dark" style="color:white">Ajouter au panier</a> -->
                            <!-- <input type="submit" class="add-cart" value="Add to Cart"> -->

                        </div>
                        </div>
                        
                    </div>
            </div>
            <!-- <div class="row">
                <span >
                    <h5 class="product-name"> {{$products->name}}</h5>
                </span>
            </div>
            <div class="row row-description">
                <div class="col-lg-8 ">
                    <p class="description-text"> 
                    {{$products->description}}
                    </p>
                </div>
            </div> -->
            <!-- tags -->
            <section class="tags-section">
            @if($products->category == "femme")
                    <div class="row">
                        <button class="btn-tag  btn  btn-outline-danger">#tendance</button>
                        <button class="btn-tag  btn  btn-outline-secondary">#mode feminine</button>
                    </div>
                    <div class="row">
                        <button class="btn-tag  btn  btn-outline-warning">#prêt a porter</button>
                        <button class="btn-tag  btn  btn-outline-danger">#stylée</button>
                        <button class="btn-tag  btn  btn-outline-info">#à la mode</button>
                        <button class="btn-tag  btn  btn-outline-info">#glamour</button>
                    </div>
                    @else
                    <div class="row">
                        <button class="btn-tag  btn  btn-outline-warning">tendance</button>
                        <button class="btn-tag  btn  btn-outline-secondary">mode homme</button>
                    </div>
                    <div class="row">
                        <button class="btn-tag  btn  btn-outline-danger">casual</button>
                        <button class="btn-tag  btn  btn-outline-secondary">look</button>
                        <button class="btn-tag  btn  btn-outline-info">moderne</button>
                    </div>
                    @endif
            </section>
            <span style="text-align:right">
            </span>
        </div>      
        
    </section>
    <!-- product section end -->
    <!-- Footer Section -->
    @include('home.footer')
    <!-- Footer Section -->
    <!-- Js Plugins -->
    @include('home.script')
</body>

</html>