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
            'URL_Picture' => $this->URL_Picture,
            'Doctors' => DoctorResource::collection($this->DoctorList),
            'Service' => ServiceResource::collection($this->ServiceList),
        ];
    }
}
