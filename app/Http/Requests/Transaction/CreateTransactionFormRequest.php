<?php

namespace App\Http\Requests\Transaction;

use App\Transaction;
use Illuminate\Foundation\Http\FormRequest;

class CreateTransactionFormRequest extends FormRequest
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
            "catalog_id" => [
                "required",
                "bail",
                "integer",
                "min:0",
                "exists:catalogs,id",
            ],
            "qty_type"=>[
                "required",
                "bail",
                "string",
                "in:".implode(",",[Transaction::QTY_TYPE_SINGLE,Transaction::QTY_TYPE_BULK]),
            ],
            "transaction_type" => [

                "required",
                "bail",
                "string",
                "in:" . implode(",", [Transaction::TYPE_PURCHASE, Transaction::TYPE_SALES]),
            ],
            "quantity"=>[
                "required",
                "bail",
                "numeric",
                "min:0",
            ],
            "price"=>[
                "required",
                "bail",
                "numeric",
                "min:0",
            ],
            "payment_status"=>[
                "required",
                "bail",
                "string",
                "in:".implode(",",[Transaction::PAYMENT_STATUS_PENDING,Transaction::PAYMENT_STATUS_PAID_OFF]),
            ],
            "purchased_at" =>[
//                "sometimes",
                "required",
                "bail",
                "string",
                "date",
                "before_or_equal:now",
            ],
            "paid_at"=>[
                "required_if:payment_status,".Transaction::PAYMENT_STATUS_PAID_OFF,
                "bail",
                "string",
                "date",
                "before_or_equal:now",
            ],
            "description"=>[

                "required",
                "bail",
                "string",
                "max:200",
            ],

        ];
    }

    public function messages()
    {
        return [
            "purchased_at.before_or_equal"=> "Date of transaction must be equal or less than the current time",
            "paid_at.before_or_equal"=> "Date of transaction must be equal or less than the current time",

        ];
    }
}
