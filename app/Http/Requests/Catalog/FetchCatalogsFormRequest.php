<?php

namespace App\Http\Requests\Catalog;

use App\Catalog;
use Illuminate\Foundation\Http\FormRequest;

class FetchCatalogsFormRequest extends FormRequest
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
            "catalog_type"=>[
                "sometimes",
                "bail",
                "required",
                "string",
                "in:".implode(",",[Catalog::TYPE_GOODS,Catalog::TYPE_UTILITY]),
            ],
            "search"=>[
                "sometimes",
                "bail",
                "required",
                "string",
                "min:3",
                "max:40",
            ],
            "limit"=>[
                "sometimes",
                "bail",
                "required",
                "integer",
                "min:3",
                "max:2000",
            ]
        ];
    }
}
