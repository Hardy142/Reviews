<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['title', 'description', 'user_id', 'restaurant_id', 'rating'];

    protected $dates = ['created_at'];

    public function get_author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function get_restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id');
    }
}
