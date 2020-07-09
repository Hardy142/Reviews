<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Restaurant;

class ReviewController extends Controller
{   
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $rating = $request->value;

            if( $rating  == 'all' ) {

                $reviews = Review::where('restaurant_id', '=', $request->id)->with('get_author')->get();

            }elseif( $rating  == 'high' ) {

                $reviews = Review::where([
                    ['restaurant_id', '=', $request->id],
                    ['rating', '>=', 4]
                ])->with('get_author')->get();

            }elseif( $rating  == 'med' ) {

                $reviews = Review::where([
                    ['restaurant_id', '=', $request->id],
                    ['rating', '>', 2],
                    ['rating', '<', 4]
                ])->with('get_author')->get();

            }elseif( $rating  == 'low' ) {

                $reviews = Review::where([
                    ['restaurant_id', '=', $request->id],
                    ['rating', '<=', 2]
                ])->with('get_author')->get();

            }

            return response()->json(['reviews' => $reviews], 200);

        }
    }

    public function store()
    {

        Review::create(request()->validate([
            'title' => 'required',
            'description' => 'required',
            'rating' => '',
            'user_id' => '',
            'restaurant_id' => ''
        ]));

        return redirect('/dashboard');

    }
}
