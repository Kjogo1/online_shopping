<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    //
    public function index()
    {
        $banners = Banner::orderBy('created_at', 'DESC')->get();
        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'is_active' => 'required|boolean',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }

        $file = $request->file('image');
        $name = $file->hashName();
        // $ext = $file->extension();
        // $image = $name.'.'.$ext;
        $request['image']->storeAs('public/banner', $name);

        Banner::create([
            'title' => $request->title,
            'image' => $name,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('admin.banner.index')->with('success', 'You have created a Banner');
    }

    public function product(Request $request)
    {

        $product = Product::findOrFail($request->product_id);


        $file = 'storage/products/' . $product->image;

        $fileExtension = File::extension($file);
        $newName = time().'.'.$fileExtension;
        $newPathWithName = 'storage/banner/'.$newName;

        // dd($newPathWithName);
        if (File::copy($file, $newPathWithName)) {
            Banner::create([
                'title' => $product->name,
                'image' => $newName,
                'is_active' => true,
            ]);
        }

        return redirect()->route('admin.banner.index')->with('success', 'You have created a Banner');
    }

    public function show(string $id)
    {
        return "eeow";
    }

    public function edit(string $id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit', ['banner' => $banner]);
    }

    public function update(Request $request, string $id)
    {

        $banner = Banner::findOrFail($id);
        $file = $request->file('image');

        if ($file) {
            $validate = Validator::make($request->all(), [
                'title' => 'required|max:255',
                'is_active' => 'required|boolean',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            ]);
        } else {
            $validate = Validator::make($request->all(), [
                'title' => 'required|max:255',
                'is_active' => 'required|boolean',
            ]);
        }


        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }

        if ($file) {
            $name = $file->hashName();
            $request['image']->storeAs('public/banner', $name);
        } else {
            $name = $banner->image;
        }

        return redirect()->route('admin.banner.index')->with('success', 'You have updated the banner');
    }

    public function updateStatus(Request $request, string $id)
    {
        $banner = Banner::findOrFail($id);

        if ($request->is_active) {
            $request['is_active'] = false;
        } else {
            $request['is_active'] = true;
        }

        $banner->update(['is_active' => $request['is_active']]);
        return redirect()->route('admin.banner.index')->with('success', 'You has successful change status');
    }

    public function delete(string $id)
    {
        $banner = Banner::findOrFail($id);
        dd($banner);
    }
}
