<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class AppController extends Controller
{
    public function dashboard()
    {
        return view('dashboard', ['messages' => Message::all()]);
    }
}
