<?php

namespace App\Services\Backend;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BrandServices
{
    //Store Image 
    public static function storeImage($name, $file)
    {
        $imageName = Str::slug($name) . '-' . date('ydmhisa') . '-' . uniqid() . '.' . $file->getClientOriginalExtension();

        $disk = Storage::disk('public');

        //Check And Make Directroy
        if (!$disk->exists('brand')) {
            $disk->makeDirectory('brand');
        }

        $image = Image::make($file)->stream();

        //Save Image
        $disk->put('brand/' . $imageName, $image);

        return $imageName;
    }

    //Update Image
    public static function updateImage($name, $file, $oldImage)
    {
        $imageName = Str::slug($name) . '-' . date('ydmhisa') . '-' . uniqid() . '.' . $file->getClientOriginalExtension();

        $disk = Storage::disk('public');

        //Check And Make Directroy
        if (!$disk->exists('brand')) {
            $disk->makeDirectory('brand');
        }

        $image = Image::make($file)->stream();

        //Save Image
        $disk->put('brand/' . $imageName, $image);

        //Delete old image
        if ($disk->exists('brand/' . $oldImage)) {
            $disk->delete('brand/' . $oldImage);
        }

        return $imageName;
    }
}
