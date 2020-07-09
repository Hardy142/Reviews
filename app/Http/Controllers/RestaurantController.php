<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            if($request->country == null || $request->province_state == null || $request->country == null) {

                $restaurants = Restaurant::orderBy('name')->where('name', 'LIKE', '%' . $request->name . '%')->get();

                return response()->json(['restaurants' => $restaurants], 200);

            }else {

                $restaurants = Restaurant::orderBy('name')->where([
                    ['country', '=', $request->country],
                    ['province_state', '=', $request->province_state],
                    ['city', '=', $request->city],
                    ['name', 'LIKE', '%' . $request->name . '%']
                ])->get();
    
                return response()->json(['restaurants' => $restaurants], 200);
                
            }

        }else {
            abort(404);
        }
    }

    public function show(Restaurant $restaurant)
    {

        return view('restaurants.show', ['restaurant' => $restaurant]);

    }

    public function create()
    {

        return view('restaurants.create');

    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'featured_image' => 'required',
            'country' => 'required',
            'province_state' => 'required',
            'city' => 'required'
        ]);
        
        $image = $request->featured_image;
        $imageName = $image->getClientOriginalName();
        $image->move(base_path('../images/uploads/restaurants'), $imageName);
        $path = url( '/images/uploads/restaurants/' ) . $imageName;

        $restaurant = Restaurant::create([
            'name' => $request->name,
            'featured_image' => $path,
            'country' => $request->country,
            'province_state' => $request->province_state,
            'city' => $request->city
        ]);
        
        

        return redirect( url( '/restaurants/' . $restaurant->id ) );

    }
}
