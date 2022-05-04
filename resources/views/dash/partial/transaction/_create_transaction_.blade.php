<?php
/**
 * Created by PhpStorm
 * User: Junior Trust
 * Date: 8/14/2020
 * Time: 2:23 AM
 */
?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <!-- left column -->
        <div class="col-md-8">

            <!-- jquery validation -->
            <div class="card    {{["Sales"=>"card-success","Credit Sales"=>"card-teal","Purchase"=>"card-primary","Credit Purchase"=>"card-lightblue"][$category]??"card-success"}}">
                <div class="card-header">
                    <h3 class="card-title">Create New <small>{{$category}} Entry</small></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="create_transaction_form">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="catalog_list">Catalog</label>
                            <select id="catalog_list" name="catalog_id" required class="form-control select2" style="width: 100%;">
                                <option value=""></option>
                            </select>
                            <em class="error-form catalog_id-error   invalid-feedback_2 text-danger"></em>
                        </div>
                        <div class="form-group">
                            <label for="qty_type">Quantity Type</label>
                            <select name="qty_type" class="form-control" required  id="qty_type">
                                <option value="" selected disabled>Select Quantity Type</option>
                                <option value="{{\App\Transaction::QTY_TYPE_SINGLE}}">{{\App\Transaction::QTY_TYPE_SINGLE}}</option>
                                <option value="{{\App\Transaction::QTY_TYPE_BULK}}">{{\App\Transaction::QTY_TYPE_BULK}}</option>
                            </select>
                            <em class="error-form qty_type-error   invalid-feedback_2 text-danger"></em>
                        </div>

                        <input type="hidden"  name="transaction_type" value="{{$transaction_type}}"    id="transaction_type" >
                        <input type="hidden"  name="payment_status" value="{{$payment_status}}"    id="payment_status" >
{{--                        <input type="hidden"  name="purchased_at" value="now"    id="purchased_at" >--}}
{{--                        <input type="hidden"  name="paid_at" value="now"    id="paid_at" >--}}


                        <div class="form-group ">
                            <label for="quantity">Quantity </label>
                            <input type="number"  name="quantity" min="0"  required class="form-control" id="quantity" placeholder="quantity ">
                            <em class="error-form quantity-error   invalid-feedback_2 text-danger"></em>
                        </div>

                        <div class="form-group ">
                            <label for="price">Grand Price</label>
                            <input type="number"  name="price" min="0" step="1"  required class="form-control" id="price" placeholder="Total Cost">
                            <em class="error-form price-error   invalid-feedback_2 text-danger"></em>
                        </div>
                        <div class="form-group   ">
                            <label for="purchased_at">Date of Transaction</label>

                            <div class="input-group">
                                <input type="text" class="form-control datetimepicker-input" name="purchased_at" id="purchased_at" data-toggle="datetimepicker" data-target="#purchased_at"/>
                                <div class="input-group-append">
                                    <span class="input-group-text" data-toggle="datetimepicker" data-target="#purchased_at" >
                                        <i class="fas  fa-calendar"></i></span>
                                </div>
                            </div>

                            <em class="error-form purchased_at-error   invalid-feedback_2 text-danger"></em>
                        </div>
                        @if($payment_status==\App\Transaction::PAYMENT_STATUS_PAID_OFF)
                        <div class="form-group   ">
                            <label for="paid_at">Payment Date</label>

                            <div class="input-group">
                                <input type="text" class="form-control datetimepicker-input" name="paid_at" id="paid_at" data-toggle="datetimepicker" data-target="#paid_at"/>
                                <div class="input-group-append">
                                    <span class="input-group-text" data-toggle="datetimepicker" data-target="#paid_at" >
                                        <i class="fas  fa-calendar"></i></span>
                                </div>
                            </div>

                            <em class="error-form paid_at-error   invalid-feedback_2 text-danger"></em>
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control autosize-input" id="description" placeholder="transaction description" ></textarea>
                            <em class="error-form description-error   invalid-feedback_2 text-danger"></em>

                        </div>
                    </div>
                    @csrf
                <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
</div>


<script>

    $(document).ready(function (){
     const   $date_time_picker= $('#purchased_at,#paid_at');
     $date_time_picker.datetimepicker({
            maxDate:new Date(),
         defaultDate:new Date(),
         icons: {
                time: 'far fa-clock',

            } });

     $date_time_picker.on("change.datetimepicker", function (e) {
         console.log($date_time_picker);
         $date_time_picker.datetimepicker('maxDate', new Date());
        });
//Initialize Select2 Elements
       $('.select2').select2({
            theme: 'bootstrap4',
           // placeholder:"select a catalog",
           placeholder: "Select a catalog",
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
            data:$catalogs.map(($item)=>{ return  {id:$item.id,text:$item.name} } )
        })


        autosize($(".autosize-input"));

        $(".goods_only_prop").slideUp("fast")

        $('select[name="catalog_type"]').change(function (){

            if (this.selectedOptions.length&&this.selectedOptions[0].value==="{{\App\Catalog::TYPE_GOODS}}") {
                $(".goods_only_prop").slideDown("slow")
                $("input[name='qty_per_bulk'],input[name='low_stock_qty']").attr("disabled",false)
            }else {
                $(".goods_only_prop").slideUp("slow")
                $("input[name='qty_per_bulk'],input[name='low_stock_qty']").attr("disabled",true)

            }

        });
        let create_catalog_form= false;
        $("#create_transaction_form").submit(function (){

            let $this =  $(this);


            if (create_catalog_form||!$this.valid()) {
                return false;
            }
            create_catalog_form=true;
            $this.busyLoad("show",{text:'submiting.',color: "blue",spinner: "cube-grid"})


            $.post("{{route("create_transaction")}}",$this.serializeArray(),function ($response){

                toastr.success("Transaction Created", "Done");

                console.log($response);
                $this.trigger("reset");
            }).always(function (){
                    $this.busyLoad("hide");
                create_catalog_form=false;
                });

            return false;
        })
            .validate({
                rules: {
                    catalog_id: {
                        required: true,
                    },
                    description: {
                        required: true,
                        minlength: 1, maxlength:200
                    },

                    quantity: {
                        required: true,
                        integer: true,
                        min: 1, max:2000000
                    },
                    price: {
                        required: true,
                        number: true,
                        min: 1, max:200000000
                    },
                    qty_type: {
                        required: true,
                    },

                },
                messages: {

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
    });


</script>
