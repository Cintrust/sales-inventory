<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Catalog extends JsonResource
{

    /**
     * The "data" wrapper that should be applied.
     *
     * @var string
     */
//    public static $wrap = 'data';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

//        return ["catalog"=>parent::toArray($request)];
        return parent::toArray($request);
//        return [
//            "id"=>$this->id
//        ];
    }



}
