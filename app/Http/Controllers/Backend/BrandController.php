<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\BrandRequest;
use App\Models\Brand;
use App\Services\Backend\BrandServices;
use Brian2694\Toastr\Facades\Toastr;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::latest()->with(['author'])->paginate(5);
        return view('backend.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\BrandRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = BrandServices::storeImage($request->name, $request->file('image'));
        }

        //Store Data
        try {
            Brand::create([
                'user_id' => Auth::id(),
                'name' => ['en'=>$request->name,'bn'=>$request->name_bn],
                'image' => $imageName,
                'status' => $request->filled('status'),
            ]);

            Toastr::success('Category Inserted', 'Success', ['options']);
        } catch (\Exception $e) {
            Toastr::error($e->getMessage(), 'Error', ['options']);
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $editBrand = $brand;
        $brands = Brand::latest()->paginate(5);
        return view('backend.brand.index', compact('brands', 'editBrand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\BrandRequest  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        $imageName = $brand->image;
        if ($request->hasFile('image')) {
            $imageName = BrandServices::updateImage($request->name, $request->file('image'), $brand->image);
        }
        //Update Data
        try {
            $brand->update([
                'user_id' => Auth::id(),
                'name' => $request->name,
                'image' => $imageName,
                'status' => $request->filled('status'),
            ]);
            Toastr::success('Category Updated', 'Success', ['options']);
        } catch (\Exception $e) {
            Toastr::error($e->getMessage(), 'Error', ['options']);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        try {
            $disk = Storage::disk('public');
            //Deleet File If Exists
            if ($disk->exists('brand/' . $brand->image)) {
                $disk->delete('brand/' . $brand->image);
            }
            $brand->delete();
            Toastr::success('Category Deleted', 'Success', ['options']);
        } catch (\Exception $e) {
            Toastr::error($e->getMessage(), 'Error', ['options']);
        }
        return redirect()->route('admin.brands.index');
    }
}
