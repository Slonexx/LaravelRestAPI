<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RenderServiceResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'Diagnosis' => $this->Diagnosis,
            'Appointment' => $this->Appointment,
            'Add_Info' => $this->Add_Info,
            'Animal_Cards_id' => $this->Animal_Cards_id,
            'Service_id' => $this->Service_id,
            'Doctor_id' => $this->Doctor_id,
            'Time_Of_Receipts_id' => $this->Time_Of_Receipts_id,
        ];
    }
}
