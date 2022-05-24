<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResouce extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'photo_id' => $this->photo_id,
            'phone' => $this->phone,
            'email' => $this->email,
            'Animal' => AnimalResource::collection($this->AnimalList),
        ];
    }
}
