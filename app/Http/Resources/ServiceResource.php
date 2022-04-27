<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'Name_Service' => $this->Name_Service,
            'Descriptions' => $this->Descriptions,
            'Doctor_id' => $this->Doctor_id,
        ];
    }
}
