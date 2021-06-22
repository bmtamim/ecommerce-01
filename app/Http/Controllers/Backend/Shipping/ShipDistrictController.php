<?php

namespace App\Http\Controllers\Backend\Shipping;

use App\Http\Controllers\Controller;
use App\Models\ShipCountry;
use App\Models\ShipDistrict;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ShipDistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $districts = ShipDistrict::latest('id')->get();
        $countries = ShipCountry::orderBy('country_name', 'ASC')->with('divisions')->get();
        $divisions = $countries->first()->divisions;
        return view('backend.shipping.district', compact('districts','countries', 'divisions'));
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
        $request->validate([
            'country'  => ['required', 'integer'],
            'division' => ['required', 'integer'],
            'name'     => ['required', 'string'],
        ]);

        try {
            ShipDistrict::insert([
                'country_id'    => $request->country,
                'division_id'   => $request->division,
                'district_name' => $request->name,
                'created_at'    => Carbon::now(),
            ]);
            Toastr::success('Shipping District Added!!', 'Success', ['options']);
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
    public function edit($id): View
    {
        $districts = ShipDistrict::latest('id')->get();
        $countries = ShipCountry::orderBy('country_name', 'ASC')->with('divisions')->get();
        $divisions = $countries->first()->divisions;
        $editDistrict = ShipDistrict::findOrFail($id);
        return view('backend.shipping.district', compact('districts','countries', 'divisions','editDistrict'));
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
        $district = ShipDistrict::findOrFail($id);
        $request->validate([
            'country'  => ['required', 'integer'],
            'division' => ['required', 'integer'],
            'name'     => ['required', 'string'],
        ]);

        try {
            $district->update([
                'country_id'    => $request->country,
                'division_id'   => $request->division,
                'district_name' => $request->name,
            ]);
            Toastr::success('Shipping District Updated!!', 'Success', ['options']);
        } catch (\Exception $e) {
            Toastr::erorr($e->getMessage(), 'Error', ['options']);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ShipDistrict $district
     * @return RedirectResponse
     */
    public function destroy(ShipDistrict $district) : RedirectResponse
    {
        try {
            $district->delete();
            Toastr::success('Shipping District Deleted!!', 'Success', ['options']);
        } catch (\Exception $e) {
            Toastr::erorr($e->getMessage(), 'Error', ['options']);
        }
        return redirect()->route('admin.shipping.district.index');
    }
}
