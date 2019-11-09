<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return arrayy
     */
    public function toArray($request)
    {
        return [
            'name'          => $this->name,
            'total_price'   => round($this->price - ($this->price*$this->discount/100),2),
            'rating'        => $this->reviews->count() > 0 
            ? round($this->reviews->sum('star')/$this->reviews->count(),2) : 'No Rating Yet',
            'href'          => [
                'link'   => route('products.show', $this->id)
            ],
        ];
    }
}
