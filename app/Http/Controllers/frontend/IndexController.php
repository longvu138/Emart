<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function home()
    {
        $banners = Banner::where(['status' => 'active', 'conditions' => 'banner'])->orderBy('id', 'DESC')->limit(5)->get();
        return view('frontend.index')->with(compact('banners'));
    }
}
