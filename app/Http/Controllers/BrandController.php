<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('id', 'DESC')->paginate(10);
        $index = 1;
        return view('backend.brands.index', [
            'title' => 'Danh Sách brand'
        ])->with(compact('brands', 'index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brands.create', [
            'title' => 'Thêm mới brand'
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
            'title' => 'required|string|nullable',
            'photo' => 'required',
            'status' => 'nullable|in:active,inactive|required',
        ], [
            'title.required' => 'title không được trống',
            'photo.required' => 'photo không được trống',
            'status.required' => 'Bạn chưa chọn trạng thái'
        ]);

        $data = $request->all();
        $slug = Str::slug($request->input('title'));
        $slug_count = Brand::where('slug', $slug)->count();
        if ($slug_count > 0) {
            $slug = time() . '-' . $slug;
        }
        $data['slug'] = $slug;
        $status = Brand::create($data);
        if ($status) {
            return redirect()->route('brand.index')->with('success', 'thêm mới brand thành công');
        } else {
            return back()->with('error', 'thêm mới brand không thành công');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        if ($brand) {
            return view('backend.brands.update', [
                'title' => 'Cập Nhật brand'
            ])->with(compact('brand'));
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

        $brand = Brand::find($id);
        if ($brand) {
            $this->validate($request, [
                'title' => 'required|string|nullable',
                'photo' => 'required',
                'status' => 'nullable|in:active,inactive|required',
            ], [
                'title.required' => 'title không được trống',
                'photo.required' => 'photo không được trống',
                'status.required' => 'Bạn chưa chọn trạng thái'
            ]);

            $data = $request->all();
            $slug = Str::slug($request->input('title'));
            $slug_count = Brand::where('slug', $slug)->count();
            if ($slug_count > 0) {
                $slug = time() . '-' . $slug;
            }
            $data['slug'] = $slug;
            
            $status = $brand->fill($data)->save();
            if ($status) {
                return redirect()->route('brand.index')->with('success', 'Cập nhật brand thành công');
            } else {
                return back()->with('error', 'Cập nhật brand không thành công');
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

        $brand = Brand::find($id);
        if ($brand) {
            $status = $brand->delete();
            if ($status) {
                return redirect()->route('brand.index')->with('success', 'Bạn đã xoá thành công');
            } else {
                return redirect()->back()->with('error', 'Xoá thất bại');
            }
        }
    }


    public function brandStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('brands')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('brands')->where('id', $request->id)->update(['status' => 'inactive']);
        }
        return response()->json(['msg' => 'Cập nhật status thành công', 'status' => true]);
    }
}
