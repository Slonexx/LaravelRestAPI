<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'Name_Service' => $this->Name_Service,
            'Descriptions' => $this->Descriptions,
            'Clinic_id' => $this->Clinic_id,
            'Doctor' => DoctorResource::collection($this->DoctorList),
        ];
    }
}
