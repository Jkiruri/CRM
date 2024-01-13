<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DealResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'amount' => $this->amount,
            'company' => new CompanyResource($this->whenLoaded('company')),
            'contact' => new ContactResource($this->whenLoaded('contact'))
        ];
    }
}