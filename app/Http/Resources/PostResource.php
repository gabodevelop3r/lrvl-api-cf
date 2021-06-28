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
    public function toArray($request) # este metodo modifica a nuestro moedlo
    {
        /* 
            modificar la estructura del json
            para referenciar al modelo se puede utilizar this ya que se esta pasando como parametro    
        */
        
        return [
            
            'type'=>$this->getTable(),
            'id'=>$this->id,
            
            'attributes'=>[
                'title'=>$this->title
            ],
            
            'relationships'=>[ # apartado de relaciones del modelo
                new PostRelationshipResource($this),
            ],

            'links'=>[
                'self'=> route('posts.show',['post'=>$this->id])
            ]
        ];
    }
}
