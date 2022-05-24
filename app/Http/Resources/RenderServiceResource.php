<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RenderServiceResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'Animal_card_id' => $this->Animal_card_id,
            'Service_id' => $this->Service_id,
            'Doctor_id' => $this->Doctor_id,
            'Time_Of_Receipts_id' => $this->Time_Of_Receipts_id,
        ];
    }
}
