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

            'type'=>  $this->getTAble(),
            'id' => $this->id,
            'attributes'=> [
                'content'=>$this->content,

            ],
            'links'=> [
                
                'self' => route( 'comments.show' ,[ 'comment' => $this->id ]),

            ]
            
            
        ];
    }
}
