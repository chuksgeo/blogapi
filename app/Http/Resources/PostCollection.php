<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource; //Post Collection

class PostCollection extends JsonResource //Post Collection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'title'     => $this->title,
            'preview'   => $this->summary,
            'creator'   => $this->user_id,
            'rating'    => $this->comments->count() > 0 ? round($this->comments->sum('likes')/ $this->comments->count()) : 'No Review yet',
            'categoies' => CategoryResource::collection($this->categories),
            'readmore'  => [
                'link'  => route ('posts.show', $this->id)
            ]
            ];
    }
}
