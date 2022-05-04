<?php

namespace App\Http\Requests\Catalog;

use App\Catalog;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCatalogFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $catalog = $this->route("catalog");

        return [
            "name"=>[
                "sometimes",
                "required",
                "bail",
                "string",
                "max:200",
                "unique:catalogs,name,".$catalog->id
            ],
            "description"=>[
                "sometimes",
                "required",
                "bail",
                "string",
                "max:200",
                "min:1",
            ],
            "qty_per_bulk"=>[
                "sometimes",
                "required_if:catalog_type,".Catalog::TYPE_GOODS,
                "bail",
                "integer",
                "min:1",
                "max:2000000",
            ],
            "low_stock_qty"=>[
                "sometimes",
                "required_if:catalog_type,".Catalog::TYPE_GOODS,
                "required",
                "bail",
                "integer",
                "min:0",
                "max:2000000",
            ],
            "catalog_type" => [
                "sometimes",
                "required",
                "bail",
                "string",
                "in:".implode(",",[Catalog::TYPE_UTILITY,Catalog::TYPE_GOODS])
            ]
        ];
    }
}
