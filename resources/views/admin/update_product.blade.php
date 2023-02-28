<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <base href="/public">
    @include('admin.meta')
    @include('admin.css')
    <!-- css -->
    <style type="text/css">

        .div_center {
        margin: auto;
        width: 50%;
        border: 3px solid #ccc;
        padding: 10px;
        }

        .h2_font {
        font-family: Arial, sans-serif;
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
        }

        .input_color {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        color:black;
        background-color: white;
        
        }

        label {
        font-family: Arial, sans-serif;
        font-size: 16px;
        font-weight: bold;
        display: block;
        margin-bottom: 8px;
        }

        button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 12px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 10px 0;
        cursor: pointer;
        border-radius: 4px;
        }
    </style>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->

    <!-- partial -->
        @include('admin.header')
        <!-- partial -->

        <div class="main-panel">
            <div class="content-wrapper">
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >x</button>
                    {{session()->get('message')}}
                    </div>
                @endif
                <div class="div_center">
                    <h2 class="h2_font"> Éditer un Produit</h2>

                    <form action="{{url('/update_product_confirm', $product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <!-- nom -->
                        <div>    
                            <label for="name">Nom du produit :</label>
                            <input class="input_color" type="text" name="name" placeholder="Nom du produit" required="" value=" {{ $product->name }} ">
                        </div>
                        <!-- description -->
                        <div>    
                            <label for="description">Description du produit :</label>
                            <input class="input_color" type="text" name="description" placeholder="Description du produit" required="" value=" {{ $product->description }} " >
                        </div>
                        <!-- prix -->
                        <div>    
                            <label for="price">Prix :</label>
                            <input class="input_color" type="text" name="price" placeholder="0" required="" value=" {{ $product->price}} ">
                        </div>
                        <!-- taille -->
                        <div class="input_color">    
                            <label for="size">Taille :</label>
                            @foreach ($sizes as $size)
                                <div>
                                    @if ($product->sizes->where('id',$size->id)->first() !== null)
                                    <input class="form-check-input" type="checkbox" value="{{$size->id }}" name="size[]" checked>
                                    @else
                                        <input class="form-check-input" type="checkbox" value="{{$size->id }}" name="size[]">
                                    @endif
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $size->size}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <!-- visibilité -->
                        <div>    
                            <label for="visibility">visibilité :</label>
                            <select name="visibility" id="visibility" class="input_color">
                            <option value="0" @if($product->visibility == 0) selected @endif>pulbié</option>
                            <option value="1" @if($product->visibility == 1) selected @endif>non pulbié</option>
                            </select>
                        </div>
                        <!-- etat -->
                        <div>    
                        <label for="condition">État :</label>
                        <select name="condition" id="condition" class="input_color">
                            <option value="0" @if($product->condition == 0) selected @endif>en solde</option>
                            <option value="1" @if($product->condition == 1) selected @endif>standard</option>
                        </select>
                    </div>

                        <!-- reference -->
                        <div>    
                            <label for="reference"> Référence :</label>
                            <input class="input_color" type="text" name="reference" placeholder="Référence du produit" required="" value=" {{ $product->reference }} ">
                        </div>
                        <!-- categorie -->
                        <div>    
                            <label for="category">Catégorie :</label>
                            <select name="category" id="category" class="input_color">
                                <option value=" {{ $product->category}} " disabled selected> {{ $product->category}} </option>

                                @foreach($category as $category)
                                <option> {{$category->category_name}} </option>
                                @endforeach

                            </select>
                        </div>
                        <!-- image -->
                        <div>
                            <label for="image">Image actuelle du produit  :</label>
                            <img src=" {{ $product->image}} " alt="" height="100" width="100" style="margin:auto">
                        </div>
                        <div>
                            <label for="image">changer image  du produit  :</label>
                            <input type="file" name="image">
                        </div>
                        <!-- submit --> 
                        <div>
                            <input type="submit"  value="update product" class="input_color btn btn-success">
                        </div>
                    </form>
                    
                </div>
            </div>                  
    </div>
</div>

<!-- Required script tags -->
@include('admin.script')
</body>
</html>