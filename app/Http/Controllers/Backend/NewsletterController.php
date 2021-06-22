<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index() : View
    {
        $subscribers = Newsletter::latest()->paginate(30);
        return view('backend.newslatter.index',compact('subscribers'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Newsletter $subscriber
     * @return RedirectResponse
     */
    public function destroy(Newsletter $subscriber) :RedirectResponse
    {
        $subscriber->delete();
        return back()->with('msg','Subscriber Removed');
    }
}
