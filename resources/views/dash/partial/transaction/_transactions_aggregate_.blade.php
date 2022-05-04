<?php
/**
 * Created by PhpStorm
 * User: Junior Trust
 * Date: 10/13/2020
 * Time: 11:36 PM
 */
?>

<div class="container-fluid" id="aggregate_transactions_container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-sm-12 col-lg-8 col-xl-6">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Filter Results</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form role="form" id="aggregate_transactions_form" action="javascript:void(0)"
                          novalidate="novalidate">
                        <div class="row text-sm justify-content-center">
                            <div class="col-6 col-sm-4 col-lg-3 col-xl-3">
                                <div class="form-group  form-group-sm  ">
                                    <label for="start_date">Start Date</label>

                                    <div class=" input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm datetimepicker-input"
                                               name="from" id="start_date" data-toggle="datetimepicker"
                                               data-target="#start_date">
                                        <div class="input-group-append">
                                    <span class="input-group-text" data-toggle="datetimepicker"
                                          data-target="#start_date">
                                        <i class="fas  fa-calendar"></i></span>
                                        </div>
                                    </div>

                                    <em class="error-form from-error   invalid-feedback_2 text-danger"></em>
                                </div>
                            </div>
                            <div class="col-6 col-sm-4 col-lg-3 col-xl-3">
                                <div class="form-group form-group-sm   ">
                                    <label for="end_date">End Date</label>

                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm datetimepicker-input"
                                               name="to" id="end_date" data-toggle="datetimepicker"
                                               data-target="#end_date">
                                        <div class="input-group-append">
                                    <span class="input-group-text" data-toggle="datetimepicker" data-target="#end_date">
                                        <i class="fas  fa-calendar"></i></span>
                                        </div>
                                    </div>

                                    <em class="error-form to-error   invalid-feedback_2 text-danger"></em>
                                </div>

                            </div>


                            <div class="form-group form-group-sm col-6 col-sm-4 col-lg-3 col-xl-3">
                                <label for="qty_type">Quantity Type</label>
                                <select name="qty_type" class="form-control form-control-sm" id="qty_type">
                                    <option value="" selected="">Show All</option>
                                    <option value="{{\App\Transaction::QTY_TYPE_SINGLE}}">Show
                                        Only {{\App\Transaction::QTY_TYPE_SINGLE}}</option>
                                    <option value="{{\App\Transaction::QTY_TYPE_BULK}}">Show
                                        Only {{\App\Transaction::QTY_TYPE_BULK}}</option>
                                </select>
                                <em class="error-form qty_type-error   invalid-feedback_2 text-danger"></em>
                            </div>


                            <div class="form-group form-group-sm col-6 col-sm-4 col-lg-3 col-xl-3">
                                <label for="payment_status">Payment Status</label>


                                <select name="payment_status" class="form-control form-control-sm" id="payment_status">
                                    <option value="" selected="">Show All</option>
                                    <option value="{{\App\Transaction::PAYMENT_STATUS_PAID_OFF}}">Show Only Paid
                                    </option>
                                    <option value="{{\App\Transaction::PAYMENT_STATUS_PENDING}}">Show Only Credit
                                    </option>
                                </select>


                                <em class="error-form payment_status-error   invalid-feedback_2 text-danger"></em>
                            </div>
                            <div class="form-group form-group-sm col-6 col-sm-4 col-lg-3 col-xl-3">
                                <label for="transaction_type">Transaction Type</label>
                                <select name="transaction_type" class="form-control form-control-sm"
                                        id="transaction_type">
                                    <option value="" selected="">Show All</option>
                                    <option value="{{\App\Transaction::TYPE_PURCHASE}}">Show Only Purchase</option>
                                    <option value="{{\App\Transaction::TYPE_SALES}}">Show Only Sales</option>
                                </select>


                                <em class="error-form transaction_type-error   invalid-feedback_2 text-danger"></em>
                            </div>


                            <div class="form-group form-group-sm col-6 col-sm-4 col-lg-9 col-xl-9">
                                <label for="transaction_catalog_list">Catalogs (optional)</label>
                                <select id="transaction_catalog_list" name="catalog_ids[]"
                                        class="form-control form-control-sm select2 js-example-basic-multiple"
                                        multiple="multiple" style="width: 100%;">
                                    <option value=""></option>
                                </select>
                                <em class="error-form catalog_id-error   invalid-feedback_2 text-danger"></em>
                            </div>

                            <div class="form-group form-group-sm text-center col-12">
                                <button type="submit" class="btn btn-warning">Apply Filter</button>
                            </div>


                        </div>
                        @csrf

                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Transactions</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <div class="input-group-prepend">
                                <button type="submit" disabled class="btn btn-warning"
                                        id="aggregate_transactions_table_group_by">Group By
                                </button>
                            </div>
                            <select name="interval_type" class="form-control float-right" DISABLED>
                                <option value="">NONE</option>
                                <option value="DAY">DAY</option>
                                <option value="WEEK">WEEK</option>
                                <option value="MONTH">MONTH</option>
                                <option value="YEAR">YEAR</option>
                            </select>


                        </div>
                    </div>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="max-height: 500px">
                    <table class="table table-head-fixed ">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Qty Type</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Interval Point</th>
                        </tr>
                        </thead>
                        <tbody id="aggregate_transactions_result">
                        <tr>
                            <td COLSPAN="5">NO RECORDS AVAILABLE</td>
                        </tr>
                        </tbody>

                    </table>
                </div>
                <div class="card-footer  align-items-center overflow-auto">
                    <div class="col-lg-12 " id="aggregate_transactions_result_footer">

                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

