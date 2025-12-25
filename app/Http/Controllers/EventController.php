<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
{
    if (Auth::user()->role !== 'admin') abort(403);

    $events = Event::latest()->get();
    return view('admin.event.index', compact('events'));
}


    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_event' => 'required'
        ]);

        Event::create($request->all());

        return redirect()->route('event.index')
            ->with('success', 'Event berhasil ditambahkan');
    }

    public function edit(Event $event)
    {
        return view('admin.event.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $event->update($request->all());

        return redirect()->route('event.index')
            ->with('success', 'Event berhasil diperbarui');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return back()->with('success', 'Event berhasil dihapus');
    }
}
