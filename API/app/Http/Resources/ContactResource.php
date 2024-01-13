<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->first_name . ' ' . $this->last_name,
            'job_title' => $this->job_title,
            'email' => $this->email,
            'phone' => $this->phone,
            'company' => new CompanyResource($this->whenLoaded('company'))
        ];
    }
}