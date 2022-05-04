<?php
/**
 * Created by PhpStorm
 * User: Junior Trust
 * Date: 10/14/2020
 * Time: 4:00 PM
 */
?>

<div class="container-fluid" id="aggregate_transactions_container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-text-width"></i>
                        Catalog Info
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <dl>
                        <dt>Catalog Name</dt>
                        <dd>{{$catalog->name}} </dd>
                        <dt>Catalog Type</dt>
                        <dd><span class=" badge bg-primary">{{$catalog->catalog_type}}</span></dd>
                        <dt>Quantity In Stock</dt>
                        <dd><span class=" badge bg-success">{{$catalog->qty_in_stock}}</span></dd>
                        <dt>Quantity Per Bulk</dt>
                        <dd><span class=" badge bg-info">{{$catalog->qty_per_bulk}}</span></dd>
                        <dt>Low Stock Quantity</dt>
                        <dd><span class=" badge bg-warning">{{$catalog->qty_per_bulk}}</span></dd>
                        <dt>Catalog description</dt>
                        <dd>{{$catalog->description}}</dd>
                    </dl>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- ./col -->
        <!-- /.col-md-6 -->

        <div class="col-md-4">
            <!-- /.card -->

            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">Bulk Transaction Overview For The Day</h3>
                    <div class="card-tools">
                        <a href="#" class="btn btn-sm btn-tool">
                            <i class="fas fa-download"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-tool">
                            <i class="fas fa-bars"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-head-fixed ">
                        <thead>
                        <tr>
                            <th>Label</th>
                            <th>Total Qty</th>
                            <th>Total Price</th>
                        </tr>
                        </thead>
                        <tbody id="bulk-day">
                        <tr class="sales">
                            <td>Sales</td>
                            <td class="quantity"></td>
                            <td class="price"></td>
                        </tr>
                        <tr class="credit-sales">
                            <td>Credit Sales</td>
                            <td class="quantity"></td>
                            <td class="price"></td>
                        </tr>
                        <tr class="expenses">
                            <td>Expenses</td>
                            <td class="quantity"></td>
                            <td class="price"></td>
                        </tr>
                        <tr class="credit-expenses">
                            <td>Credit Expenses</td>
                            <td class="quantity"></td>
                            <td class="price"></td>
                        </tr>
                        <tr class="profit">
                            <td>Profit</td>
                            <td class="quantity"></td>
                            <td class="price"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- /.card -->

            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">Single Transaction Overview For The Day</h3>
                    <div class="card-tools">
                        <a href="#" class="btn btn-sm btn-tool">
                            <i class="fas fa-download"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-tool">
                            <i class="fas fa-bars"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-head-fixed ">
                        <thead>
                        <tr>
                            <th>Label</th>
                            <th>Total Qty</th>
                            <th>Total Price</th>
                        </tr>
                        </thead>
                        <tbody id="single-day">
                        <tr class="sales">
                            <td>Sales</td>
                            <td class="quantity"></td>
                            <td class="price"></td>
                        </tr>
                        <tr class="credit-sales">
                            <td>Credit Sales</td>
                            <td class="quantity"></td>
                            <td class="price"></td>
                        </tr>
                        <tr class="expenses">
                            <td>Expenses</td>
                            <td class="quantity"></td>
                            <td class="price"></td>
                        </tr>
                        <tr class="credit-expenses">
                            <td>Credit Expenses</td>
                            <td class="quantity"></td>
                            <td class="price"></td>
                        </tr>
                        <tr class="profit">
                            <td>Profit</td>
                            <td class="quantity"></td>
                            <td class="price"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- /.card -->

            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">Bulk Transaction Overview For The Month</h3>
                    <div class="card-tools">
                        <a href="#" class="btn btn-sm btn-tool">
                            <i class="fas fa-download"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-tool">
                            <i class="fas fa-bars"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-head-fixed ">
                        <thead>
                        <tr>
                            <th>Label</th>
                            <th>Total Qty</th>
                            <th>Total Price</th>
                        </tr>
                        </thead>
                        <tbody id="bulk-month">
                        <tr class="sales">
                            <td>Sales</td>
                            <td class="quantity"></td>
                            <td class="price"></td>
                        </tr>
                        <tr class="credit-sales">
                            <td>Credit Sales</td>
                            <td class="quantity"></td>
                            <td class="price"></td>
                        </tr>
                        <tr class="expenses">
                            <td>Expenses</td>
                            <td class="quantity"></td>
                            <td class="price"></td>
                        </tr>
                        <tr class="credit-expenses">
                            <td>Credit Expenses</td>
                            <td class="quantity"></td>
                            <td class="price"></td>
                        </tr>
                        <tr class="profit">
                            <td>Profit</td>
                            <td class="quantity"></td>
                            <td class="price"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- /.card -->

            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">Single Transaction Overview For The Month</h3>
                    <div class="card-tools">
                        <a href="#" class="btn btn-sm btn-tool">
                            <i class="fas fa-download"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-tool">
                            <i class="fas fa-bars"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-head-fixed ">
                        <thead>
                        <tr>
                            <th>Label</th>
                            <th>Total Qty</th>
                            <th>Total Price</th>
                        </tr>
                        </thead>
                        <tbody id="single-month">
                        <tr class="sales">
                            <td>Sales</td>
                            <td class="quantity"></td>
                            <td class="price"></td>
                        </tr>
                        <tr class="credit-sales">
                            <td>Credit Sales</td>
                            <td class="quantity"></td>
                            <td class="price"></td>
                        </tr>
                        <tr class="expenses">
                            <td>Expenses</td>
                            <td class="quantity"></td>
                            <td class="price"></td>
                        </tr>
                        <tr class="credit-expenses">
                            <td>Credit Expenses</td>
                            <td class="quantity"></td>
                            <td class="price"></td>
                        </tr>
                        <tr class="profit">
                            <td>Profit</td>
                            <td class="quantity"></td>
                            <td class="price"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.col-md-6 -->
    </div>
