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
            'photo_id' => $this->photo_id,
            'Service_id' => $this->Service_id,
            'Time' => TimeOfReceiptResource::collection($this->TimeList),
        ];
    }
}
