<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Review;
use App\Restaurant;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   

        $user = Auth::user();

        $reviews = Review::orderBy('created_at', 'DESC')->where('user_id', $user->id)->paginate(4);

        $restaurants = Restaurant::all();

        return view('users/dashboard', ['reviews' => $reviews]);

    }
}
