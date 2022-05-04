<?php

namespace App\Http\Requests\Catalog;

use App\Catalog;
use Illuminate\Foundation\Http\FormRequest;

class CreateCatalogFormRequest extends FormRequest
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
        return [
            "name"=>[
                "required",
                "bail",
                "string",
                "max:200",
                "unique:catalogs"
            ],
            "description"=>[
                "required",
                "bail",
                "string",
                "max:200",
                "min:1",
            ],
            "qty_per_bulk"=>[
                "required_if:catalog_type,".Catalog::TYPE_GOODS,
                "bail",
                "integer",
                "min:1",
                "max:2000000",
            ],
            "low_stock_qty"=>[
                "required_if:catalog_type,".Catalog::TYPE_GOODS,
                "bail",
                "integer",
                "min:0",
                "max:2000000",
            ],
            "catalog_type" => [
                "required",
                "bail",
                "string",
                "in:".implode(",",[Catalog::TYPE_UTILITY,Catalog::TYPE_GOODS])
            ]
        ];
    }
}
