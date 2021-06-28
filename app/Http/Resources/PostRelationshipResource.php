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
                    'self'=>'', # self hace referencia a donde se encuentra el link
                    'related'=>''
                ],

                'data'=> new AuthorIdentifierResource($this->author),
                    
                
                
                
            ],
            'comments'=>[
                
            ]
        ];
    }
}
