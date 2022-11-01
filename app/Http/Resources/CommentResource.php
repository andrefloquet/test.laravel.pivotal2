<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'             => $this->id,
            'podcast_id'     => $this->podcast_id,
            'name'           => $this->name,
            'email'          => $this->email,
            'body'           => $this->body,
            'created_at'     => $this->created_at->diffForHumans(),
            'updated_at'     => $this->updated_at->diffForHumans(),
        ];
    }
}
