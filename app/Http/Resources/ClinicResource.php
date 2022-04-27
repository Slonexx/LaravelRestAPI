<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClinicResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'Name_Clinic' => $this->Name_Clinic,
            'Address' => $this->Address,
            'photo_id' => $this->photo_id,
            'Doctors' => DoctorResource::collection($this->DoctorList),
        ];
    }
}
