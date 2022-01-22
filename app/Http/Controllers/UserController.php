<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate(10);

        $index = 1;
        return view('backend.user.index', [
            'title' => 'Danh Sách Người Dùng '
        ])->with(compact('users', 'index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create', [
            'title' => 'Thêm mới người dùng'
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
            'full_name' => 'string|required',
            'username' => 'string|nullable',
            'email' => 'email|required|unique:users,email',
            'password' => 'min:6|required',
            'phone' => 'string|nullable',
            'photo' => 'nullable',
            'address' => 'string|nullable',
            'role' => 'required|in:admin,vendor,customer',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $status = User::create($data);
        if ($status) {
            return redirect()->route('user.index')->with('success', 'Thêm người dùng thành công');
        } else {
            return back()->with('error', 'Thêm người dùng không thành công');
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
        $user = User::find($id);
        if ($user) {
            return view('backend.user.update', [
                'title' => 'Cập Nhật Người Dùng'
            ])->with(compact('user'));
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
        $user = User::find($id);
        if ($user) {
            $this->validate($request, [
                'full_name' => 'string|required',
                'username' => 'string|nullable',
                'email' => 'email|required',
                'phone' => 'string|nullable',
                'photo' => 'nullable',
                'address' => 'string|nullable',
                'role' => 'required|in:admin,vendor,customer',
                'status' => 'required|in:active,inactive'
            ]);

            $data = $request->all();
            $data['password'] = Hash::make($request->password);
            $status = $user->fill($data)->save();
            if ($status) {
                return redirect()->route('user.index')->with('success', 'Cập nhật người dùng thành công');
            } else {
                return back()->with('error', 'Cập nhật người dùng không thành công');
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
        $user = User::find($id);
        if ($user) {
            $status = $user->delete();
            if ($status) {
                return redirect()->route('user.index')->with('success', 'Bạn đã xoá thành công');
            } else {
                return redirect()->back()->with('error', 'Xoá thất bại');
            }
        }
    }

    public function userStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('users')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('users')->where('id', $request->id)->update(['status' => 'inactive']);
        }
        return response()->json(['msg' => 'Cập nhật status thành công', 'status' => true]);
    }
}
