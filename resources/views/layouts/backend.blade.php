<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- summernote css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('backend/css/styles.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    <!-- datatables css -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0px !important;
            margin-left: 0px !important;

        }

        div.dataTables_wrapper div.dataTables_length select {
            width: 50% !important;
        }

        div.dataTables_wrapper {
            width: 100% !important;
            margin: 0 auto !important;
            /* padding: 0 auto !important; */
            padding-left: 3px !important;
            padding-right: 0px !important;
        }
    </style>


</head>

<body>

    @include('layouts.inc.admin-navbar')

    <div id="layoutSidenav">

        @include('layouts.inc.admin-sidebar')

        <div id="layoutSidenav_content">
            <main>

                @yield('content')

            </main>

            @include('layouts.inc.admin-footer')

        </div>

    </div>

    <script src="{{asset('backend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('backend/js/scripts.js')}}"></script>
    <script src="{{asset('backend/js/jquery-3.6.0.min.js')}}"></script>

    @if(session('status'))
    <script src="{{asset('backend/js/sweetalert.min.js')}}"></script>
    <script>
        swal({
            title: "{{session('status')}}",
            text: "",
            icon: "{{session('status_code')}}",
            button: "Ok!",
        }).then(function() {
            window.location.reload();
        })
    </script>
    @endif


    <!-- summernote js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#mysummernote").summernote({
                height: 150,
            });
            $('.dropdown-toggle').dropdown();
        });
    </script>
    <!-- datatables js -->
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#mydataTable').DataTable({
                "scrollY": true,
                "scrollX": true
            });
        });
    </script>

</body>

</html>