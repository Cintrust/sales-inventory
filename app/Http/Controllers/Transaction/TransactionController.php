<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Requests\Transaction\CreateTransactionFormRequest;
use App\Http\Requests\Transaction\FetchTransactionsFormRequest;
use App\Http\Requests\Transaction\UpdateTransactionFormRequest;
use App\Transaction;
use Carbon\Carbon;

class TransactionController extends Controller
{


    public function createView()
    {
        $request = request();

        switch ($request->input("type", "sales")) {
            case "sales":
            default:
                $data = [
                    "category" => "Sales",
                    "transaction_type" => Transaction::TYPE_SALES,
                    "payment_status" => Transaction::PAYMENT_STATUS_PAID_OFF,
                ];
                break;
            case "credit_sales":
                $data = [
                    "category" => "Credit Sales",
                    "transaction_type" => Transaction::TYPE_SALES,
                    "payment_status" => Transaction::PAYMENT_STATUS_PENDING,
                ];
                break;
            case "purchase":
                $data = [
                    "category" => "Purchase",
                    "transaction_type" => Transaction::TYPE_PURCHASE,
                    "payment_status" => Transaction::PAYMENT_STATUS_PAID_OFF,
                ];
                break;
            case "credit_purchase":
                $data = [
                    "category" => "Credit Purchase",
                    "transaction_type" => Transaction::TYPE_PURCHASE,
                    "payment_status" => Transaction::PAYMENT_STATUS_PENDING,
                ];
                break;

        }

        return view("dash.partial.transaction._create_transaction_")->with($data);
    }

    /**
     * @param CreateTransactionFormRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function create(CreateTransactionFormRequest $request)
    {
        $data = $request->validated();

        foreach (["purchased_at", /*"paid_at"*/] as $param) {
            if (!isset($data[$param])) {
                $data[$param] = "now";
            }
        }
        $transaction = new Transaction();


        $transaction->catalog_id = $data["catalog_id"];
        $transaction->qty_type = $data["qty_type"];
        $transaction->quantity = $data["quantity"];
        $transaction->price = $data["price"];
        $transaction->description = $data["description"];
        $transaction->transaction_type = $data["transaction_type"];
        $transaction->payment_status = $data["payment_status"];
        $transaction->purchased_at = new Carbon($data["purchased_at"]);
        if (isset($data["paid_at"]) ||
            $transaction->payment_status == Transaction::PAYMENT_STATUS_PAID_OFF) {
            $transaction->paid_at = new Carbon($data["paid_at"] ?? "now");
        }


        $transaction->saveOrFail();
//        $catalog = $transaction->catalog;
//
//
//        $qty = $transaction->qty_type == Transaction::QTY_TYPE_BULK ? $transaction->quantity * $catalog->qty_per_bulk : $transaction->quantity;
//
//        if ($transaction->transaction_type == Transaction::TYPE_SALES) {
//            $catalog->qty_in_stock -= $qty;
//        } else {
//            $catalog->qty_in_stock += $qty;
//
//        }
//        $catalog->saveOrFail();

        return response()->json(
            [
                "data" => ["transaction" => $transaction],
                "message" => "Transaction Created"
            ], 201);
