<?php


namespace App\Actions\Backend;

use App\Http\Requests\Backend\ProductRequest;
use App\Models\Product;
use App\Models\ProductGallery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductInsertAction
{
    public function create($request): bool
    {
        //Save Image
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = self::saveProductImage($request->file('image'), $request->title);
        }
        //Save Gallery Images
        $galleryImageNames = [];
        if ($request->hasFile('image_gallery')) {
            $galleryImageNames = self::saveProductGalleryImage($request->file('image_gallery'), $request->title);
        }

        //Save data To database
        self::insertToDatabase($imageName, $request, $galleryImageNames);

        return true;
    }

    public static function saveProductImage($file, $title): string
    {
        //Generate Image Unique Name
        $imageName = Str::slug($title) . '-' . date('ymdhis') . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
        //Check And Make Directory
        $disk = Storage::disk('public');
        if (!$disk->exists('products')) {
            $disk->makeDirectory('products');
        }
        //Save Image In Database
        $imageStream = Image::make($file)->stream();
        $disk->put('products/' . $imageName, $imageStream);

        return $imageName;
    }

    public static function saveProductGalleryImage($files, $title): array
    {
        $galleryImageNames = [];
        $images_num = count($files);
        for ($i = 0; $i < $images_num; $i++) {
            $galleryImageName = Str::slug($title) . '-product-gallery-' . date('ymdhis') . '-' . uniqid() . '.' . $files[$i]->getClientOriginalExtension();
            //Check And Make Directory
            $disk = Storage::disk('public');
            if (!$disk->exists('products/gallery')) {
                $disk->makeDirectory('products/gallery');
            }
            $galleryStreamImage = Image::make($files[$i])->stream();
            $disk->put('products/gallery/' . $galleryImageName, $galleryStreamImage);
            $galleryImageNames[] = $galleryImageName;
        }
        return $galleryImageNames;
    }

    public static function insertToDatabase($imageName, Request $request, $galleryImageNames)
    {
        DB::transaction(function () use ($imageName, $request, $galleryImageNames) {
            $product = Product::create([
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

            $product->meta()->create([
                'regular_price'  => $request->regular_price,
                'sale_price'     => $request->sale_price,
                'sale_start'     => Carbon::parse($request->sale_start),
                'sale_end'       => Carbon::parse($request->sale_end),
                'manage_stock'   => $request->filled('manage_stock'),
                'stock_status'   => $request->stock_status,
                'stock_quantity' => $request->stock_quantity,
            ]);

            if (!empty($galleryImageNames)) {
                foreach ($galleryImageNames as $galleryImage) {
                    ProductGallery::create([
                        'product_id' => $product->id,
                        'image'      => $galleryImage,
                    ]);
                }
            }
        });
    }
}
