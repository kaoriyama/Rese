<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
            'date' => 'required|date',
            'time' => 'required',
            'number_of_guests' => 'required|integer|min:1',
        ]);

        $reservation = Reservation::create([
            'user_id' => auth()->id(),
            'restaurant_id' => $validatedData['restaurant_id'],
            'reservation_date' => $validatedData['date'],
            'reservation_time' => $validatedData['time'],
            'number_of_guests' => $validatedData['number_of_guests'],
            'status' => 'pending',
        ]);

        return redirect()->route('reservation.done');
    }

    public function cancel(Reservation $reservation)
    {
        // 予約をキャンセルする処理
        $reservation->delete();

        return redirect()->route('mypage')->with('success', '予約をキャンセルしました。');
    }
}