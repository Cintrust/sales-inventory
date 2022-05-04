<?php
/**
 * Created by PhpStorm
 * User: Junior Trust
 * Date: 8/14/2020
 * Time: 5:57 AM
 */
?>

<style>
    .control_btn{
        margin: 3px;
    }
    .dataTables_info{
        overflow: auto;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Catalogs:</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 200px;">
                            <label for="jkgkhgkjgjjgjgj">

                                <select name="category_type" class="form-control category_type" id="jkgkhgkjgjjgjgj">
                                    <option class="category_type_option " value="">Show All</option>
                                    <option class="category_type_option" value="{{\App\Catalog::TYPE_UTILITY}}"> Show
                                        only Goods
                                    </option>
                                    <option class="category_type_option" value="{{\App\Catalog::TYPE_GOODS}}"> Show only
                                        Utilities
                                    </option>
                                </select>
                            </label>

                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body ">
                    <table id="example2"  class="table table-bordered    table-striped">


                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="edit-catalog-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create New <small>Catalog Entry</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="javascript:void(0)" data-id="#" id="update_catalog_form">
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

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>

    $(function () {
        let category = "";
        $.fn.dataTable.ext.search = [];
        $.fn.dataTable.ext.search.push(
            function (settings, searchData, index, rowData, counter) {
                return rowData.catalog_type !== category;
            }
        );

        let $table = $("#example2").DataTable({
            data: $catalogs,
            "deferRender": true,
            rowId:  function(a) {
                return 'catalog_id_' + a.id;
            },
            // dom: 'Bfrtip',
            // buttons: [
            //     'print'
            // ],
            columns: [
                {
                    // "width": "20px",
                    data: null, defaultContent: '1',
                    // render:function (data, type, row, meta){
                    //     // console.log(meta);
                    //     return meta.row;
                    // },
                    // className: 'control',
                    className: 'all',
                    orderable:false,
                    title: "More Info",
                    "searchable": false
                },
                {data: 'name', title: "Name",className:"all",},
                {data: 'catalog_type', className:"all", title: "Catalog Type"},
                {data: 'qty_in_stock', title: "Qty in Stock"},
                {data: 'low_stock_qty', title: "Low Stock Qty"},
                {data: 'qty_per_bulk', title: "Qty Per Bulk"},
                {data: 'description', className:"desktop", title: "Description"},
                {data: null,className:"min-tablet-p",
                    // "defaultContent":
                    //     `
                    // <a class="btn btn-xs btn-primary  control_btn"><i class="fas fa-info"></i> View </a>
                    // <a class="btn btn-xs btn-success control_btn edit_catalog"><i class="fas fa-edit"></i> Edit </a>
                    // <a class="btn btn-xs btn-danger control_btn"><i class="fas fa-trash"></i> Delete </a>
                    //     `,
                    render:function (data, type, row, meta){
                      return   `
                    <a class="btn btn-xs btn-primary  control_btn " data-catalog_id="${data.id}" data-row="${meta.row}"><i class="fas fa-info"></i> View </a>
                    <a class="btn btn-xs btn-success control_btn edit_catalog" data-row="${meta.row}"><i class="fas fa-edit"></i> Edit </a>
                    <a class="btn btn-xs btn-danger control_btn d-none" data-row="${meta.row}" ><i class="fas fa-trash"></i> Delete </a>
                        `;
                    },
                    title: "Controls",
                    orderable:false,
                }
            ],
            // "responsive": true,
            responsive:true,
            // columnDefs: [
            //     {
            //         "targets": -1,
            //         "data": null,
            //
            //     }
            //     ],
            order: [ 1, 'asc' ],
            "autoWidth": false,
            // "scrollY": true,
            // "sScrollX": "100%",
            stateSave: true,
            "stateSaveParams": function (settings, data) {
                // data.search.search = "";
                data.category = {
                    value: category
                };
            },
            "createdRow": function (row, data, index) {

                if (data.qty_in_stock < data.low_stock_qty) {
                    $(row).addClass("text-warning text-bold ")
                }
            },
            "stateLoadParams": function (settings, data) {
                let ca = data.category || {};
                let val = ca.value || "";
                category = $(`option.category_type_option[value='${val}']`).length ? val : ""
                $("select.category_type").val(category)
            },
            // rowId: 'id'
            // "scrollX": true
        });
        $("select[name='category_type']").change(function () {

            category = this.selectedOptions.length ? this.selectedOptions[0].value : "";

            $table.draw();

        });
        console.log($table);
        let updating_catalog_form= false;


        let $edit_catalog_modal= $("#edit-catalog-modal");

        $('#example2 tbody').on( 'click', '.edit_catalog', function () {


            if(!updating_catalog_form){
                let data = $table.row( $(this).data('row') ).data();
                console.log($(this).parents('tr'));

                $("#update_catalog_form").data("id",data.id)
                for (let item of ["name","description","low_stock_qty","qty_per_bulk","catalog_type"]) {
                    console.log(`#update_catalog_form ${item}`);
                    $(`#update_catalog_form [name="${item}"]`).val(data[item]);

                }
                $(`#update_catalog_form [name="catalog_type"]`).trigger('change');
            }


            $edit_catalog_modal.modal("show")



        } );

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

       let $update_catalog_form =  $("#update_catalog_form").submit(function (){

            let $this =  $(this);

            console.log($this);


            if (updating_catalog_form||!$this.valid()) {
                return false;
            }
            updating_catalog_form=true;
            $this.busyLoad("show",{text:'submiting.',color: "blue",spinner: "cube-grid"})



            $.post("{{route("update_catalog","")}}"+"/"+$this.data("id"),$this.serializeArray(),function ($response){

                console.log($response);

                let data = $table.row("#catalog_id_"+$response.catalog.id).data();
                console.log(data);
                for (let catalogKey in $response.catalog) {
                    if($response.catalog.hasOwnProperty(catalogKey))
                        data[catalogKey] =$response.catalog[catalogKey];
                }
                $table.row("#catalog_id_"+$response.catalog.id).data($response.catalog);


                toastr.success("Catalog Updated", "Done");



                // $this.trigger("change")
                // validator.resetForm();
            }).always(function (){
                    $this.busyLoad("hide");
                updating_catalog_form=false;
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

        $edit_catalog_modal.on('hidden.bs.modal', function (e) {
            $update_catalog_form.resetForm();
        });

    })

</script>
