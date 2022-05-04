<?php
/**
 * Created by PhpStorm
 * User: Junior Trust
 * Date: 8/13/2020
 * Time: 10:45 PM
 */
?>

<div class="container-fluid">
    <div class="row">
        <!-- /.col-md-6 -->
        <div class="col-lg-6">
            <!-- /.card -->

            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">Transaction Overview For The Day</h3>
                    <div class="card-tools">
                        <a href="#" class="btn btn-sm btn-tool">
                            <i class="fas fa-download"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-tool">
                            <i class="fas fa-bars"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                        <p class="text-success text-xl">
                            <i class="ion ion-ios-refresh-empty"></i>
                        </p>
                        <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-up text-success"></i> ₦ {{number_format($sales_today,2)}}
                    </span>
                            <span class="text-muted">Sales Today</span>
                        </p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                        <p class="text-primary text-xl">
                            <i class="ion ion-ios-refresh-empty"></i>
                        </p>
                        <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-up text-primary"></i> ₦ {{number_format($credit_sales_today,2)}}
                    </span>
                            <span class="text-muted">Credit Sales Today</span>
                        </p>
                    </div>
                    <!-- /.d-flex -->
                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                        <p class="text-danger text-xl">
                            <i class="ion ion-ios-cart-outline"></i>
                        </p>
                        <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-down text-danger"></i> ₦ {{number_format($expenses_today,2)}}
                    </span>
                            <span class="text-muted">Expenses Today</span>
                        </p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                        <p class="text-warning text-xl">
                            <i class="ion ion-ios-cart-outline"></i>
                        </p>
                        <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-down text-warning"></i> ₦ {{number_format($credit_expenses_today,2)}}
                    </span>
                            <span class="text-muted">Credit Expenses Today</span>
                        </p>
                    </div>
                    <!-- /.d-flex -->
                    <div class="d-flex justify-content-between align-items-center mb-0">
                        <p class="{{($sales_today>=$expenses_today)?"text-success":"text-danger"}} text-xl">
                            <i class="ion ion-cash"></i>
                        </p>
                        <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion  {{($sales_today>=$expenses_today)?"ion-android-arrow-up text-success":"ion-android-arrow-down text-danger"}}"></i> ₦ {{number_format($sales_today - $expenses_today,2)}}
                    </span>
                            <span class="text-muted">Profit</span>
                        </p>
                    </div>
                    <!-- /.d-flex -->
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <!-- /.card -->

            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">Transaction Overview For The Month</h3>
                    <div class="card-tools">
                        <a href="#" class="btn btn-sm btn-tool">
                            <i class="fas fa-download"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-tool">
                            <i class="fas fa-bars"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                        <p class="text-success text-xl">
                            <i class="ion ion-ios-refresh-empty"></i>
                        </p>
                        <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-up text-success"></i> ₦ {{number_format($sales_month,2)}}
                    </span>
                            <span class="text-muted">Sales Month</span>
                        </p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                        <p class="text-primary text-xl">
                            <i class="ion ion-ios-refresh-empty"></i>
                        </p>
                        <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-up text-primary"></i> ₦ {{number_format($credit_sales_month,2)}}
                    </span>
                            <span class="text-muted">Credit Sales Month</span>
                        </p>
                    </div>
                    <!-- /.d-flex -->
                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                        <p class="text-danger text-xl">
                            <i class="ion ion-ios-cart-outline"></i>
                        </p>
                        <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-down text-danger"></i> ₦ {{number_format($expenses_month,2)}}
                    </span>
                            <span class="text-muted">Expenses Month</span>
                        </p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                        <p class="text-warning text-xl">
                            <i class="ion ion-ios-cart-outline"></i>
                        </p>
                        <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-down text-warning"></i> ₦ {{number_format($credit_expenses_month,2)}}
                    </span>
                            <span class="text-muted">Credit Expenses Month</span>
                        </p>
                    </div>
                    <!-- /.d-flex -->
                    <div class="d-flex justify-content-between align-items-center mb-0">
                        <p class="{{($sales_month>=$expenses_month)?"text-success":"text-danger"}} text-xl">
                            <i class="ion ion-cash"></i>
                        </p>
                        <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion  {{($sales_month>=$expenses_month)?"ion-android-arrow-up text-success":"ion-android-arrow-down text-danger"}}"></i> ₦ {{number_format($sales_month - $expenses_month,2)}}
                    </span>
                            <span class="text-muted">Profit</span>
                        </p>
                    </div>
                    <!-- /.d-flex -->
                </div>
            </div>
        </div>
        <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