</div>


<script>
    $catalog = {!! $catalog !!}
    $(document).ready(function () {

        console.log($catalog)


    })

    date = new Date();

    {{--postD = {--}}
    {{--    catalog_ids: [39],--}}
    {{--    from: (new Date(date.getFullYear(), date.getMonth(), 1)).format("shortDate"),--}}
    {{--    to: date.format("shortDate"),--}}
    {{--    classify: 1,--}}
    {{--    _token: '{{csrf_token()}}',--}}
    {{--    limit: 15,--}}
    {{--}--}}
    url = '{{route("transactions_aggregate")}}';
     data = {
        bulk: {
            month: {
                sales: {amount: 0, quantity: 0},
                credit_sales: {amount: 0, quantity: 0},
                expenses: {amount: 0, quantity: 0},
                credit_expenses: {amount: 0, quantity: 0},
                profit: {amount: 0, quantity: 0},
            },
            day: {
                sales: {amount: 0, quantity: 0},
                credit_sales: {amount: 0, quantity: 0},
                expenses: {amount: 0, quantity: 0},
                credit_expenses: {amount: 0, quantity: 0},
                profit: {amount: 0, quantity: 0},
            }
        },
        single: {
            month: {
                sales: {amount: 0, quantity: 0},
                credit_sales: {amount: 0, quantity: 0},
                expenses: {amount: 0, quantity: 0},
                credit_expenses: {amount: 0, quantity: 0},
                profit: {amount: 0, quantity: 0},
            },
            day: {
                sales: {amount: 0, quantity: 0},
                credit_sales: {amount: 0, quantity: 0},
                expenses: {amount: 0, quantity: 0},
                credit_expenses: {amount: 0, quantity: 0},
                profit: {amount: 0, quantity: 0},
            }
        },
    };


    ["month","day"].forEach(function (range) {

       let  postD = {
            catalog_ids: [$catalog.id],
            from: (new Date(date.getFullYear(), date.getMonth(), 1)).format("shortDate"),
            to: date.format("shortDate"),
            classify: 1,
            _token: '{{csrf_token()}}',
            limit: 15,
        }
        if (range === "day") {
            postD={...postD}
            postD.from=date.format("shortDate")

            console.log(postD);
            //modify url to avoid caching
            url+=" ";
        }


        $.post(url, postD, function (result) {

            console.log({data:result.data,range});
            result.data.forEach(function (item) {

                if (item.qty_type === "BULK") {
                    if (range === "month") {
                        if (item.payment_status === "PENDING") {
                            if (item.transaction_type === "PURCHASE") {
                                data.bulk.month.credit_expenses.amount = item.price;
                                data.bulk.month.credit_expenses.quantity = item.quantity;
                            } else if (item.transaction_type === "SALES") {
                                data.bulk.month.credit_sales.amount = item.price;
                                data.bulk.month.credit_sales.quantity = item.quantity;
                            }
                        } else if (item.payment_status === "PAID_OFF") {
                            if (item.transaction_type === "PURCHASE") {
                                data.bulk.month.expenses.amount = item.price;
                                data.bulk.month.expenses.quantity = item.quantity;
                            } else if (item.transaction_type === "SALES") {
                                data.bulk.month.sales.amount = item.price;
                                data.bulk.month.sales.quantity = item.quantity;
                            }
                        }


                    } else if (range === "day") {
                        if (item.payment_status === "PENDING") {
                            if (item.transaction_type === "PURCHASE") {
                                data.bulk.day.credit_expenses.amount = item.price;
                                data.bulk.day.credit_expenses.quantity = item.quantity;
                            } else if (item.transaction_type === "SALES") {
                                data.bulk.day.credit_sales.amount = item.price;
                                data.bulk.day.credit_sales.quantity = item.quantity;
                            }
                        } else if (item.payment_status === "PAID_OFF") {
                            alert(3);
                            if (item.transaction_type === "PURCHASE") {
                                data.bulk.day.expenses.amount = item.price;
                                data.bulk.day.expenses.quantity = item.quantity;
                            } else if (item.transaction_type === "SALES") {
                                data.bulk.day.sales.amount = item.price;
                                data.bulk.day.sales.quantity = item.quantity;
                            }
                        }



                    }


                }
                else if (item.qty_type === "SINGLE") {
                    if (range === "month") {
                        if (item.payment_status === "PENDING") {
                            if (item.transaction_type === "PURCHASE") {
                                data.single.month.credit_expenses.amount = item.price;
                                data.single.month.credit_expenses.quantity = item.quantity;
                            } else if (item.transaction_type === "SALES") {
                                data.single.month.credit_sales.amount = item.price;
                                data.single.month.credit_sales.quantity = item.quantity;
                            }
                        } else if (item.payment_status === "PAID_OFF") {
                            if (item.transaction_type === "PURCHASE") {
                                data.single.month.expenses.amount = item.price;
                                data.single.month.expenses.quantity = item.quantity;
                            } else if (item.transaction_type === "SALES") {
                                data.single.month.sales.amount = item.price;
                                data.single.month.sales.quantity = item.quantity;
                            }
                        }

                    } else if (range === "day") {

                        if (item.payment_status === "PENDING") {
                            if (item.transaction_type === "PURCHASE") {
                                data.single.day.credit_expenses.amount = item.price;
                                data.single.day.credit_expenses.quantity = item.quantity;
                            } else if (item.transaction_type === "SALES") {
                                data.single.day.credit_sales.amount = item.price;
                                data.single.day.credit_sales.quantity = item.quantity;
                            }
                        } else if (item.payment_status === "PAID_OFF") {
                            if (item.transaction_type === "PURCHASE") {
                                data.single.day.expenses.amount = item.price;
                                data.single.day.expenses.quantity = item.quantity;
                            } else if (item.transaction_type === "SALES") {
                                data.single.day.sales.amount = item.price;
                                data.single.day.sales.quantity = item.quantity;
                            }
                        }


                    }
                }
            });

            if(range==="day"){


                $("#bulk-day>.sales>.quantity").html(data.bulk.day.sales.quantity.toLocaleString());
                $("#bulk-day>.sales>.price").html(data.bulk.day.sales.amount.toLocaleString());

                $("#bulk-day>.credit-sales>.quantity").html(data.bulk.day.credit_sales.quantity.toLocaleString());
                $("#bulk-day>.credit-sales>.price").html(data.bulk.day.credit_sales.amount.toLocaleString());

                $("#bulk-day>.credit-expenses>.quantity").html(data.bulk.day.credit_expenses.quantity.toLocaleString());
                $("#bulk-day>.credit-expenses>.price").html(data.bulk.day.credit_expenses.amount.toLocaleString());

                $("#bulk-day>.expenses>.quantity").html(data.bulk.day.expenses.quantity.toLocaleString());
                $("#bulk-day>.expenses>.price").html(data.bulk.day.expenses.amount.toLocaleString());

                $("#bulk-day>.profit>.price").html((data.bulk.day.sales.amount-data.bulk.day.expenses.amount).toLocaleString());

                $("#single-day>.sales>.quantity").html(data.single.day.sales.quantity.toLocaleString());
                $("#single-day>.sales>.price").html(data.single.day.sales.amount.toLocaleString());

                $("#single-day>.credit-sales>.quantity").html(data.single.day.credit_sales.quantity.toLocaleString());
                $("#single-day>.credit-sales>.price").html(data.single.day.credit_sales.amount.toLocaleString());

                $("#single-day>.credit-expenses>.quantity").html(data.single.day.credit_expenses.quantity.toLocaleString());
                $("#single-day>.credit-expenses>.price").html(data.single.day.credit_expenses.amount.toLocaleString());

                $("#single-day>.expenses>.quantity").html(data.single.day.expenses.quantity.toLocaleString());
                $("#single-day>.expenses>.price").html(data.single.day.expenses.amount.toLocaleString());

                $("#single-day>.profit>.price").html((data.single.day.sales.amount-data.single.day.expenses.amount).toLocaleString());
            }
            else if(range==="month"){

                $("#bulk-month>.sales>.quantity").html(data.bulk.month.sales.quantity.toLocaleString());
                $("#bulk-month>.sales>.price").html(data.bulk.month.sales.amount.toLocaleString());

                $("#bulk-month>.credit-sales>.quantity").html(data.bulk.month.credit_sales.quantity.toLocaleString());
                $("#bulk-month>.credit-sales>.price").html(data.bulk.month.credit_sales.amount.toLocaleString());

                $("#bulk-month>.credit-expenses>.quantity").html(data.bulk.month.credit_expenses.quantity.toLocaleString());
                $("#bulk-month>.credit-expenses>.price").html(data.bulk.month.credit_expenses.amount.toLocaleString());

                $("#bulk-month>.expenses>.quantity").html(data.bulk.month.expenses.quantity.toLocaleString());
                $("#bulk-month>.expenses>.price").html(data.bulk.month.expenses.amount.toLocaleString());

                $("#bulk-month>.profit>.price").html((data.bulk.month.sales.amount-data.bulk.month.expenses.amount).toLocaleString());

                $("#single-month>.sales>.quantity").html(data.single.month.sales.quantity.toLocaleString());
                $("#single-month>.sales>.price").html(data.single.month.sales.amount.toLocaleString());

                $("#single-month>.credit-sales>.quantity").html(data.single.month.credit_sales.quantity.toLocaleString());
                $("#single-month>.credit-sales>.price").html(data.single.month.credit_sales.amount.toLocaleString());

                $("#single-month>.credit-expenses>.quantity").html(data.single.month.credit_expenses.quantity.toLocaleString());
                $("#single-month>.credit-expenses>.price").html(data.single.month.credit_expenses.amount.toLocaleString());

                $("#single-month>.expenses>.quantity").html(data.single.month.expenses.quantity.toLocaleString());
                $("#single-month>.expenses>.price").html(data.single.month.expenses.amount.toLocaleString());

                $("#single-month>.profit>.price").html((data.single.month.sales.amount-data.single.month.expenses.amount).toLocaleString());
            }
        }).always(function (){
        })

    })




</script>
