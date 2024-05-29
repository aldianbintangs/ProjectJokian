<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventVisitorController extends Controller
{
    public function index()
    {
        return view('event');
    }

    public function getEvents(Request $request)
    {
        // Ambil parameter tanggal dari permintaan
        $date = $request->input('date');

        // Validasi format tanggal (optional)
        if (!\DateTime::createFromFormat('Y-m-d', $date)) {
            return response()->json(['error' => 'Invalid date format'], 400);
        }

        // Filter data event berdasarkan tanggal
        $events = Event::whereDate('event_date', '=', $date)->get();

        // Kirim data yang difilter sebagai respons
        return response()->json($events);
    }
}
