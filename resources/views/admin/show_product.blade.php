<!DOCTYPE html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    @include('admin.meta')
    @include('admin.css')
    <style type="text/css">
        .div_center{
            text-align: center;
            padding-top: 40px;
        }
        .h2_font{
            font-size:  40px;
            padding-bottom: 40px;
        }

        .input_color{
          color:black
        }

        .center{
          margin:auto;
          width: 100%;
          text-align: center;
          margin-top: 30px;
          border: 3px solid green;
          font-size: 20px
        }
        .img-size{
            /* width: 100px; */
            height: 50px;
        }
    </style>
    </head>
    <body>
        <div class="container-scroller">
        <!-- partial -->
            @include('admin.header')
            <!-- partial -->
            <div class="container" >
            <h2 class="h2_font" style=" margin: 50px 0">Inventaire des produits</h2>
                <div class="row" style="width:100%; margin: 50px 0">
                <div class="col-lg-12">
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >x</button>
                                {{session()->get('message')}}
                            </div>
                        @endif
                        <table class="admin-table " style="margin:0; padding:0; width:100%; text-align:center;" >
                            <tr>
                                <th class="th-deg">Nom</th>
                                <th class="th-deg">Prix</th>
                                <th class="th-deg">État</th>
                                <th class="th-deg">Category</th>
                                <th class="th-deg">Modifier</th>
                                <th class="th-deg">Supprimer</th>
                            </tr>

                            @foreach($products as $product)
                            <tr>
                                <td> {{$product->name }} </td>
                                <td>{{number_format($product->price , 2, '.', ',') . "€"}} </td>
                                <td> 
                                    @if(  $product->condition == 0 )
                                            en solde
                                            @else standard
                                    @endif
                                </td>
                                <td> {{$product->category }} </td>
                                <td><a href="{{url('/update_product', $product->id)}}" class="btn btn-success">Éditer</a></td>
                                <td><a href="{{url('/delete_product',  $product->id)}}" class="btn btn-danger" onclick="return confirm( ' voulez vous vraiment supprimer ce produit ? ' ) ">Supprimer</a></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-lg-8"></div>
                    <div class="col-lg-" style="text-align:right;">
                        {{ $products->links() }}
                    </div>

                </div>
            </div>
                    

        </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')

    </body>
</html>