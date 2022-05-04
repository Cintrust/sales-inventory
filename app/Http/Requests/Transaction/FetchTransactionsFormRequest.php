<?php

namespace App\Http\Requests\Transaction;

use App\Transaction;
use Illuminate\Foundation\Http\FormRequest;

class FetchTransactionsFormRequest extends FormRequest
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
            "transaction_type" => [
                "sometimes",
                "required",
                "bail",
                "in:" . implode(",", [Transaction::TYPE_PURCHASE, Transaction::TYPE_SALES]),
            ],

//            "catalog_ids.*" => [
////                "sometimes",
//                "required",
//                "bail",
//                "integer",
//                "min:0",
////                "exists:catalogs,id",
//            ],
            "catalog_ids"=>[
                "sometimes",
                "bail",
                "required",
                "array",
                function ($attribute, $value, $fail) {
                    if (count($value) !== count($value,COUNT_RECURSIVE)) {
                        $fail($attribute.' is invalid.');
                    }
                },
                "exists:catalogs,id",
            ],
            "payment_status" => [
                "sometimes",
                "required",
                "bail",
                "string",
                "in:" . implode(",", [Transaction::PAYMENT_STATUS_PENDING, Transaction::PAYMENT_STATUS_PAID_OFF]),
            ],

            "qty_type" => [
                "sometimes",
                "required",
                "bail",
                "string",
                "in:" . implode(",", [Transaction::QTY_TYPE_SINGLE, Transaction::QTY_TYPE_BULK]),
            ],

            "from" => [
                "sometimes",
                "required",
//                "required_if:anotherfield,value",
                "bail",
                "string",
                "date",
                "before_or_equal:now",
            ],

            "to" => [
                "sometimes",
                "required",
//                "required_if:anotherfield,value",
                "bail",
                "string",
                "date",
                "before_or_equal:now",
            ],

            "limit"=>[
                "sometimes",
                "bail",
                "required",
                "integer",
                "min:3",
                "max:100",
            ],
            "search" => [

                "nullable",
                "bail",
                "string",
                "min:3",
            ],
            "interval_type" => [
                "nullable",
                "bail",
                "string",
                "in:DAY,WEEK,MONTH,YEAR",
            ],
            "classify" => [
                "nullable",
                "bail",
                "boolean",
            ],




        ];
    }
}
