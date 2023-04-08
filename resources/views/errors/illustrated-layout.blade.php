<!DOCTYPE html>
<html lang="ar" dir="rtl" direction="rtl">
<!--begin::Head-->
<head>
    <title>{{config('app.name')}} | @yield('title')</title>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="{{asset('assets/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{asset('css/custom.css')}}" rel="stylesheet" type="text/css"/>
</head>
<!--begin::Body-->
<body id="kt_body" style="background-color: #2b3643">
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Error 404 -->
    <div
        class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
        style="background-image: url({{asset('assets/media/illustrations/progress-hd.png')}})">
        <!--begin::Content-->
        <div class="d-flex flex-column flex-column-fluid text-center p-10 py-lg-20">
            <!--begin::Logo-->
            <a href="{{config('app.url')}}" class="mb-10 pt-lg-20">
                <img alt="Logo" src="https://ppb.ps/assets/site/images/logo.png" class="h-50px mb-5"/>
            </a>
            <!--end::Logo-->
            <!--begin::Wrapper-->
            <div class="pt-lg-10">
                <!--begin::Logo-->
                <h1 class="fw-bolder fs-4x text-gray-700 mb-10">@yield('code',__('Oh no'))</h1>
                <!--end::Logo-->
                <!--begin::Message-->
                <div class="fw-bold fs-3 text-gray-400 mb-15"> @yield('message')</div>
                <!--end::Message-->
                <div class="relative pb-19 flex-md-center w-100">
                    @yield('image')
                </div>
                <!--begin::Action-->
                <div class="text-center">
                    <a href="{{redirect()->back()->getTargetUrl()}}"
                       class="btn btn-lg btn-secondary fw-bolder ps-15 pe-15">العودة </a>
                </div>
                <!--end::Action-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->
        <!--begin::Footer-->
        <div class="d-flex flex-center flex-column-auto p-10 ps-5">
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-5 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{config('app.url')}}"
                       class="text-muted text-hover-primary px-2 breadcrumb-item ">
                        {{config('app.name')}}
                    </a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">قسم الحاسوب</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">{{date("Y")}}©</li>
                <!--end::Item-->
            </ul>
        </div>
        <!--end::Footer-->
    </div>
    <!--end::Authentication - Error 404-->
</div>
<!--end::Main-->
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
