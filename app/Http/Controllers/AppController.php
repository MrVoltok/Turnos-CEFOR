<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Image;
use App\Models\Video;
use App\Models\Module;
use App\Models\Transmition;

class AppController extends Controller
{
    public function dashboard()
    {
        return view('dashboard', ['messages' => Message::all(), 'images' => Image::all(), 'videos' => Video::all(), 'modules' => Module::first(), 'transmition' => Transmition::first()]);
    }
}
