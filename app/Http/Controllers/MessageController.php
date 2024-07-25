<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        Message::create([
            'message' => $request->message
        ]);
        return redirect()->back();
    }

    public function update($message, Request $request)
    {
        $messageNew = Message::find($message);
        $messageNew->message = $request->message;

        $messageNew->save();

        return redirect()->back();
    }

    public function delete($message)
    {
        Message::destroy($message);

        return redirect()->back();
    }
}
