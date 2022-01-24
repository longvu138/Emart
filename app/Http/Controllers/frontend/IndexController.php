<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
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
}
