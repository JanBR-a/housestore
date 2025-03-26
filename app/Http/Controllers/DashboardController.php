<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();

        $reservations = Reservation::where('user_id', $user_id)->get();

        return view('dashboard', ['reservations' => $reservations]);
    }
}
