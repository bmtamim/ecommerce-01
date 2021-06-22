<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCouponRequest;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index() :View
    {
        $coupons = Coupon::latest()->paginate(10);
        return view('backend.coupon.index',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('backend.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCouponRequest $request
     * @return RedirectResponse
     */
    public function store(StoreCouponRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        //Date Time Formatting And Value Initialize
        $validated['coupon_enable'] = Carbon::parse($validated['coupon_enable']);
        $validated['coupon_expiry'] = Carbon::parse($validated['coupon_expiry']);
        $validated['individual_use'] = $request->filled('individual_use');
        $validated['exclude_sale'] = $request->filled('exclude_sale');

        Coupon::create($validated);

        return back()->with('msg', 'Coupon Created!!');
    }

    /**
     * Display the specified resource.
     *
     * @param Coupon $coupon
     * @return Response
     */
    public function show(Coupon $coupon): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Coupon $coupon
     * @return View
     */
    public function edit(Coupon $coupon): View
    {
        return view('backend.coupon.edit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreCouponRequest $request
     * @param Coupon $coupon
     * @return RedirectResponse
     */
    public function update(StoreCouponRequest $request, Coupon $coupon): RedirectResponse
    {
        $validated = $request->validated();

        //Date Time Formatting And Value Initialize
        $validated['coupon_enable'] = Carbon::parse($validated['coupon_enable']);
        $validated['coupon_expiry'] = Carbon::parse($validated['coupon_expiry']);
        $validated['individual_use'] = $request->filled('individual_use');
        $validated['exclude_sale'] = $request->filled('exclude_sale');

        $coupon->update($validated);

        return back()->with('msg', 'Coupon Updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Coupon $coupon
     * @return RedirectResponse
     */
    public function destroy(Coupon $coupon): RedirectResponse
    {
        $coupon->delete();
        return redirect()->route('admin.coupons.index')->with('msg','Coupon Deleted!!');
    }
}
