<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return [

        'id' => $this->id,
        'name' => $this->name,
        'detail' => $this->detail,
        'price' => $this->price,
        'stock' => $this->stock == 0 ? 'No stock available' : $this->stock,
        'discount' => $this->discount,
        'rating' => $this->reviews->count() > 0 ?
        round($this->reviews->sum('star')/$this->reviews->count()) : 'No rating',
        'href' => [
          'reviews' => route('reviews.index', $this->id)
        ]

      ];
  }

  public function with($request) {
    return [
      'version' => '1.0.0',
      'author_url' => url('www.iamcarwash.com')
    ];
  }
}
