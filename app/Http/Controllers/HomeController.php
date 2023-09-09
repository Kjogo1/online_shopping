<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function welcome() {
        $banner = Banner::where('is_active', true)->orderBy('created_at', 'DESC')->first();
        // dd($banner);
        return view('welcome', ['banner' => $banner]);
    }

    public function about() {
        // dd($banner);
        return view('user.aboutus');
    }
}
