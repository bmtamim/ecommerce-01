<?php


namespace App\Actions\Backend;


use App\Models\HomeSlider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class HomeSliderAction
{
    public function create($request)
    {
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = self::saveImage($request->file('image'), $request->title);
        }
        self::saveDataToDatabase($request, $imageName);
    }

    //Home Slider Image Save into Public Storage When the data will insert
    public static function saveImage($file, $title): string
    {
        $imageName = Str::slug($title) . '-' . date('ymdhis') . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
        //Check And Make Directory
        $disk = Storage::disk('public');
        if (!$disk->exists('sliders/home')) {
            $disk->makeDirectory('sliders/home');
        }
        //Resize Image
        $image = Image::make($file)->resize(870, 370)->stream();
        //Save To Storage
        $disk->put('sliders/home/' . $imageName, $image);
        return $imageName;
    }

    //Save Slider data into database
    public static function saveDataToDatabase($request, $imageName)
    {
        HomeSlider::create([
            'admin_id'    => Auth::id(),
            'title'       => $request->title,
            'sub_title'   => $request->sub_title,
            'description' => $request->description,
            'image'       => $imageName,
            'btn_text'    => $request->btn_text,
            'btn_link'    => $request->btn_link,
            'status'      => $request->filled('status'),
        ]);
    }


    //Update
    public function update($request, $homeSlider)
    {
        $imageName = $homeSlider->image;
        if ($request->hasFile('image')) {
            $imageName = self::updateImage($request->file('image'), $request->title, $homeSlider);
        }
        self::updateDataOnDatabase($homeSlider, $request, $imageName);
    }

    //Home Slider Image Save into Public Storage When the data will insert
    public static function updateImage($file, $title, $homeSlider): string
    {
        $imageName = Str::slug($title) . '-' . date('ymdhis') . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
        //Check And Make Directory
        $disk = Storage::disk('public');
        if (!$disk->exists('sliders/home')) {
            $disk->makeDirectory('sliders/home');
        }
        //Resize Image
        $image = Image::make($file)->resize(870, 370)->stream();
        //Save To Storage
        $disk->put('sliders/home/' . $imageName, $image);
        //Check And Delete old Image
        if ($disk->exists('sliders/home/' . $homeSlider->image)) {
            $disk->delete('sliders/home/' . $homeSlider->image);
        }
        return $imageName;
    }

    //Update Slider data on database
    public function updateDataOnDatabase($homeSlider, $request, $imageName)
    {
        $homeSlider->update([
            'admin_id'    => Auth::id(),
            'title'       => $request->title,
            'sub_title'   => $request->sub_title,
            'description' => $request->description,
            'image'       => $imageName,
            'btn_text'    => $request->btn_text,
            'btn_link'    => $request->btn_link,
            'status'      => $request->filled('status'),
        ]);
    }
}
