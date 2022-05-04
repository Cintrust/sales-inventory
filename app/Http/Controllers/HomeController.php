<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {




        return view('dash.main');
    }

    public function dash()
    {
        $sales_today = Transaction::where("transaction_type",Transaction::TYPE_SALES)
            ->whereDate("purchased_at","=",now("Africa/Lagos")->format("Y-m-d"))
            ->where("payment_status",Transaction::PAYMENT_STATUS_PAID_OFF)
            ->sum("price");
        $credit_sales_today = Transaction::where("transaction_type",Transaction::TYPE_SALES)
            ->where("payment_status",Transaction::PAYMENT_STATUS_PENDING)
            ->whereDate("purchased_at","=",now("Africa/Lagos")->format("Y-m-d"))
            ->sum("price");

        $sales_month = Transaction::where("transaction_type",Transaction::TYPE_SALES)
            ->where("payment_status",Transaction::PAYMENT_STATUS_PAID_OFF)
            ->whereBetween("purchased_at",[
                now("Africa/Lagos")->startOfMonth(),
                now("Africa/Lagos")->endOfMonth(),
            ])->sum("price");

        $credit_sales_month = Transaction::where("transaction_type",Transaction::TYPE_SALES)
            ->where("payment_status",Transaction::PAYMENT_STATUS_PENDING)
            ->whereBetween("purchased_at",[
                now("Africa/Lagos")->startOfMonth(),
                now("Africa/Lagos")->endOfMonth(),
            ])->sum("price");

        $purchases_today = Transaction::where("transaction_type",Transaction::TYPE_PURCHASE)
            ->whereDate("purchased_at","=",now("Africa/Lagos")->format("Y-m-d"))
            ->where("payment_status",Transaction::PAYMENT_STATUS_PAID_OFF)
            ->sum("price");

        $credit_purchases_today = Transaction::where("transaction_type",Transaction::TYPE_PURCHASE)
            ->where("payment_status",Transaction::PAYMENT_STATUS_PENDING)
            ->whereDate("purchased_at","=",now("Africa/Lagos")->format("Y-m-d"))
            ->sum("price");

        $purchases_month = Transaction::where("transaction_type",Transaction::TYPE_PURCHASE)
            ->where("payment_status",Transaction::PAYMENT_STATUS_PAID_OFF)
            ->whereBetween("purchased_at",[
                now("Africa/Lagos")->startOfMonth(),
                now("Africa/Lagos")->endOfMonth(),
            ])->sum("price");

        $credit_purchases_month = Transaction::where("transaction_type",Transaction::TYPE_PURCHASE)
            ->where("payment_status",Transaction::PAYMENT_STATUS_PENDING)
            ->whereBetween("purchased_at",[
                now("Africa/Lagos")->startOfMonth(),
                now("Africa/Lagos")->endOfMonth(),
            ])->sum("price");

        $data =[
            "sales_today"=>$sales_today,
            "credit_sales_today"=>$credit_sales_today,

            "sales_month"=>$sales_month,
            "credit_sales_month"=>$credit_sales_month,

            "expenses_today"=>$purchases_today,
            "credit_expenses_today"=>$credit_purchases_today,

            "expenses_month"=>$purchases_month,
            "credit_expenses_month"=>$credit_purchases_month,


//            "today_profit"=>
        ];

        return view('dash.partial._dashboard_')->with($data);

    }
}
