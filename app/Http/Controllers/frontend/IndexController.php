<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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
    public function productCategory(Request $request, $slug)
    {
        //  get category with product where slug == $slug 

        $categories = Category::with('products')->where('slug', $slug)->first();
        $sort = '';
        if ($request->sort != null) {
            $sort = $request->sort;
        }
        if ($categories == null) {
            return view('errors.404');
        } else {

            if ($sort == 'priceAsc') {
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->orderBy('price', 'ASC')->paginate(6);
                    
            } elseif ($sort == 'priceDesc') {
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->orderBy('price', 'DESC')->paginate(6);
            } elseif ($sort == 'titleAsc') {
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->orderBy('title', 'ASC')->paginate(6);
            } elseif ($sort == 'titleDesc') {
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->orderBy('title', 'DESC')->paginate(6);
            } else {
                $products = Product::where(['status' => 'active', 'cat_id' => $categories->id])->paginate(6);
            }
        }
        $route = 'product-cat';


        if ($request->ajax()) {
            $view   = view('frontend.layouts._single-product', compact('products'))->render();
            return response()->json(['html' => $view]);
        }
        return view('frontend.pages.product-category')->with(compact('products', 'categories', 'route'));
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

    public function loginSubmit(Request $request)
    {


        $this->validate($request, [
            'email' => 'email|required|exists:users,email',
            'password' => 'required|min:4',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 'active'])) {
            Session::put('user', $request->email);
            // url.intended trở lại trang đích sau khi đăng nhập
            if (Session::get('url.intended')) {
                return Redirect::to(Session::get('url.intended'));
            } else {
                return redirect()->route('home')->with('success', 'login thành công');
            }
        } else {
            return back()->with('error', 'Tài khoản không chính xác');
        }
    }


    public function registerSubmit(Request $request)
    {


        $this->validate($request, [
            'full_name' => 'required',
            'username' => 'required',
            'email' => 'email|required|exists:users,email',
            'password' => 'required|min:4|confirmed',
        ]);
        $data = $request->all();
        dd($data);
        $check =  $this->createUser($data);
        Session::put('user', $data['email']);
        Auth::login($check);
        if ($check) {
            return redirect()->route('home')->with('success', 'dang ky thanh cong');
        } else {
            return back()->with('error', 'dang ky that bai');;
        }
    }

    private function createUser(array $data)
    {
        return User::create([
            'full_name' => $data['full_name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => $data['password']
        ]);
    }

    public function userLogout()
    {
        Session::forget('user');
        Auth::logout();
        return redirect('/');
    }
}
