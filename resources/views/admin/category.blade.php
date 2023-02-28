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
          width: 70%;
          text-align: center;
          margin-top: 30px;
          border: 3px solid green;
          font-size: 20px
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
          @if(session()->has('message'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >x</button>
            {{session()->get('message')}}
          </div>
          @endif
            <div class="div_center">
            <h2 class="h2_font">Ajouter Categorie</h2>
            <form action="{{url( '/add_category' )}}" method="POST">
              @csrf
                <input class="input_color" type="text" name="category" placeholder="Entrez le nom d'une catégorie">
                <input type="submit" class="btn btn-primary" name="submit" value="Ajouter">
            </form>
            </div>

            <table class="center">

              <tr>
                <td>Nom de la catégorie</td>
                <td>Action</td>
              </tr>


              @foreach($data as $data)
              <tr>
                <td> {{$data->category_name}} </td>
                <td>
                  <a onclick="return confirm('Voulez vous vraiment supprimer?')" class="btn btn-danger" href="
                  {{url('delete_category', $data->id)}} ">Supprimer</a>
                </td>
              </tr>
              @endforeach
            </table>

        </div>
        </div>
    </div>
</div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')

  </body>
</html>