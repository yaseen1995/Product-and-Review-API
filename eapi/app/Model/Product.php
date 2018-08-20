<?php

namespace App\Model;

use App\Model\Review;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [

      'name','detail','stock','price','discount'

    ];

    Public function reviews() {

      return $this->hasMany(Review::class); // A product has many reviews, hence the foreign key in the review class

    }
}
