<!DOCTYPE html>
<html lang="zxx">
<base href="/public">
    <!-- Header -->
    @include('home.head')
<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Header -->
    @include('home.header')
    <!-- Header Section -->
<div class="container">
    <div class="row" style="margin:100px 0;">
        <div class="col-lg-8">
        <div class="row" >
            @if($cart->count() > 0)
                <h1 style="font-size:2rem;"><strong>Bienvenue {{$cart->first()->name}}, finalisez vos achats.</strong></h1>
            @endif
        </div>

            <div class="row">
            <table class="article-table w-100">
    <tr>
        <th class="th-deg">Articles</th>
        <th class="th-deg">Prix</th>
        <th class="th-deg">Quantité(s)</th>
        <th class="th-deg">Total</th>
        <th class="th-deg"></th>
    </tr> 

    <?php
    $total = 0; // initialisation de la variable $total
    ?>
    @foreach($cart as $carts)
    <tr>
        <td class="td-deg"> 
            <img src="/{{$carts->image}}" alt="" class="article-img">    
            {{$carts->product_name}} 
        </td>
        <td class="td-deg"> {{ $carts->price}} </td>
        <td class="td-deg"> 
            <input type="number" value="{{ $carts->quantity }}" onchange="updateTotal(this, {{ $carts->price }})">
        </td>
        <td>
            <span class="total">{{ $carts->quantity * $carts->price }}</span> €
        </td>
        <td>
    <a href="{{ url('remove_cart', $carts->id) }}" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce produit de votre panier ?')">Supprimer</a>
</td>

    </tr>
    <?php
    $total += $carts->quantity * $carts->price; // ajout du total à la variable $total
    ?>
    @endforeach
</table>
                </div>

        </div>
        <div class="col-lg-4">
            <div class="article-col">
                <h4>Votre commande :</h4>
                <br><br>
                <div>
                    <h2 style="text-align:right; color:red; font-size:20px;" id="totalPrice">{{ $total }}  €</h2>
                    
                </div>
                <br><br>
                <a href="" class="w-100 btn btn-lg btn-dark"> Passer à la caisse</a>                
            </div>
        </div>
    </div>
</div>

    <!-- Footer Section -->
    @include('home.footer')
    <!-- Footer Section -->

    <!-- Js Plugins -->
    @include('home.script')
</body>

</html>