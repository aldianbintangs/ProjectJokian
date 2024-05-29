<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Log;

class EventVisitorController extends Controller
{
    public function index()
    {
        return view('event');
    }
    public function getEvents(Request $request)
    {
        //validasi inputan
        $date = $request->input('date');
        //validasi format tanggal
        if (!\DateTime::createFromFormat('Y-m-d', $date)) {
            return response()->json(['error' => 'Invalid date format'], 400);
        }
        //ngambil data event berdasarkan tanggal
        $events = Event::whereDate('event_date', '=', $date)->get();
        Log::info('Events found: ' . $events->count());
        return response()->json($events);
    }
}
