<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StaffResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'age' => $this->age,
            'phone' => $this->phone,
            'status' => $this->status,
            'gender' => $this->gender,
            'height' => $this->height,
            'weight' => $this->weight,
            'address' => $this->address,
            'avatar' => asset('storage/' . $this->avatar),
        ];
    }
}
