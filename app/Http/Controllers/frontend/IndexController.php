<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    // : /
    public function home()
    {
        $banners = Banner::where(['status' => 'active', 'conditions' => 'banner'])->orderBy('id', 'DESC')->limit(5)->get();
        $categories = Category::where(['status' => 'active', 'is_parent' => '1'])->orderBy('id', 'DESC')->limit(3)->get();

        return view('frontend.index')->with(compact('banners', 'categories'));
    }


    // 
    public function productCategory($slug)
    {
        //  get category with product where slug == $slug 
        $categories = Category::with('products')->where('slug', $slug)->first();
        // return $categories->products;
        return view('frontend.pages.product-category')->with(compact('categories'));
    }


    // 
    public function productDetail($slug)
    {

        $product = Product::with('rel_prods')->where('slug', $slug)->first();
      
        if ($product) {
            return view('frontend.pages.product-detail')->with(compact('product'));
        } else {
            return 'Product detail not found';
        }
    }

    // 
    public function userAuth()
    {
        return view('frontend.auth.auth');
    }



}
