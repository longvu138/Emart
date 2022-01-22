<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(10);
        $index = 1;
        return view('backend.product.index', [
            'title' => 'Danh Sách Sản Phẩm'
        ])->with(compact('products', 'index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product.create', [
            'title' => 'Thêm mới Product'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'string|required',
            'summary' => 'string|nullable',
            'description' => 'string|nullable',
            'stock' => 'nullable|numeric',
            'price' => 'nullable|numeric',
            'discount' => 'nullable|numeric',
            'photo' => 'required',
            'cat_id' => 'required|exists:categories,id',
            'child_cat_id' => 'nullable|exists:categories,id',
            'size' => 'nullable',
            'conditions' => 'nullable',
            'status' => 'nullable|in:active,inactive',
            'brand_id' => 'nullable|exists:categories,id',

        ]);
        $data = $request->all();
        $slug = Str::slug($request->input('title'));
        $slug_count = Product::where('slug', $slug)->count();
        if ($slug_count > 0) {
            $slug = time() . '-' . $slug;
        }
        $data['slug'] = $slug;
        // 100-100*10% = 90
        $data['offer_price'] = (($request->price - ($request->price * $request->discount) / 100));
        // return $data;
        $status = Product::create($data);
        if ($status) {
            return redirect()->route('product.index')->with('success', 'Thêm mớI sản phẩm thành công');
        } else {
            return back()->with('error', 'Thêm mớI sản phẩm không thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        // dd($product->toArray());
        if ($product) {
            return view('backend.product.update', [
                'title' => 'Cập nhật sản phẩm'
            ])->with(compact('product'));
        } else {
            return back()->with('error', 'Không Tìm Thấy');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $product = Product::find($id);
        if ($product) {
            $this->validate(
                $request,
                [
                    'title' => 'string|required',
                    'summary' => 'string|nullable',
                    'description' => 'string|nullable',
                    'stock' => 'nullable|numeric',
                    'price' => 'nullable|numeric',
                    'discount' => 'nullable|numeric',
                    'photo' => 'required',
                    'cat_id' => 'required|exists:categories,id',
                    'child_cat_id' => 'nullable|exists:categories,id',
                    'size' => 'nullable',
                    'conditions' => 'nullable',
                    'status' => 'nullable|in:active,inactive',
                    'brand_id' => 'nullable|exists:categories,id',

                ],
                [
                    'status.required' => 'Bạn chưa chọn status'
                ]
            );
            $data = $request->all();
            $slug = Str::slug($request->input('title'));
            $slug_count = Product::where('slug', $slug)->count();
            if ($slug_count > 0) {
                $slug = time() . '-' . $slug;
            }
            $data['slug'] = $slug;
            $data['offer_price'] = (($request->price - ($request->price * $request->discount) / 100));
            // return $data;
            $status = $product->fill($data)->save();
            if ($status) {
                return redirect()->route('product.index')->with('success', 'Cập nhật sản phẩm thành công');
            } else {
                return back()->with('error', 'Cập nhật sản phẩm không thành công');
            }
        } else {
            return back()->with('error', 'Không Tìm Thấy');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $Product = Product::find($id);
        if ($Product) {
            $status = $Product->delete();
            if ($status) {
                return redirect()->route('product.index')->with('success', 'Bạn đã xoá thành công');
            } else {
                return redirect()->back()->with('error', 'Xoá thất bại');
            }
        }
    }


    public function ProductStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('Products')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('Products')->where('id', $request->id)->update(['status' => 'inactive']);
        }
        return response()->json(['msg' => 'Cập nhật status thành công', 'status' => true]);
    }
}
