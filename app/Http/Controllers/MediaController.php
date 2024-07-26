<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function storeImage(Request $request)
    {

        $image = '';

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $image = $path;
        }

        Image::create([
            'name' => $image,
        ]);

        return redirect()->back();
    }

    public function deleteImage($id)
    {

        $image = Image::find($id);

        if ($image) {
            if (Storage::disk('public')->exists($image->name)) {
                Storage::disk('public')->delete($image->name);
            }

            Image::destroy($id);
        }

        return redirect()->back();
    }
}
