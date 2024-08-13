<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'price_formatted' => '$' . number_format($this->price, 2),
            'brand' => $this->brand,
            'weight' => $this->weight,
            'category' => CategoryResource::make($this->category),
            'description' => $this->description,
        ];
    }
}
