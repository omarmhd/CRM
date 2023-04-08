<html lang="ar" dir="rtl" direction="rtl">
<!--begin::Head-->
<head>
    <title>{{config('app.name')}} | @yield('sub_title')</title>
    @include('layouts.includes.head')
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body"
      class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed"
      style="--kt-toolbar-height:65px;--kt-toolbar-height-tablet-and-mobile:55px">
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
    @include('layouts.includes.aside')
    <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
        @include('layouts.includes.header')
        <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            @include('layouts.includes.Toolbar')
            <!--begin::Post-->
                <div class="post d-flex flex-column-fluid" id="kt_post">
                    <!--begin::Container-->
                    <div id="kt_content_container" class="container">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @yield('content')
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Post-->
            </div>
            <!--end::Content-->
            @include('layouts.includes.footer')
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Root-->

</body>
<!--end::Body-->
</html>