</div>


<script>
    function generatePageRange(currentPage, lastPage) {

        const delta = 3;

        const range = [];
        for (let i = Math.max(2, (currentPage - delta)); i <= Math.min((lastPage - 1), (currentPage + delta)); i += 1) {
            range.push(i);
        }

        if ((currentPage - delta) > 2) {
            range.unshift('...');
        }
        if ((currentPage + delta) < (lastPage - 1)) {
            range.push('...');
        }

        range.unshift(1);
        if (lastPage > 1) range.push(lastPage);

        return range;
    }


    function generatePaginationLinks(currentPage, lastPage, url = "", pageName = "page") {
        const pageRange = generatePageRange(currentPage, lastPage);


        const regex = new RegExp(`[?]?${pageName}.*?(?=&|$)`);
        console.log(pageRange);

        let page_links = ``;
        console.log(url);
        url = url.replace(regex, "");
        console.log(url);
        url += ((url.indexOf('?') === -1) ? '?' : '&') + pageName + "="
        console.log(url);
        if (pageRange.length > 1) {
            page_links += ` <nav>
        <ul class="pagination"> `

            if (currentPage === pageRange[0]) {
                page_links += ` <li class="page-item disabled" aria-disabled="true" aria-label="Prev">
                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                </li>`
            } else {
                page_links += ` <li class="page-item">
                    <a class="page-link" href="${url + (+currentPage - 1)}" rel="prev" aria-label="Prev">&lsaquo;</a>
                </li>`
            }

            for (let pageRangeElement of pageRange) {

                if (isNaN(pageRangeElement)) {
                    page_links += `<li class="page-item disabled" aria-disabled="true"><span class="page-link">${pageRangeElement}</span></li>`;
                } else if (currentPage === pageRangeElement) {
                    page_links += ` <li class="page-item active" aria-current="page"><span class="page-link">${pageRangeElement}</span></li>`
                } else {
                    page_links += `<li class="page-item"><a class="page-link" href="${url + pageRangeElement}">${pageRangeElement}</a></li>`

                }
            }

            if (currentPage === pageRange[pageRange.length - 1]) {
                page_links += `  <li class="page-item disabled" aria-disabled="true" aria-label="Next">
                    <span class="page-link" aria-hidden="true">&rsaquo;</span>
                </li>`
            } else {
                page_links += ` <li class="page-item">
                    <a class="page-link" href="${url + (+currentPage + 1)}" rel="Next" aria-label="Next">&rsaquo;</a>
                </li>`
            }

            page_links += `  </ul>
         </nav>`;


        }
        return page_links;

    }

    $(document).ready(function () {

        $('#transaction_catalog_list').select2({
            theme: 'bootstrap4',
            maximumSelectionLength: 5,
            // placeholder:"select a catalog",
            placeholder: "Show All",
            // allowClear: true,
            // data:[
            //     {
            //     "id": 3,
            //     get text  (){ return  "Option 2 ear"}
            // },
            //     {
            //         "id": 4,
            //         "text": "Option 2.2"
            //     }
            // ],
            data: $catalogs.map(($item) => {
                return {id: $item.id, text: $item.name}
            })
        });

        const $date_time_picker = $('#start_date,#end_date');


        $date_time_picker.datetimepicker({
            maxDate: new Date(),
            defaultDate: (new Date()),

            format: "L",
            icons: {
                time: 'far fa-clock',

            }
        });

        $date_time_picker.on("change.datetimepicker", function (e) {
            $date_time_picker.datetimepicker('maxDate', new Date());
        });

        const $aggregateTransactionsContainer = $("#aggregate_transactions_container");

        let postD = {};
        let $result_table = $("#aggregate_transactions_result");

        let aggregate_transactions_form = false;

        let resultsData = []

        function populateTable(url, dataArr, cb = undefined) {
            $aggregateTransactionsContainer.busyLoad("show")

            $.post(url, dataArr, function ($result) {

                postD = dataArr;
                console.log({postD, $result, arguments, e: this.url});
                let rowsStr = "";
                if ($result.data.length) {

                    resultsData = $result.data;
                    let i = 0;
                    for (let $resultElement of $result.data) {
                        rowsStr +=
                            `<tr id="transaction_id_${$resultElement.id}">
<td>${$result.from + i}</td>
<td><a href="javascript:void(0)" data-catalog_id="${$resultElement.catalog.id}" >${$resultElement.catalog.name}</a></td>
<td>${$resultElement.qty_type}</td>
<td>${$resultElement.quantity.toLocaleString()}</td>
<td>₦ ${$resultElement.price.toLocaleString()}</td>
<td>${$resultElement.catalog.catalog_type}</td>
<td>${$resultElement.interval_point || "NONE"}</td>
</tr>`;
                        ++i;
                    }
                } else {
                    resultsData = [];
                    rowsStr = `<tr >
                           <td COLSPAN="5">NO RECORDS AVAILABLE</td>
                        </tr>`;
                }

                $result_table.html(rowsStr);

                $("#aggregate_transactions_result_footer").html(generatePaginationLinks($result.current_page, Math.ceil($result.total / $result.per_page), this.url));

                cb && cb(...arguments);

            }).always(function () {
                aggregate_transactions_form = false;
                $aggregateTransactionsContainer.busyLoad("hide")
            })
        }

        let fetch_url = "{{route("transactions_aggregate")}}";
        let $aggregate_transactions_form = $("#aggregate_transactions_form");
        $aggregate_transactions_form.submit(submitFormHandler)
            .validate({
                rules: {
                    "catalog_ids[]": {
                        maxlength: 5,
                    },

                },
                messages: {
                    "catalog_ids[]": {
                        maxlength: "select at most 5 catalogs",
                    },
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        $aggregateTransactionsContainer.delegate(`[href^='${fetch_url}']`, "click", function () {

            populateTable(this.href, postD)
            console.log((this));
            return false;
        });
        const $input_table_search = $("select[name='interval_type']");
        const $aggregate_transactions_table_group_by = $("#aggregate_transactions_table_group_by");


        $aggregate_transactions_table_group_by.click(submitFormHandler);

        function submitFormHandler() {
            if (aggregate_transactions_form || !$aggregate_transactions_form.valid()) {
                return false;
            }
            aggregate_transactions_form = true;

            console.log($aggregate_transactions_form);
            let formD = $aggregate_transactions_form.serializeArray();
            let dataArr = {};
            formD.forEach(function (data) {
                //only process if value is non falsy
                if (data.value) {
                    //if we encounter the data name previously
                    //assume we are dealing with data that is to be trated as array
                    if (dataArr[data.name]) {
                        //convert data type to array if its not
                        if (dataArr[data.name].constructor.name !== "Array") {
                            dataArr[data.name] = [dataArr[data.name]]
                        }
                        //append new data to array
                        dataArr[data.name].push(data.value)
                    } else {
                        dataArr[data.name] = data.value;
                    }
                }
            })
            dataArr["interval_type"] = $input_table_search.val();

            populateTable(fetch_url, dataArr, function ($data) {
                console.log($data.data);
                if ($data.data.length) {
                    $input_table_search.attr("disabled", false)
                    $aggregate_transactions_table_group_by.attr("disabled", false)
                } else {
                    $input_table_search.attr("disabled", true)
                    $aggregate_transactions_table_group_by.attr("disabled", true)
                }
            })

            console.log({dataArr, formD});

            return false;

        }
    });

</script>
