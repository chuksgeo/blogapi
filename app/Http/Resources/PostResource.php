<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            
        'title'     => $this->title,
        'content'   => $this->content,
        'creator'   => $this->user_id,
        'categoies' => CategoryResource::collection($this->categories),
        'rating'    => $this->comments->count() > 0 ? round($this->comments->sum('likes')/ $this->comments->count()) : 'No Review yet',
        'likes'     => $this->comments->count(),
        'comments'  => [
            'comment'  => route ('comments.index', $this->id)
        ]
        ];
    }
}
