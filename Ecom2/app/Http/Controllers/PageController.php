<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\product;
use App\Models\category;
use App\Models\cart;

class PageController extends Controller
{

    public function showHomepage(){
        $data = product::all()->where('category_id',1)
            ->take(4);

        session(['loginRedirect' => '/']);
        
        return view('homepage')->with('category1Products',$data);
    }

    public function showAllProductsPage($c_id){
        session(['loginRedirect' => "products/$c_id"]);

        $data = product::where('category_id',$c_id)->get();
        $dataCatgory = category::where('id',$c_id)->first();
    
        return view('allProductsPage')->with('products',$data)->with('banner',$dataCatgory->banner);
    }


    public function showProductpage($id,$name){
        session(['loginRedirect' => "Product/$id/$name"]);

        $data = product::where('id',$id)
                ->where('name',$name)
                ->first();

        return view('productViewPage')->with('item',$data);
    }
    
    public function addToCart($p_id){

        $cartProduct = cart::where('userid',session('userid'))
                        ->where('productid',$p_id)
                        ->first();
        
        if($cartProduct != NULL){
            $cartProduct->quantity += 1;
            $cartProduct->save();
            
            return redirect(session('loginRedirect'));
        }
        
        $newcartProduct = new cart;

        $newcartProduct->userid = session('userid');
        $newcartProduct->productid = $p_id;
        $newcartProduct->quantity = 1;
        $newcartProduct->save();

        return redirect(session('loginRedirect'));
    }

    public function showCartPage(){
        $cartProducts = cart::where('userid',session('userid'))->get();

        return view('cartpage')->with('items',$cartProducts);
    }


    public function increaseCartQuantity($cart_id){
        $Product = cart::where('id',$cart_id)->first();

        $Product->quantity += 1;
        
        $Product->save();

        return redirect('/mycart');
    }

    public function decreaseCartQuantity($cart_id){
        $Product = cart::where('id',$cart_id)->first();

        $Product->quantity -= 1;

        if ($Product->quantity == 0) {
            $Product->delete();

            return redirect('/mycart');
        }
        
        $Product->save();

        return redirect('/mycart');
    }

    public function removeCartProduct($cart_id){
        $Product = cart::where('id',$cart_id)->delete();

        return redirect('/mycart');
    }
}
