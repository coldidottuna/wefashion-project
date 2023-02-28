<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;

use App\Models\Size;


class AdminController extends Controller
{
    //reccupère les categories (si existante) dans la tab categories
    public function view_category(){
        $data=category::all();
        return view('admin.category', compact('data'));
    }
    //ajouter une categorie dans la tab 'categories' depuis un formulaire
    public function add_category(Request $request){
        $data=new category;
        $data->category_name=$request->category;
        $data->save();
        return redirect()->back()->with( 'message', 'La catégorie a été ajoutée');
    }
    //supprimer une categorie dans la base de données
    public function delete_category($id){
        $data=Category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'La catégorie a bien été supprimée');
    }

    // reccupère la collection de catégories de produits et la collection de tailles pour afficher  les produits dans le crud 
    public function view_product(){
        $category = category::all();
        $sizes= size::all();
        return view('admin.product', compact(['category', 'sizes']));
    }

    // renseignement des données d'un produit, enregistrement dans la base de données
    public function add_product(Request $request){ 
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->visibility = $request->visibility;
        $product->condition = $request->condition;
        $product->reference = $request->reference;
        $product->category = $request->category;
        $image=$request->image;
        $imagename = time(). '.' .$image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product->image = $imagename;
        $product->save();
        $size_ids = $request->input('size', []);
        $sizes = Size::whereIn('id', $size_ids)->get();
        foreach ($sizes as $size) {
            $product->sizes()->attach($size);
        }
    
        return redirect()->back();
    }
    
    //  recuperer tout les produits dans la bdd et les afficher dans la vue 
    public function show_product(){
        $products = product::simplePaginate(15);
        $productSizes = DB::table('products')
                ->join('product_size', 'products.id', '=', 'product_size.product_id')
                ->join('sizes', 'product_size.size_id', '=', 'sizes.id')
                ->select('products.name', 'sizes.size as size')
                ->get();
        
        // $product=product::all();
        return view('admin.show_product', compact('products'), ['productSizes' => $productSizes]);
    }

    //  suprimer un produit de la bdd
    public function delete_product($id){
        $product=product::find($id);
        $product->delete();
        return redirect()->back()->with('message', 'La produit a bien été supprimé');
    }

    // formulaire prérempli du produit sélectionné
    public function update_product(Request $request, $id){

        $product=product::find($id);
        $category=category::all();
        $sizes=size::all();

        return view('admin.update_product', compact('product', 'category', 'sizes'));
    }

    //soumission du produit mis a jour
    public function update_product_confirm(Request $request, $id){

        $product=product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->visibility = $request->visibility;
        $product->condition = $request->condition;
        $product->reference = $request->reference;
        $product->category = $request->category;
        $image=$request->image;
        // enregistrer une nouvelle image pour un produit existant
        if($image){
            $imagename ='product/'. '' .$request->category. '.' .$image->getClientOriginalExtension();
            $request->image->move('product', $imagename);
            $product->image = $imagename;
        }
            
            $product->save();
            $size_ids = $request->input('size', []);
        $sizes = Size::whereIn('id', $size_ids)->get();
        foreach ($sizes as $size) {
            $product->sizes()->attach($size);
        }
    
        return redirect()->back()->with('message', 'Le produit a bien été mis a jour');
    }
}
