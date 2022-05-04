<?php
/**
 * Created by PhpStorm
 * User: Junior Trust
 * Date: 9/11/2020
 * Time: 2:04 AM
 */
?>

<div class="container-fluid" id="fetch_transactions_container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-sm-12 col-lg-8 col-xl-6">
            <div class="card card-lightblue">
                <div class="card-header">
                    <h3 class="card-title">Filter Results</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form role="form" id="fetch_transactions_form" novalidate="novalidate">
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
                                <button type="submit" class="btn btn-info">Apply Filter</button>
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
                            <input type="text" readonly name="table_search" value="" class="form-control float-right"
                                   placeholder="Search description">

                            <div class="input-group-append">
                                <button type="submit" disabled class="btn btn-info"
                                        id="fetch_transactions_table_search"><i class="fas fa-search"></i></button>
                            </div>
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
                            <th>Paid</th>
                            <th>Type</th>
                            <th>Actions</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody id="fetch_transactions_result">
                        <tr>
                            <td COLSPAN="5">NO RECORDS AVAILABLE</td>
                        </tr>
                        </tbody>

                    </table>
                </div>
                <div class="card-footer  align-items-center overflow-auto">
                    <div class="col-lg-12 " id="fetch_transactions_result_footer">

                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>


<script>

    function replaceUrlParam(url, name, value = "") {
        const regex = new RegExp(`[?]?${name}.*?(?=&|$)`);
    }

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

    function deleteTransaction(transaction_id) {


        if(!confirm("Are you sure you want to delete this record ?")){
            return false;
        }
        let $row = $(`#transaction_id_${transaction_id}`)
        console.log($row);
        $row.slideUp("slow");
        let $this = $(this);

        $this.attr("disabled", true).busyLoad("show")

        let data = {_token: '{{csrf_token()}}'};
        let url = "{{route("delete_transaction","#4#")}}".replace("#4#", transaction_id)
        $.post(url, data, function () {
            toastr.success("Transaction Deleted", "Done");
            $row.remove();
            $this.remove()
        }).always(function () {
            $row.slideDown();
            $this.attr("disabled", false).busyLoad("hide")

        })
    }

    function markTransactionAsPaid(transaction_id){

        let data ={payment_status:"PAID_OFF",_token: '{{csrf_token()}}'}
        let url = "{{route("update_transaction","#4#")}}".replace("#4#", transaction_id)
        let $this = $(this);
        let $col = $(`#transaction_id_${transaction_id}>.payment_status`)
        console.log({data,url,$col})

        $this.attr("disabled", true).busyLoad("show")
        $.post(url, data, function () {
            toastr.success("Transaction Updated", "Done");
            $col.html("YES")
            $this.remove()
        }).always(function () {
            $this.attr("disabled", false).busyLoad("hide")
        })


    }
    $(document).ready(function () {
        const $date_time_picker = $('#start_date,#end_date');


        $date_time_picker.datetimepicker({
            maxDate: new Date(),
            defaultDate: new Date(),

            format: "L",
            icons: {
                time: 'far fa-clock',

            }
        });

        $date_time_picker.on("change.datetimepicker", function (e) {
            $date_time_picker.datetimepicker('maxDate', new Date());
        });
        const $fetchTransactionsContainer = $("#fetch_transactions_container");
        let postD = {};
        let $result_table = $("#fetch_transactions_result");
        let fetch_transactions_form = false;
        let resultsData = []

        function populateTable(url, dataArr, cb = undefined) {
            $fetchTransactionsContainer.busyLoad("show")

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
<td class="payment_status">${$resultElement.payment_status === "PAID_OFF" ? "YES" : "NO"}</td>
<td>${$resultElement.transaction_type}</td>
<td><button class="btn btn-info btn-sm catalog-view-more small" data-data_id='${i++}'>View more</button></td>
<td>${$resultElement.description}</td>

</tr>`;
                    }
                } else {
                    resultsData = [];
                    rowsStr = `<tr >
                           <td COLSPAN="5">NO RECORDS AVAILABLE</td>
                        </tr>`;
                }

                $result_table.html(rowsStr);

                $("#fetch_transactions_result_footer").html(generatePaginationLinks($result.current_page, Math.ceil($result.total / $result.per_page), this.url));

                cb && cb(...arguments);

            }).always(function () {
                fetch_transactions_form = false;
                $fetchTransactionsContainer.busyLoad("hide")
            })
        }


        $result_table.delegate(".catalog-view-more", "click", function () {
            let $this = $(this);

            let $transaction = resultsData[$this.data("data_id")];

            if ($transaction) {

                $info_modal_body.html(`
            <div class="card">
                <div class="card-body">
   <dl>
                        <dt>Catalog Name</dt>
                        <dd><span class=" badge bg-primary">${$transaction.catalog.name}</span> </dd>
                        <dt>Catalog Type</dt>
                        <dd><span class=" badge bg-primary">${$transaction.catalog.catalog_type}</span></dd>
                        <dt> Purchased On</dt>
                        <dd><span class=" badge bg-info">${(new Date($transaction.purchased_at).format("ddd mmm dd yyyy hh:MM:ss TT"))}</span></dd>
                        <dt>Paid On</dt>
                        <dd><span class=" badge bg-info">${($transaction.paid_at && (new Date($transaction.paid_at).format("ddd mmm dd yyyy hh:MM:ss TT"))) || "No Payment Yet"}</span></dd>
                        <dt>Transaction Type </dt>
                        <dd><span class=" badge bg-orange">${$transaction.transaction_type}</span></dd>
                        <dt>Quantity Type</dt>
                        <dd>  <span class=" badge bg-success">${$transaction.qty_type}</span></dd>
                        <dt>Quantity</dt>
                        <dd><span class=" badge bg-success">${$transaction.quantity.toLocaleString()}</span></dd>
                        <dt>Price</dt>
                        <dd>   <span class=" badge bg-success">₦ ${$transaction.price.toLocaleString()}</span></dd>

                        <dt>Description </dt>
                        <dd><span class=" ">${$transaction.description}</span></dd>
                    </dl>
                  <div>
             <ul class="nav flex-column">
                  <li class="nav-item">
                    <span class="nav-link">
                      <button class="btn btn-danger btn-sm catalog-view-more small" onclick='deleteTransaction.call(this,${$transaction.id})'>delete</button> ${$transaction.paid_at?"":`<span class="float-right badge bg-orange"><button class="btn btn-info btn-sm catalog-view-more small" onclick='markTransactionAsPaid.call(this,${$transaction.id})'>Mark As Paid</button></span>`}
                    </span>
                  </li>
                </ul>
             </div>
                </div>
            </div>
            `)
            }
            $info_modal_title.html("Transaction Info")
            $info_modal.modal("show")
        })


        let fetch_url = "{{route("transactions")}}";
        $fetchTransactionsContainer.delegate(`[href^='${fetch_url}']`, "click", function () {

            populateTable(this.href, postD)
            console.log((this));
            return false;
        });
        const $input_table_search = $("input[name='table_search']");
        const $fetch_transactions_table_search = $("#fetch_transactions_table_search");

        $fetch_transactions_table_search.click(function () {
            postD["search"] = $input_table_search.val();
            populateTable(fetch_url, postD)
            return false;
        });


        $("#fetch_transactions_form").submit(function () {
            let $this = $(this);
            if (fetch_transactions_form || !$this.valid()) {
                return false;
            }
            fetch_transactions_form = true;

            let formD = $this.serializeArray();
            console.log(formD);
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
            populateTable(fetch_url, dataArr, function ($data) {
                // console.log($data);
                if ($data.data.length) {
                    $input_table_search.attr("readonly", false)
                    $fetch_transactions_table_search.attr("disabled", false)
                } else {
                    $input_table_search.attr("readonly", true)
                    $fetch_transactions_table_search.attr("disabled", true)
                }
            })

            console.log({dataArr, formD});

            return false;
        })
            .validate({
                rules: {
                    "catalog_ids[]": {
                        maxlength: 3,
                    },

                },
                messages: {
                    "catalog_ids[]": {
                        maxlength: "select at most 3 catalogs",
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
        })
    });


</script>
