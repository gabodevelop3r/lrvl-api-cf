<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostRelationshipResource extends JsonResource
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
            'author'=>[
                'links'=>[
                    'self'=>  route('post.relationship.author',['post'=>$this->id]), # self hace referencia a donde se encuentra el link
                    'related'=> route('post.author',['post'=>$this->id])
                ],

                'data'=> new AuthorIdentifierResource($this->author),
            ],
            'comments'=> (new PostCommentsRelationshipCollection($this->comments))->additional(['post'=>$this])
        ];
    }
}
