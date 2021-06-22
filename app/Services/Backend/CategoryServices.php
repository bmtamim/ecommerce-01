<?php

namespace App\Services\Backend;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryServices
{
    //Store Image
    public static function storeImage($name, $file)
    {
        $fileName = Str::slug($name) . '-' . date('ydmhisa') . '-' . uniqid() . '.' . $file->getClientOriginalExtension();

        $disk = Storage::disk('public');

        if (!$disk->exists('category')) {
            $disk->makeDirectory('category');
        }

        $image  = Image::make($file)->stream();

        $disk->put('category/' . $fileName, $image);

        return $fileName;
    }

    //Update Image
    public static function updateImage($name, $file, $oldImage)
    {
        $fileName = Str::slug($name) . '-' . date('ydmhisa') . '-' . uniqid() . '.' . $file->getClientOriginalExtension();

        $disk = Storage::disk('public');

        if (!$disk->exists('category')) {
            $disk->makeDirectory('category');
        }

        $image  = Image::make($file)->stream();

        $disk->put('category/' . $fileName, $image);

        if ($disk->exists('category/' . $oldImage)) {
            $disk->delete('category/' . $oldImage);
        }

        return $fileName;
    }
}
