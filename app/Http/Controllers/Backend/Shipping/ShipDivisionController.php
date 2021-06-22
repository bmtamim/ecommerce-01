<?php

namespace App\Http\Controllers\Backend\Shipping;

use App\Http\Controllers\Controller;
use App\Models\ShipCountry;
use App\Models\ShipDivision;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ShipDivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $divisions = ShipDivision::latest('id')->with('country')->get();
        $countries = ShipCountry::orderBy('country_name','ASC')->get();
        return view('backend.shipping.division', compact('divisions','countries'));
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
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'country' => ['required', 'integer'],
            'name'    => ['required', 'string'],
        ]);

        try {
            ShipDivision::insert([
                'country_id'    => $request->country,
                'division_name' => $request->name,
                'created_at'    => Carbon::now(),
            ]);
            Toastr::success('Shipping Division Added!!', 'Success', ['options']);

        } catch (\Exception $e) {
            Toastr::erorr($e->getMessage(), 'Error', ['options']);
        }

        return back();
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
     * @return View
     */
    public function edit($id) : View
    {
        $editDivision = ShipDivision::findOrFail($id);
        $divisions = ShipDivision::latest('id')->with('country')->get();
        $countries = ShipCountry::orderBy('country_name','ASC')->get();
        return view('backend.shipping.division', compact('divisions','countries','editDivision'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $division = ShipDivision::findOrFail($id);
        $request->validate([
            'country' => ['required', 'integer'],
            'name'    => ['required', 'string'],
        ]);

        try {
            $division->update([
                'country_id'    => $request->country,
                'division_name' => $request->name,
            ]);
            Toastr::success('Shipping Division Updated!!', 'Success', ['options']);

        } catch (\Exception $e) {
            Toastr::erorr($e->getMessage(), 'Error', ['options']);
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ShipDivision $division
     * @return RedirectResponse
     */
    public function destroy(ShipDivision $division): RedirectResponse
    {
        try {
            $division->delete();
            Toastr::success('Shipping Division Updated!!', 'Success', ['options']);

        } catch (\Exception $e) {
            Toastr::erorr($e->getMessage(), 'Error', ['options']);
        }

        return redirect()->route('admin.shipping.division.index');
    }
}
