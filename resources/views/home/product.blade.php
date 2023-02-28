<section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                    </ul>
                </div>
            </div>
            <div class="row w-100 m-0" style="text-align:right;">
            <div class="col-lg-10"></div>
            <div class="col-lg-2 p-0">
                <h6 style="font-size: 15px; text-align:right ;"><span style="font-weight:bold; color:#E74C3C">{{$products->count()}}</span>Résultats</h6>     
            </div>
            </div>
            <div class="row product__filter">
                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-md-6 col-sm-6 mix @if($product->condition == 0) soldes @endif @if($product->category == 'homme') man @endif @if($product->category == 'femme') woman @endif ">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="">
                                <img src="{{$product->image}}" alt="" class="product__item__pic_a ">
                                @if($product->condition == 0)
                                <span class="label">en solde</span>
                                @endif
                                <ul class="product__hover">
                                    <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                    <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                                    <li><a href="{{url('product_details', $product->id)}}"><img src="img/icon/search.png" alt=""> <span>voir le produit</span></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6>{{$product->name}}</h6>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <h5>{{$product->price}} €</h5>
                                <div class="product__color__select">
                                    <label for="pc-1">
                                        <input type="radio" id="pc-1">
                                    </label>
                                    <label class="active black" for="pc-2">
                                        <input type="radio" id="pc-2">
                                    </label>
                                    <label class="grey" for="pc-4">
                                        <input type="radio" id="pc-4">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <span style="text-align:right">
                {{$products->links()}}
            </span>
                
        </div>      
    </section>