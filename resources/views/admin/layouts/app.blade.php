<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="description" content="Updates and statistics" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('assets/css/plugins/custom/prismjs/prismjs.bundle.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/css/plugins/global/plugins.bundle.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/css/bootstrap-select.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/css/select2.min.css') }}" rel='stylesheet' type='text/css'>


    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>


    <script src="{{ asset('assets/js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>

    <script type="text/javascript">
        var APP_URL = {!! json_encode(url('/')) !!}
    </script>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />
    <style>
        ::file-selector-button {
            display: none;
        }

        .table th,
        .table td {
            font-size: 13px;
            padding: 6px;
        }

        .btn i {
            font-size: 10px;
        }

        .header-menu .menu-nav>.menu-item>.menu-link {
            padding: 0.55rem 1rem;
        }

        ::-webkit-scrollbar {
            width: 9px;
            /* width of the entire scrollbar */
        }

        ::-webkit-scrollbar-track {
            background: rgb(179, 178, 178);
            /* color of the tracking area */
        }

        ::-webkit-scrollbar-thumb {
            background-color: rgb(201, 201, 201);
            /* color of the scroll thumb */
            border-radius: 20px;
            /* roundness of the scroll thumb */
        }

        .iconClass {
            position: relative;
        }

        .iconClass span {
            position: absolute;
            top: 0px;
            right: 0px;
            display: block;
        }
    </style>
</head>


<body id="kt_body" class="header-fixed  subheader-enabled page-loading">

    @include('admin.includes.user_drawer')
    @yield('content')

    @include('admin.includes.scrolltotop')
</body>



<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<script>
    var base_url = APP_URL + '/';


    function checkDelete() {
        return confirm("Are you Sure You Want To Delete This Record?");
    }
</script>
</html>
