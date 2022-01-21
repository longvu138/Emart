<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(10);

        $index = 1;
        return view('backend.category.index', [
            'title' => 'Danh Mục Sản Phẩm '
        ])->with(compact('categories', 'index'));
    }

    public function create()
    {
        $parent_cats = Category::where('is_parent', 1)->orderBy('title', 'ASC')->get();
        return view('backend.category.create', [
            'title' => 'Thêm mới Danh mục',
        ])->with(compact('parent_cats'));
    }


    public function store(Request $request)
    {   
      
        $data = $request->validate(
            [
                'title' => 'string|required',
                'summary' => 'string|nullable',
                'is_parent' => 'nullable',
                'photo' => 'nullable',
                'parent_id' => 'nullable',
                'status' => 'nullable|in:active,inactive'

            ],
            [
                'status.required' => 'Bạn chưa chọn status'
            ]
        );
        $slug = Str::slug($request->input('title'));
        $title_count = Category::where('title', $data['title'])->count();
        if ($title_count > 0) {
            return back()->with('error', 'Tên banner đã tồn tại');
        }
        $data['is_parent'] = $request->input('is_parent', 0);
        $category = new Category();
        $category->title = $data['title'];
        $category->slug = $slug;
        $category->is_parent = $data['is_parent'];
        $category->summary = $data['summary'];
        $category->photo = $data['photo'];
        if ($category->is_parent == 1) {
            $category->parent_id = null;
        }
        if ($category->is_parent == 0) {
            $category->parent_id = $data['parent_id'];
        }
        $category->status = $data['status'];
        // dd($category->toArray());
        $status = $category->save();
        if ($status) {
            return redirect()->route('category.index')->with('success', 'Thêm mới category thành công');
        } else {
            return back()->with('error', 'Thêm mới category không thành công');
        }
    }



    public function edit($id)
    {
        $category = Category::find($id);
        $parent_cats = Category::where('is_parent', 1)->orderBy('title', 'ASC')->get();
        if ($category) {
            return view('backend.category.update', [
                'title' => 'Cập Nhật Danh Mục'
            ])->with(compact('category', 'parent_cats'));
        } else {
            return back()->with('error', 'Không Tìm Thấy');
        }
    }




    public function update(Request $request, $id)
    {

        $category = Category::find($id);
        if ($category) {
            $data = $request->validate(
                [
                    'title' => 'string|required',
                    'summary' => 'string|nullable',
                    'is_parent' => 'nullable',
                    'photo' => 'nullable',
                    'parent_id' => 'nullable',
                    'status' => 'required|in:active,inactive'

                ],
                [
                    'status.required' => 'Bạn chưa chọn status'
                ]
            );
            $slug = Str::slug($request->input('title'));
            $slug_count = Category::where('slug', $slug)->count();
            if ($slug_count > 0) {
                $slug = time() . '-' . $slug;
            }
            $data['is_parent'] = $request->input('is_parent', 0);
            $category->is_parent = $data['is_parent'];
            $category->title = $data['title'];
            $category->slug = $slug;
            $category->summary = $data['summary'];
            $category->photo = $data['photo'];

            if ($category->is_parent == 1) {
                $category->parent_id = null;
            }
            if ($category->is_parent == 0) {
                $category->parent_id = $data['parent_id'];
            }

            $category->status = $data['status'];
            // dd($category->toArray());
            $status = $category->save();
            if ($status) {
                return redirect()->route('category.index')->with('success', 'cập nhật danh mục thành công');
            } else {
                return back()->with('error', 'cập nhật danh mục không thành công');
            }
        } else {
            return back()->with('error', 'Không Tìm Thấy');
        }
    }


    public function destroy($id)
    {
        $category = Category::find($id);
        $child_cate_id = Category::where('parent_id', $id)->pluck('id');
        if ($category) {
            $status = $category->delete();
            if ($status) {
                if (count($child_cate_id) > 0) {
                    Category::shiftChild($child_cate_id);
                }
                return redirect()->route('category.index')->with('success', 'Bạn đã xoá thành công');
            } else {
                return redirect()->back()->with('error', 'Xoá thất bại');
            }
        }
    }

    public function categoryStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('categories')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('categories')->where('id', $request->id)->update(['status' => 'inactive']);
        }
        return response()->json(['msg' => 'Cập nhật status thành công', 'status' => true]);
    }

    public function getChildByParentID(Request $request, $id)
    {
        $category = Category::find($request->id);
        $child_id = Category::getChildByParentID($id);
        if ($category) {
            if (count($child_id) <= 0) {
                return  response()->json(['status' => false, 'data' => null, 'msg' => '']);
            }
            return  response()->json(['status' => true, 'data' => $child_id, 'msg' => '']);
        }
        else {
            return  response()->json(['status' => false, 'data' => null, 'msg' => 'category not found']);

        }
    }
}
