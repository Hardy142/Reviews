<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = ['name', 'featured_image', 'country', 'province_state', 'city'];

    public function get_reviews()
    {
        return $this->hasMany(Review::class, 'restaurant_id');
    }

    // Gets Review Count (( 0.5-2.0 Ratings ))
    public function get_ratings_count_low()
    {
        return $this->hasMany(Review::class, 'restaurant_id')->where([
            ['rating', '>', 0],
            ['rating', '=<', 2]
        ]);
    }

    // Gets Review Count (( 2.5-3.5 Ratings ))
    public function get_ratings_count_med()
    {
        return $this->hasMany(Review::class, 'restaurant_id')->where([
            ['rating', '>', 2],
            ['rating', '<', 4]
        ]);
    }

    // Gets Review Count (( 4.0-5.0 Ratings ))
    public function get_ratings_count_high()
    {
        return $this->hasMany(Review::class, 'restaurant_id')->where('rating', '>=', 4);
    }
}
