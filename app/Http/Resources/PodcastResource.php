<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PodcastResource extends JsonResource
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
            'name'           => $this->name,
            'description'    => $this->description,
            'marketing_url'  => $this->marketing_url,
            'feed_url'       => $this->feed_url,
            'status'         => $this->status,
            'created_at'     => $this->created_at->diffForHumans(),
            'updated_at'     => $this->updated_at->diffForHumans(),
            //'comments'       =>$this->comments,
        ]; 
    }
}
