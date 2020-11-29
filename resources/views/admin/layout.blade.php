@include('admin.partials.head')

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        @include('admin.partials.header-mobile')
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        @include('admin.partials.aside')
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            @include('admin.partials.header')
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
                @yield('content')
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

@include('admin.partials.foot')
