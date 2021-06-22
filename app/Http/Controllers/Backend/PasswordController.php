<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Admin;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    // Show Change Password Form
    public function index()
    {
        return view('backend.profile.change-password');
    }

    //Update Password
    public function update(Request $request) : RedirectResponse
    {
        $request->validate([
            'currentPass' => ['required', 'string', 'min:3',],
            'password' => ['required', 'string', 'min:3', 'confirmed',],
            'password_confirmation' => ['required', 'string', 'min:3',],
        ]);

        $user = Admin::findOrfail(Auth::id());

        if ($request->currentPass == $request->password) {
            Toastr::error('Current Password And New Password Are Same!!', 'Error', ['options']);
            return back();
        }

        if (!Hash::check($request->currentPass, $user->password)) {
            Toastr::error('Password Doesn\'t Matched!!', 'Error', ['options']);
            return back();
        }

        try {
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            Toastr::success('Password Updated!', 'Success', ['options']);
        } catch (\Exception $e) {
            Toastr::error($e->getMessage(), 'Error', ['options']);
        }
        return back();
    }
}
