<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
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

    <!-- partial -->
        @include('admin.header')
        <!-- partial -->

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="div_center">
                    <h2 class="h2_font"> Ajouter Produits</h2>

                    <form action="{{url('/add_product')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <!-- nom -->
                        <div>    
                            <label for="name">Nom du produit :</label>
                            <input class="input_color" type="text" name="name" placeholder="Nom du produit" required="">
                        </div>
                        <!-- description -->
                        <div>    
                            <label for="description">Description du produit :</label>
                            <input class="input_color" type="text" name="description" placeholder="Description du produit" required="" >
                        </div>
                        <!-- prix -->
                        <div>    
                            <label for="price">Prix :</label>
                            <input class="input_color" type="text" name="price" placeholder="0" required="">
                        </div>
                        <!-- taille -->
                        <div  class="input_color">    
                            @foreach ($sizes as $size)
                            <div>
                            <input class="form-check-input" type="checkbox" value="{{ $size->id }}" name="size[]" >
                                    <label class="form-check-label" for="flexCheckDefault" >
                                        {{$size->size}}
                                    </label>
                                </div>
                                @endforeach
                        </div>
                        <!-- visibilité -->
                        <div>    
                            <label for="visibility">visibilité :</label>
                            <select name="visibility" id="visibility" class="input_color">
                            <option value="0">publié</option>
                            <option value="1">non publié</option>
                            </select>
                        </div>
                        <!-- etat -->
                        <div>    
                            <label for="condition"> État :</label>
                            <select name="condition" id="condition" class="input_color">
                            <option value="0">en solde</option>
                            <option value="1">standard</option>
                            </select>
                        </div>
                        <!-- reference -->
                        <div>    
                            <label for="reference"> Référence :</label>
                            <input class="input_color" type="text" name="reference" placeholder="Référence du produit" required="">
                        </div>
                        <!-- categorie -->
                        <div>    
                            <label for="category">Catégorie :</label>
                            <select name="category" id="category" class="input_color">

                                @foreach($category as $category)
                                <option> {{$category->category_name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- image -->
                        <div>
                            <label for="image">Image du produit :</label>
                            <input type="file" name="image">
                        </div>
                        <!-- submit --> 
                        <div>
                            <input type="submit"  value="add product" class="input_color btn btn-success">
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