<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserForFindResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'user_id'  =>  $this->id,
            'name'     =>  $this->name,
        ];
    }
}
