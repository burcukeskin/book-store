<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'author' => $this->author,
            'image' => $this->image,
            'price' => $this->price,
        ];
    }
}

