<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::orderBy('id', 'DESC')->get();
        $index = 1;
        return view('backend.banners.index', [
            'title' => 'Danh Sách Banner'
        ])->with(compact('banners', 'index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banners.create', [
            'title' => 'Thêm mới Banner'
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
        $data = $request->validate(
            [
                'title' => 'string|required',
                'description' => 'string|nullable',
                'photo' => 'required',
                'condition' => 'required|nullable|in:banner,promo',
                'status' => 'required|nullable|in:active,inactive'

            ],
            [
                'photo.required' => 'Ảnh không được để trống',
                'condition.required' => 'Bạn chưa chọn condition',
                'status.required' => 'Bạn chưa chọn status'
            ]
        );
        $slug = Str::slug($request->input('title'));
        $title_count = Banner::where('title', $data['title'])->count();
        if ($title_count > 0) {
            return back()->with('error', 'Tên banner đã tồn tại');
        }
        $banner = new Banner();
        $banner->title = $data['title'];
        $banner->slug = $slug;
        $banner->description = $data['description'];
        $banner->photo = $data['photo'];
        $banner->status = $data['status'];
        $banner->conditions = $data['condition'];
        $status = $banner->save();
        if ($status) {
            return redirect()->route('banner.index')->with('success', 'Thêm mới banner thành công');
        } else {
            return back()->with('error', 'Thêm mới banner không thành công');
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
        $banner = Banner::find($id);
        if ($banner) {
            return view('backend.banners.update', [
                'title' => 'Cập Nhật Banner'
            ])->with(compact('banner'));
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
        $banner = Banner::find($id);
        if ($banner) {

            $data = $request->validate(
                [
                    'title' => 'string|required',
                    'description' => 'string|nullable',
                    'photo' => 'required',
                    'condition' => 'required|nullable|in:banner,promo',
                    'status' => 'required|nullable|in:active,inactive'

                ],
                [
                    'photo.required' => 'Ảnh không được để trống',
                    'condition.required' => 'Bạn chưa chọn condition',
                    'status.required' => 'Bạn chưa chọn status'
                ]
            );
            $slug = Str::slug($request->input('title'));
            $slug_count = Banner::where('slug', $slug)->count();
            if ($slug_count > 0) {
                $slug = time() . '-' . $slug;
            }
            $banner->title = $data['title'];
            $banner->slug = $slug;
            $banner->description = $data['description'];
            $banner->photo = $data['photo'];
            $banner->status = $data['status'];
            $banner->conditions = $data['condition'];

            $status = $banner->save();
            if ($status) {
                return redirect()->route('banner.index')->with('success', 'Cập Nhật banner thành công');
            } else {
                return back()->with('error', 'Cập Nhật banner không thành công');
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
        $banner = Banner::find($id);
        if ($banner) {
            $status = $banner->delete();
            if ($status) {
                return redirect()->route('banner.index')->with('success','Bạn đã xoá thành công');
            }
            else{
                return redirect()->back()->with('error','Xoá thất bại');

            }
        }
    }

    public function bannerStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('banners')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('banners')->where('id', $request->id)->update(['status' => 'inactive']);
        }
        return response()->json(['msg' => 'Cập nhật status thành công', 'status' => true]);
    }
}
