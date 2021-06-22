<?php

namespace App\Http\Controllers\Backend;

use App\Actions\Backend\HomeSliderAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\HomeSliderRequest;
use App\Models\HomeSlider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class HomeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $sliders = HomeSlider::latest()->get();
        return view('backend.sliders.home.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('backend.sliders.home.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param HomeSliderRequest $request
     * @param HomeSliderAction $homeSliderAction
     * @return RedirectResponse
     */
    public function store(HomeSliderRequest $request, HomeSliderAction $homeSliderAction): RedirectResponse
    {
        try {
        	
            $homeSliderAction->create($request);

            Toastr::success('Slider Item Added!!', 'Success', ['options']);

        } catch (\Exception $e) {

            Toastr::error($e->getMessage(), 'failed', ['options']);

        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param HomeSlider $homeSlider
     * @return Response
     */
    public function show(HomeSlider $homeSlider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param HomeSlider $homeSlider
     * @return View
     */
    public function edit(HomeSlider $homeSlider): View
    {
        return view('backend.sliders.home.edit', compact('homeSlider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param HomeSliderRequest $request
     * @param HomeSlider $homeSlider
     * @param HomeSliderAction $homeSliderAction
     * @return RedirectResponse
     */
    public function update(HomeSliderRequest $request, HomeSlider $homeSlider, HomeSliderAction $homeSliderAction): RedirectResponse
    {
        try {
            $homeSliderAction->update($request, $homeSlider);
            Toastr::success('Slider Item Updated!!', 'Success', ['options']);
        } catch (\Exception $e) {
            Toastr::error($e->getMessage(), 'failed', ['options']);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param HomeSlider $homeSlider
     * @return RedirectResponse
     */
    public function destroy(HomeSlider $homeSlider): RedirectResponse
    {
        try {
            $disk = Storage::disk('public');
            if ($disk->exists('sliders/home/' . $homeSlider->image)) {
                $disk->delete('sliders/home/' . $homeSlider->image);
            }

            $homeSlider->delete();

            Toastr::success('Slider Item Deleted!!', 'Success', ['options']);
        } catch (\Exception $e) {
            Toastr::error($e->getMessage(), 'failed', ['options']);
        }
        return back();
    }
}
