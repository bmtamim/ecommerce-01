<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class NewsletterController extends Controller
{
    private $agent;

    public function __construct()
    {
        $this->agent = new Agent();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'newsletter_email' => ['required', 'email', 'unique:newsletters,email'],
        ]);

        Newsletter::create([
            'email'   => $validate['newsletter_email'],
            'device'  => $this->agent->platform(),
            'browser' => $this->agent->browser(),
        ]);

        return back()->with('newsletterMsg', 'Your Gmail Added To Our Newsletter!!');
    }
}
