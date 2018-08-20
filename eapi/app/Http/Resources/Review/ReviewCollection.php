<?php

namespace App\Http\Resources\Review;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ReviewCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
          'id' => $request->id,
          'product_id' => $request->product_id,
          'customer' => $request->customer,
          'review' => $request->review,
          'star' => $request->star
        ];
    }

    public function with($request) {
      return [
        'version' => '1.0.0',
        'author_url' => url('www.iamcarwash.com')
      ];
    }
}
