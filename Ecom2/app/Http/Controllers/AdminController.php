<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

use App\Models\admin;
use App\Models\product;
use App\Models\category;


class AdminController extends Controller
{
    public function adminLogin(Request $req){

        $data=admin::where('username',$req->aUnameLogin)->first();
        

        if(empty($data)){
            return redirect('tsadmin/login')->with('adminloginmessage', 'Wrong Email or Password');
        }
        
        if(Hash::check($req->aPwdLogin,$data->password)){
            $req->session()->put('adminuser', $data->username);

            return redirect('tsadmin/dashboard');
        }
        else{
            return redirect('tsadmin/login')->with('adminloginmessage', 'Wrong Email or Password');
        }

    }
    public function adminRegistration(Request $req){

        $req->validate([
            'aFullName' => 'required | regex:/^[a-zA-Z\s]*$/',
            'aUsername'=> 'required | min:8',
            'aEmail' => 'required | email |unique:admins,email',
            'aPwd'=> 'required | min:8'
        ]);

        $currentadmin = new admin;

        $currentadmin->full_name=$req->aFullName;
        $currentadmin->username=$req->aUsername;
        $currentadmin->email=$req->aEmail;
        $currentadmin->password=Hash::make($req->aPwd);

        $currentadmin->save();

        return redirect('/tsadmin/manageadmins');

    }



    public function showCategories(){
        $categories = category::all();
        return view('admin/productsCategoryAdmin')->with('categories',$categories);
    }
    public function showProducts(){
        $data = product::all();

        return view('admin/productsList')->with('items',$data);
    }
    public function showAdmins(){
        $data = admin::all();
        return view('admin/adminsList')->with('items',$data);
    }

    public function goToProductInsert(){
        $data = category::all();

        return view('admin/insertProductPage')->with('categories',$data);
    }
    public function productInsert(Request $req){

        $item= new product;

        $item->category_id = $req->productCategory;
        $item->name = $req->productName;
        $item->brand = $req->productBrand;

        if ($image = $req->file('productImage')) {
            $destinationPath = 'images/productImages';
            $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $productImage);
            $req->productImage = $productImage;
        }
        
        $item->image = $req->productImage;
        $item->price = $req->productPrice;
        $item->discount = $req->productDiscount;
        $item->shortDesc = $req->productShortDesc;
        $item->mainDesc = $req->productMainDesc;

        $item->save();


        return redirect('/tsadmin/manageproducts');
    }
    public function categoryInsert(Request $req){
        $item= new category;

        $item->name = $req->categoryName;

        if ($image = $req->file('bannerImage')) {
            $destinationPath = 'images/bannerImages';
            $categoryImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $categoryImage);
            $req->bannerImage = $categoryImage;
        }
        
        $item->banner = $req->bannerImage;

        $item->save();

        return redirect('tsadmin/managecategories');
    }
   
}
