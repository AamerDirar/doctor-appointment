<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        date_default_timezone_set('Asia/Riyadh');

        if ($request->date) {
            $bookings = Booking::latest()->where('date', $request->date)->get();
            return view('admin.patientlist.index', compact('bookings'));
        }

        $bookings = Booking::latest()->where('date', date('Y-m-d'))->get();
        return view('admin.patientlist.index', compact('bookings'));
    }

    public function toggleStatus($id)
    {
        $booking  = Booking::find($id);
        $booking->status = !$booking->status;
        $booking->save();
        return redirect()->back();
    }

    public function allTimeAppointment()
    {
        $bookings = Booking::latest()->paginate(10);
        return view('admin.patientlist.all', compact('bookings'));
    }
}
