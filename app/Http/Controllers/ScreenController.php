<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Message;
use App\Models\Module;
use App\Models\Video;

class ScreenController extends Controller
{
    public function showScreen()
    {
        $turns = Module::first();

        $dataRestrict = $turns->restrict;

        $disabledModules = json_decode($dataRestrict, true);
        return view('homeView.videos', ['images' => Image::all(), 'turns' => $turns, 'disabledModules' => $disabledModules, 'videos' => Video::all(), 'messages' => Message::all()]);
    }
}
