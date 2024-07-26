<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Video;
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

    public function storeVideo(Request $request)
    {

        $video = '';

        if ($request->hasFile('video')) {
            $path = $request->file('video')->store('videos', 'public');
            $video = $path;
        }

        Video::create([
            'name' => $video,
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

    public function deleteVideo($id)
    {

        $video = Video::find($id);

        if ($video) {
            if (Storage::disk('public')->exists($video->name)) {
                Storage::disk('public')->delete($video->name);
            }

            Video::destroy($id);
        }

        return redirect()->back();
    }
}
