<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Models\User;

use App\Models\Category;

use App\Models\Product;

use App\Models\Size;

use App\Models\Cart;


class HomeController extends Controller
{
     // constant
     public const HOME = '/admin';


    // index function

    public function index(){
        $products = product::simplePaginate(6);
        

        $productSizes = DB::table('products')
        ->join('product_size', 'products.id', '=', 'product_size.product_id')
        ->join('sizes', 'product_size.size_id', '=', 'sizes.id')
        ->select('products.name', 'sizes.size as size')
        ->get();
        return view('home.userpage', compact('products'),  ['productSizes' => $productSizes]);
    

    }



    // redirect function
    // l'adminitrateur  doit être connecté pour acceder a '/admin'
    public function admin(){
        $products = product::simplePaginate(6);
        $productSizes = DB::table('products')
        ->join('product_size', 'products.id', '=', 'product_size.product_id')
        ->join('sizes', 'product_size.size_id', '=', 'sizes.id')
        ->select('products.name', 'sizes.size as size')
        ->get();

        $usertype=Auth::user()->usertype;
        if ($usertype=='1'){
            return view('admin.home');
        } elseif ($usertype=='0'){
            
            return view ('home.userpage', compact('products'),  ['productSizes' => $productSizes]);
        } else {
            return redirect()->back();
        }
        
    }



// récupère les détails d'un produit et les tailles disponibles pour ce produit dans la bdd.
// relie via la table pivot 'product_size' les produits et les tailles disponibles
    public function product_details($id){
        $products=product::find($id);
        $productSizes = DB::table('products')
        ->join('product_size', 'products.id', '=', 'product_size.product_id')
        ->join('sizes', 'product_size.size_id', '=', 'sizes.id')
        ->select('products.name', 'sizes.size as size')
        ->groupBy('products.name', 'sizes.size')
        ->get();

        // Générer faux prix de base en cas de solde du produit
        function generateFakePrice($dis_price) {
            $a = mt_rand(10, 50);
            
            return $dis_price + $a;
        }

        return view('home.product_details', compact('products'), ['productSizes' => $productSizes, 'fakePrice' => generateFakePrice($products->price)], );
    }



    // ajouter les données d'un  produit dans la table 'Cart' du panier
    public function add_cart(Request $request, $id){

        if(Auth::id()){
            $user=Auth::user();
            $product=product::find($id);
            $cart=new cart;
            $cart->user_id = $user->id;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->product_name = $product->name;
            $cart->price = $product->price  * $request->quantity  ;
            $cart->image = $product->image;
            $cart->quantity = $request->quantity;
            $cart->size = $request->size;
            $cart->product_id = $product->id;
            $cart->save();
            return redirect()->back();
        }
        else{
            return redirect('login');
        }
    }
    // reccuperer les données de la tab cart, les afficher dans la vue
    public function show_cart(){
        if(Auth::id()){
            $id=Auth::user()->id;
            $cart=cart::where('user_id', '=', $id)->get();
            return view('home.show_cart', compact('cart'));
            
        }else{
            return redirect('login');
        }
    
        }
        //supprimer un produit de la tab cart 
        public function remove_cart($id){
            $cart=cart::find($id);
            $cart->delete();
            return redirect()->back();
        }


    
}

