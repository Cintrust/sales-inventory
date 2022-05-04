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
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create New <small>Catalog Entry</small></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="create_catalog_form">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputname">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputname" placeholder="Enter name">
                            <em class="error-form name-error   invalid-feedback_2 text-danger"></em>

                        </div>
                        <div class="form-group">
                            <label for="catalog_type">Type</label>
                            <select name="catalog_type" class="form-control" required  id="catalog_type">
                                <option value="" selected disabled>choose</option>
                                <option value="{{\App\Catalog::TYPE_GOODS}}">{{\App\Catalog::TYPE_GOODS}}</option>
                                <option value="{{\App\Catalog::TYPE_UTILITY}}">{{\App\Catalog::TYPE_UTILITY}}</option>
                            </select>
                            <em class="error-form catalog_type-error   invalid-feedback_2 text-danger"></em>

                        </div>
                        <div class="form-group goods_only_prop">
                            <label for="qty_per_bulk">Quantity Per Bulk</label>
                            <input type="number" disabled name="qty_per_bulk" min="0" step="1" required class="form-control" id="qty_per_bulk" placeholder="quantity per bulk">
                            <em class="error-form qty_per_bulk-error   invalid-feedback_2 text-danger"></em>

                        </div>
                        <div class="form-group goods_only_prop">
                            <label for="low_stock_qty">Low Stock Quantity</label>
                            <input type="number" disabled name="low_stock_qty" min="0" step="1"  required class="form-control" id="low_stock_qty" placeholder="low stock quantity">
                            <em class="error-form low_stock_qty-error   invalid-feedback_2 text-danger"></em>

                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control autosize-input" id="description" placeholder="entry description" ></textarea>
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
        $("#create_catalog_form").submit(function (){

            let $this =  $(this);


            if (create_catalog_form||!$this.valid()) {
                return false;
            }
            create_catalog_form=true;
            $this.busyLoad("show",{text:'submiting.',color: "blue",spinner: "cube-grid"})


            $.post("{{route("create_catalog")}}",$this.serializeArray(),function ($response){
                $catalogs.push($response.catalog)
                toastr.success("Catalog Created", "Done");

                $this.trigger("reset");
            }).always(function (){
                    $this.busyLoad("hide");
                create_catalog_form=false;
                });

            return false;
        })
            .validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 1, maxlength:200
                    },
                    description: {
                        required: true,
                        minlength: 1, maxlength:200
                    },

                    qty_per_bulk: {
                        required: true,
                        integer: true,
                        min: 1, max:2000000
                    },
                    catalog_type: {
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
