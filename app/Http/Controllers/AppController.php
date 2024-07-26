<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Image;

class AppController extends Controller
{
    public function dashboard()
    {
        return view('dashboard', ['messages' => Message::all(), 'images' => Image::all()]);
    }
}