//        return $transaction;

    }

    /**
     * @param Transaction $transaction
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete(Transaction $transaction)
    {

        $transaction->delete();

        return response()->json([
            "message" => "Transaction Deleted"
        ], 200);
    }

    /**
     * @param UpdateTransactionFormRequest $request
     * @param Transaction $transaction
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function update(UpdateTransactionFormRequest $request, Transaction $transaction)
    {
        $data = $request->validated();

        foreach (["qty_type", "quantity", "price", /*"payment_status",*/ /*"transaction_type"*/] as $value) {

            if (isset($data[$value])) {
                $transaction->{$value} = $data[$value];
            }
        }

        foreach (["purchased_at", /*"paid_at"*/] as $param) {
            if (isset($data[$param])) {
//                $data[$param] = "now";
                $transaction->{$param} = new Carbon($data[$param]);
            }
        }


        if (isset($data["payment_status"]) || isset($data["paid_at"])) {

            $transaction->payment_status = $data["payment_status"] ?? $transaction->payment_status;

            if ($transaction->payment_status == Transaction::PAYMENT_STATUS_PENDING) {

                $transaction->paid_at = null;
            } elseif (isset($data["paid_at"]) || $transaction->isDirty(["payment_status"])) {

                $transaction->paid_at = new Carbon($data["paid_at"] ?? "now");
            }


        }


        $transaction->saveOrFail();


        return response()->json(
            [
                "data" => ["transaction" => $transaction],
                "message" => "Transaction Updated"
            ], 200);

    }


    public function transactionsView()
    {
        $data = [
            "category" => "Sales",
            "transaction_type" => Transaction::TYPE_SALES,
            "payment_status" => Transaction::PAYMENT_STATUS_PAID_OFF,
        ];
        return view("dash.partial.transaction._view_transactions_")->with($data);
    }

    /**
     * @param FetchTransactionsFormRequest $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function transactions(FetchTransactionsFormRequest $request)
    {

        $builder = $this->transactionsHelper($data = $request->validated());
        if (isset($data['search'])) {
            $builder->where("description", "like", "%{$data['search']}%");
        }


        $builder->with("catalog:id,name,catalog_type")->orderBy("purchased_at");

        $transactions = $builder->paginate($request->input("limit", 10))->appends($request->query());

        return $transactions;
//        return response()->json(
//            [
//                "data" => ["paginate" => $transactions],
//                "message" => "Transactions"
//            ], 200);


    }

    public function transactionsHelper(array $data)
    {

        $builder = Transaction::query();


        foreach (["payment_status", "transaction_type", "qty_type"] as $item) {
            if (isset($data[$item])) {
                $builder->where($item, $data[$item]);
            }
        }


        $builder
            ->whereDate("purchased_at", '>=', (new Carbon($data["from"] ?? "now"))->format('Y-m-d'))
            ->whereDate("purchased_at", '<=', (new Carbon($data["to"] ?? "now"))->format('Y-m-d'));

        if (isset($data["catalog_ids"])) {
            $builder->WhereIn("catalog_id", $data["catalog_ids"]);
        }
//        dump($builder->toSql());

        return $builder;
    }

    public function aggregateView()
    {
        $data=[];
        return view("dash.partial.transaction._transactions_aggregate_")->with($data);

    }

    public function aggregate(FetchTransactionsFormRequest $request)
    {

        $builder = $this->transactionsHelper($data = $request->validated());

        $builder->groupBy("catalog_id","qty_type");


        $builder->selectRaw(
            "
            sum(quantity) as quantity,
            sum(price) as price,
            qty_type,catalog_id
            "
        );

        if(isset($data["classify"])&&$data["classify"]){
            $builder->selectRaw("payment_status,transaction_type")
            ->groupBy('payment_status','transaction_type');
        }

        if(isset($data['interval_type'])){
            $format="%Y-%m-%d";
            switch ($data['interval_type']){
                case "WEEK":
                    $format="%X WK.%V";
                    break;
                case "MONTH":
                    $format="%Y-%m";
                    break;
                case "YEAR":
                    $format="%Y";
            }
            $builder->selectRaw("DATE_FORMAT(`purchased_at`,?) as interval_point",[":format"=>$format])
                ->groupBy('interval_point')->orderBy('interval_point');
        }

        $builder->join('catalogs', 'catalogs.id', '=', 'catalog_id')
        ->orderBy('catalogs.name')->orderBy("qty_type");

        $builder->with("catalog:id,name,catalog_type")
           /* ->orderBy("name")*/;


        $result= $builder->paginate($request->input("limit", 10))->appends($request->query());;


        return $result;
//        $toSql = $builder->toSql();
//
//        return response()->json(
//            [
//                "data" =>$result,
//
//                "message" => "aggregate result"
//            ], 200);


    }

}
