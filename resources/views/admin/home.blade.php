<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.meta')
@include('admin.css')
</head>
<body  style="">
@include('admin.header')
  <div class="container">
    <div class="row" style="margin:100px 0; border: 2px solid black;">
      <!-- ajouter une categorie -->
      <div class="col-lg-4">     
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">Afficher les categories</h5>
            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="{{url('view_category')}}"  class="btn btn-primary card-link">Afficher</a>
          </div>
        </div>
      </div>
      <!-- ajouter un produit -->
      <div class="col-lg-4">     
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">Ajouter un produit</h5>
            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="{{url('view_product')}}"  class="btn btn-primary card-link">Ajouter</a>
          </div>
        </div>
      </div>
      <!-- Voir l'inventaire des produits -->
      <div class="col-lg-4">     
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">Voir l'inventaire des produits</h5>
            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="{{url('show_product')}}"  class="btn btn-primary card-link">Voir</a>
          </div>
        </div>
      </div>
     
      
    </div>
  </div>

  @include('admin.meta')
</body>
</html>