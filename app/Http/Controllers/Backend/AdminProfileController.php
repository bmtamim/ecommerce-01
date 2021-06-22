<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Admin;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View|View
     */
    public function index()
    {
        return view('backend.profile.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Admin $admin
     * @return Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Admin $admin
     * @return Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function update(Request $request, $id) : RedirectResponse
    {
        $admin = Admin::findOrFail($id);
        $request->validate([
            'name'  => ['required', 'string'],
            'email' => ['required', 'email', 'unique:admins,email,' . $id],
            'photo' => ['nullable', 'image', 'mimes:png,jpg,jpeg,gif'],
        ]);

        //Upload Image
        $photoPathDatabase = $admin->profile_photo_path;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $dir = 'profile-photos';
            $disk = Storage::disk('public');
            $genName = date('ymdhisa') . uniqid() . '.' . $extension;
            //Check And Make Directory
            if (!$disk->exists('profile-photos')) {
                $disk->makeDirectory('profile-photos');
            }
            //Store Image
            $image = Image::make($file)->stream();
            $disk->put($dir . '/' . $genName, $image);
            //Check And Delete Old File
            if ($disk->exists($admin->profile_photo_path)) {
                $disk->delete($admin->profile_photo_path);
            }
            //Profile Photo Path For Database
            $photoPathDatabase = $dir . '/' . $genName;
        }
        try {
            $admin->update([
                'name'               => $request->name,
                'email'              => $request->email,
                'profile_photo_path' => $photoPathDatabase,
            ]);
            Toastr::success('Profile Updated!!','Success',['options']);
        }catch (\Exception $e){
            Toastr::error($e->getMessage(),'Error',['options']);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Admin $admin
     * @return Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
