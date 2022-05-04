<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CatalogCollection extends ResourceCollection
{

    /**
     * The "data" wrapper that should be applied.
     *
     * @var string
     */
//    public static $wrap = 'catalogs';

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return ["catalogs"=>parent::toArray($request)];
    }


    /**
     * Get additional data that should be returned with the resource array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function with($request)
    {
        return [
            "message"=>"catalogs",
        ];
    }
}
