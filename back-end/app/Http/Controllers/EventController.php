<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
// use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Log;

// controller untuk mengelola data event
class EventController extends Controller
{
    public function index()
    {
        //untuk ngambil data event
        $events = Event::all();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        // return view create event
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        //validasi inputan
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'event_date' => 'required|date',
        ]);
        //simpan data event ke database
        Event::create($validatedData);
        //redirect ke halaman index event
        return redirect()->route('admin.events.index')->with('success', 'Event added successfully!');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'event_date' => 'required|date',
        ]);

        $event->update($validatedData);

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully!');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully!');
    }

    // public function userIndex()
    // {
    //     $events = Event::orderBy('event_date', 'asc')->get();
    //     return view('events.index', compact('events'));
    // }
}
