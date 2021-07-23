<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'user' => $this->author->name,
            'user_id' => $this->author->id,
            'body' => $this->body,
            'published' => $this->created_at->format('d F, Y')
        ];
    }
}
