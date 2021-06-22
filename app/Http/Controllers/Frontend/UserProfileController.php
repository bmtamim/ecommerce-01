<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('frontend.user.account-details');
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
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name'            => ['required', 'string'],
            'email'           => ['required', 'email', 'unique:users,email,' . $id],
            'phone'           => ['required', 'string', 'unique:users,phone,' . $id],
            'photo'           => ['nullable', 'image', 'mimes:png,jpg,jpeg,gif', 'max:512'],
            'currentPassword' => ['nullable', 'string'],
            'newPassword'     => ['nullable', 'string'],
            'confirmPassword' => ['nullable', 'string', 'same:newPassword'],
        ]);
        //Image Mechanism
        $profilePhotoPath = Auth::user()->profile_photo_path;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $genName = 'user' . Auth::id() . '-' . date('ydmhisa') . '-' . uniqid() . '.' . $extension;
            $disk = Storage::disk('public');
            $path = 'profile-photos';
            //Check And Make Directory
            if (!$disk->exists($path)) {
                $disk->makeDirectory($path);
            }
            //Initialize Image
            $image = Image::make($file)->stream();
            //Upload Image
            $disk->put($path . '/' . $genName, $image);
            $profilePhotoPath = $path . '/' . $genName;
            //Check And Delete Old Image
            if ($disk->exists(Auth::user()->profile_photo_path)) {
                $disk->delete(Auth::user()->profile_photo_path);
            }
        }

        //Password Mechanism
        $password = Auth::user()->password;
        if ($request->currentPassword != null && $request->newPassword != null) {
            //Check Current And New Password Same Or Not
            if ($request->currentPassword == $request->newPassword) {
                return back()->with('accountMsg', 'Current Password And New Password Are Same!!');
            }
            //Check Current Password Matched Or not
            if (!Hash::check($request->currentPassword, $password)) {
                return back()->with('accountMsg', 'Current Password Doesn\'t Matched!!');
            }
            $password = Hash::make($request->newPassword);
        }

        Auth::user()->update([
            'name'               => $request->name,
            'email'              => $request->email,
            'phone'              => $request->phone,
            'password'           => $password,
            'profile_photo_path' => $profilePhotoPath,
        ]);

        return back()->with('accountMsg', 'Success, Save Changed!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
