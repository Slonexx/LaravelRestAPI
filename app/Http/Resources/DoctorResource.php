<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'Name_Doctor' => $this->Name_Doctor,
            'Speciality' => $this->Speciality,
            'URL_Picture' => $this->URL_Picture,
            'Clinic_id' => $this->Clinic_id,
        ];
    }
}
