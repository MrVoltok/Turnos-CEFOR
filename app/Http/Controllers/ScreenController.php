<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Message;
use App\Models\Module;
use App\Models\Video;
use App\Models\Screen;
use App\Models\Transmition;
use Illuminate\Support\Facades\DB;

class ScreenController extends Controller
{
    public function showScreen()
    {
        $turns = Module::first();

        $dataRestrict = $turns->restrict;

        $disabledModules = json_decode($dataRestrict, true);

        $screenOpt = Screen::first();

        if ($screenOpt->screenView == 'img') {
            return view('home', ['images' => Image::all(), 'turns' => $turns, 'disabledModules' => $disabledModules]);
        }

        return view('homeView.videos', ['images' => Image::all(), 'turns' => $turns, 'disabledModules' => $disabledModules, 'videos' => Video::all(), 'messages' => Message::all(), 'screen' => Screen::first(), 'stream' => Transmition::first()]);
    }

    public function selectView(Request $request)
    {
        $options = ['img', 'video', 'stream'];

        if (!in_array($request->screen, $options)) {
            return redirect()->back();
        }

        $data = $request->screen;

        DB::table('screens')->update(
            [
                'screenView' => $data,
            ]
        );

        return redirect()->back();
    }
}
