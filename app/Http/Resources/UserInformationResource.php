<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserInformationResource extends JsonResource
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
            'id'            =>   $this->id,
            'name'          =>   $this->name,
            'father_name'   =>   $this->father_name,
            'mother_name'   =>   $this->mother_name,
            'family_name'   =>   $this->family_name,
            'identity_no'   =>   $this->identity_no,
            'serial_no'     =>   $this->serial_no,
            'birth_date'    =>   $this->birth_date,
        ];
    }
}
