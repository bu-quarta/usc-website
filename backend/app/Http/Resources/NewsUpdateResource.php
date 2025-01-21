<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsUpdateResource extends JsonResource
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
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'published_date' => $this->created_at->format('F j, Y'),
            'image_url' => $this->image_path,
            'status' => $this->status,
            'date_time' => $this->created_at->format('F d, Y | h:i A'),
        ];
    }
}
