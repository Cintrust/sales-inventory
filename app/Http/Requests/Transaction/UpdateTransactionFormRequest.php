<?php

namespace App\Http\Requests\Transaction;

use App\Transaction;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTransactionFormRequest extends FormRequest
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

            "qty_type" => [
                "sometimes",
                "required",
                "bail",
                "string",
                "in:" . implode(",", [Transaction::QTY_TYPE_SINGLE, Transaction::QTY_TYPE_BULK]),
            ],
            "quantity" => [
                "sometimes",
                "required",
                "bail",
                "numeric",
                "min:0",
            ],
            "price" => [
                "sometimes",
                "required",
                "bail",
                "numeric",
                "min:0",
            ],
            "payment_status" => [
                "sometimes",
                "required",
                "bail",
                "string",
                "in:" . implode(",", [Transaction::PAYMENT_STATUS_PENDING, Transaction::PAYMENT_STATUS_PAID_OFF]),
            ],
//            "transaction_type" => [
//                "sometimes",
//                "required",
//                "bail",
//                "string",
//                "in:" . implode(",", [Transaction::TYPE_PURCHASE, Transaction::TYPE_SALES]),
//            ],
            "purchased_at" => [
                "sometimes",
                "required",
                "bail",
                "string",
                "date",
                "before_or_equal:now",
            ],
            "paid_at" => [
                "sometimes",
                "required",
//                "required_if:anotherfield,value",
                "bail",
                "string",
                "date",
                "before_or_equal:now",
            ],
        ];

    }
}
