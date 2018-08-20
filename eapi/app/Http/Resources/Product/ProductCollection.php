<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//         return parent::toArray($request);

        return [
          'name' => $this->name,
          'totalPrice' => $this->price,
          'stock' => $this->stock == 0 ? 'No stock available' : $this->stock,
          'rating' => $this->reviews->count() > 0 ?
          round($this->reviews->sum('star')/$this->reviews->count()) : 'No rating',
          'discount' => $this->discount,
          'href' => [
            'link' => route('products.show', $this->id) // Shows an individual product from the show method
          ]

        ];

    }


}
