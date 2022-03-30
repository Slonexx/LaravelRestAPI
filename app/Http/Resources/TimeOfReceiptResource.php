<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TimeOfReceiptResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'Receipt_Date' => $this->Receipt_Date,
            'Time' => $this->Time,
        ];
    }
}
