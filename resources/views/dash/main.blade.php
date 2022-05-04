<?php
/**
 * Created by PhpStorm
 * User: Junior Trust
 * Date: 8/13/2020
 * Time: 7:01 PM
 */
?>
@extends("dash.layouts.lte")

@section("css")

@endsection

@section("content")
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Blank Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content" id="main_app">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Title</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                                title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    Start creating your amazing application!
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection



@section('js')

    <!-- OPTIONAL SCRIPTS -->
    {{--    <script src="{{asset('lte/plugins/chart.js/Chart.min.js')}}"></script>--}}
    {{--    <script src="{{asset('lte/dist/js/pages/dashboard3.js')}}"></script>--}}

    <script>
        function debounce(func, wait, immediate) {
            var timeout;
            return function () {
                var context = this, args = arguments;
                var later = function () {
                    timeout = null;
                    if (!immediate) func.apply(context, args);
                };
                var callNow = immediate && !timeout;
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
                if (callNow) func.apply(context, args);
            };
        }

        let $catalogs = [];

        function hydrateCatalogs(url = "{{route("catalogs",["limit"=>10])}}", merge = false, cb = undefined) {

            $.get(url, function ($page) {
                if (merge) {

                    // $page.data.forEach(function ($item){
                    //     Object.defineProperty($item, 'text', { get: function() { return this.name; } });
                    //     $catalogs.push($item)
                    // })
                    // $catalogs=  $catalogs.concat($page.data);
                    $catalogs.push(...$page.data)
                } else {
                    // $catalogs = [];
                    // $page.data.forEach(function ($item){
                    //     Object.defineProperty($item, 'text', { get: function() { return this.name; } });
                    //     $catalogs.push($item)
                    // })

                    $catalogs = $page.data;

                }
                console.log($catalogs);
                if ($page.next_page_url) {
                    hydrateCatalogs($page.next_page_url, true)
                }
            });
        }

        hydrateCatalogs();


        function getUrlParameters(url = window.location.hash) {
            // let sPageURL = window.location.hash.substring(1),
            let sPageURL = url.substring(1),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;
            let $params = {}

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');
                try {
                    $params[sParameterName[0]] = decodeURIComponent(sParameterName[1] || true);
                } catch (e) {
                    $params[sParameterName[0]] = undefined;

                }
            }

            return $params;
        }

        function getUrlParameter(sParam, url = window.location.hash) {
            return getUrlParameters(url)[sParam]
        }

        function createUrlParams(dataObj) {
            return location.origin + location.pathname + "#" + $.param(dataObj)
        }

        function saveHistory(params) {
            window.history.pushState('localhost', "{{config("app.name")}}", location.origin + location.pathname + "#" + params);
        }

        /*creates data properties for each key of the*/
        function buildDataProps(dataObj) {

            let props = "";
            if (dataObj) {

                for (const prefix in dataObj) {

                    props += ` data-${prefix.replace(/[A-Z]/g, letter => `_${letter.toLowerCase()}`)}="${dataObj[prefix]}"`
                }
            }
            return props;
        }

        let $mainApp = $('#main_app');
        // $.busyLoadFull("show");
        let page_loading = false;
        let push_state = true;

        function load_partial(url, cb = undefined) {
            if (page_loading) {
                return false;
            }
            let link = url;
            page_loading = true;
            $.busyLoadFull("show");
            if (url[0] === "/") {
                url = "." + url;
            }
            $.get(url, function ($response) {

                // $(".page_name_place").html($this.title);

                $mainApp.html($response);
                if (push_state)
                    saveHistory($.param({link}))
                else push_state = true;

                if (cb) cb();


            }).always(function () {
                page_loading = false;
                $.busyLoadFull("hide");
            });

        }

        $(".dash_page").click(function () {

            console.log(this.hash);


            let url = this.hash.replace(/.*link=/, "")


            let $this = this;

            load_partial(url, function () {
                $('.nav-link.dash_page.active').removeClass("active")
                    .parent("li").parents('li').find(".nav-link.active").removeClass("active");
                $($this).addClass("active")
                    .parent("li").parents('li').find(".nav-link.dash_grp").addClass("active");
                // $(".page_name_place").html($this.title);

                $("#sidebar-overlay").click();
            })

            return false;
        })

        function loadActive() {
            $(".nav-link.active.dash_page").click();
        }

        $mainApp.delegate(".loadActive", 'click', loadActive);
        $mainApp.delegate("[data-catalog_id]", 'click', function () {

            let url = '{{route("catalog_view","#4#")}}'.replace("#4#", $(this).data("catalog_id"));

            console.log(url);
            load_partial(url)
            return false;
        });


        // Revert to a previously saved state
        function loadPrev () {
            let url = decodeURIComponent(window.location.hash.replace(/.*link=/, ""));


            console.log(url);

            if (!url) {
                return loadActive();
            }
            let $elem = $(`[href='#link=${url}']`)

            return $elem.length ? $elem.click() : load_partial(url);


        }
        $(document).ready(loadPrev);

        window.addEventListener('popstate', function (event) {
            push_state=false;
            loadPrev();

            // let url = decodeURIComponent(window.location.hash.replace(/.*link=/, ""));
            // console.log({event, url});
        });
    </script>
@endsection

@section("modals")
    @include("dash.partial._info-modal_")
@endsection
