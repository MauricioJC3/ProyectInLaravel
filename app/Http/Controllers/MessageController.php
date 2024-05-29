<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('messages.index', compact('messages'));
    }

    public function create()
    {
        return view('messages.create');
    }

    public function store(Request $request)
    {
        $message = Message::create($request->all());
        return redirect()->route('messages.index');
    }

    public function edit($id)
    {
        $message = Message::find($id);
        return view('messages.edit', compact('message'));
    }

    public function update(Request $request, $id)
    {
        $message = Message::find($id);
        $message->update($request->all());
        return redirect()->route('messages.index');
    }

    public function destroy($id)
    {
        $message = Message::find($id);
        $message->delete();
        return redirect()->route('messages.index');
    }
}
