<?php

namespace App\Http\Resources;

use App\Models\RenderServices;
use Illuminate\Http\Resources\Json\JsonResource;

class AnimalResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'Nickname_Animal' => $this->Nickname_Animal,
            'Type_Animal' => $this->Type_Animal,
            'Age_Animal' => $this->Age_Animal,
            'User_id' => $this->User_id,
            'Render' => RenderServiceResource::collection($this->RenderList),
        ];
    }
}
