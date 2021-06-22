<?php

namespace App\Http\Controllers\Backend;

use App\Actions\Backend\ProductInsertAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $products = Product::latest()->get();

        return view('backend.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): View
    {
        $categories = Category::latest()->active()->get();
        $brands = Brand::latest()->active()->get();
        return view('backend.product.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     * @param ProductRequest $request
     * @param ProductInsertAction $productInsertAction
     * @return RedirectResponse
     */
    public function store(ProductRequest $request, ProductInsertAction $productInsertAction): RedirectResponse
    {
        try {
            $productInsertAction->create($request);
            Toastr::success('Product Added!!', 'Success', ['options']);
        } catch (\Exception $e) {
            Toastr::error($e->getMessage(), 'Failed', ['options']);
        }
        return back();
    }


    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function edit(Product $product): View
    {
        $categories = Category::latest()->active()->get();
        $brands = Brand::latest()->active()->get();
        return view('backend.product.edit', compact('product', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param Product $product
     * @return Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        //Save Product Image
        $imageName = $product->image;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            //Generate Image Unique Name
            $imageName = Str::slug($request->title) . '-' . date('ymdhis') . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            //Check And Make Directory
            $disk = Storage::disk('public');
            if (!$disk->exists('products')) {
                $disk->makeDirectory('products');
            }
            //Save Image In Database
            $imageStream = Image::make($file)->stream();
            $disk->put('products/' . $imageName, $imageStream);
            //Delete Old Image
            if ($disk->exists('products/' . $product->image)) {
                $disk->delete('products/' . $product->image);
            }
        }

        $galleryImageNames = [];
        if ($request->hasFile('image_gallery')) {
            $files = $request->file('image_gallery');
            $images_num = count($files);
            for ($i = 0; $i < $images_num; $i++) {
                $galleryImageName = Str::slug($request->title) . '-product-gallery-' . date('ymdhis') . '-' . uniqid() . '.' . $files[$i]->getClientOriginalExtension();
                //Check And Make Directory
                $disk = Storage::disk('public');
                if (!$disk->exists('products/gallery')) {
                    $disk->makeDirectory('products/gallery');
                }
                $galleryStreamImage = Image::make($files[$i])->stream();
                $disk->put('products/gallery/' . $galleryImageName, $galleryStreamImage);
                $galleryImageNames[] = $galleryImageName;
            }
            foreach ($product->gallery_image as $gallery_image) {
                $disk = Storage::disk('public');
                //check and delete
                if ($disk->exists('products/gallery/' . $gallery_image->image)) {
                    $disk->delete('products/gallery/' . $gallery_image->image);
                }
            }
        }

        DB::transaction(function () use ($imageName, $request, $galleryImageNames, $product) {
            $product->update([
                'category_id'    => $request->category,
                'brand_id'       => $request->brand,
                'title'          => $request->title,
                'description'    => $request->description,
                'image'          => $imageName,
                'status'         => $request->filled('status'),
                'hot_deals'      => $request->filled('hot_deals'),
                'is_featured'    => $request->filled('is_featured'),
                'special_deals'  => $request->filled('special_deals'),
                'special_offers' => $request->filled('special_offers'),
                'onsale'         => $request->sale_price ? true : false,
            ]);

            $product->meta()->update([
                'regular_price'  => $request->regular_price,
                'sale_price'     => $request->sale_price,
                'sale_start'     => Carbon::parse($request->sale_start),
                'sale_end'       => Carbon::parse($request->sale_end),
                'manage_stock'   => $request->filled('manage_stock'),
                'stock_status'   => $request->stock_status,
                'stock_quantity' => $request->stock_quantity,
            ]);

            if (!empty($galleryImageNames)) {
                //Delete Old Image Data
                foreach ($product->gallery_image as $gallery_image_old) {
                    ProductGallery::findOrFail($gallery_image_old->id)->delete();
                }

                foreach ($galleryImageNames as $galleryImage) {
                    ProductGallery::create([
                        'product_id' => $product->id,
                        'image'      => $galleryImage,
                    ]);
                }

            }

        });
        Toastr::success('Product Updated!!', 'Success', ['options']);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return Response
     */
    public function destroy(Product $product)
    {
        $disk = Storage::disk('public');

        if ($disk->exists('products/' . $product->image)) {
            $disk->delete('products/' . $product->image);
        }

        foreach ($product->gallery_image as $gallery_image) {
            if ($disk->exists('products/gallery/' . $gallery_image->image)) {
                $disk->delete('products/gallery/' . $gallery_image->image);
            }
        }

        try {
            $product->delete();
            Toastr::success('Product Deleted!!', 'Success', ['options']);
        } catch (\Exception $e) {
            Toastr::error($e->getMessage(), 'Failed', ['options']);
        }
        return back();
    }
}
