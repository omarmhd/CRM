<meta charset="utf-8"/>
<meta name="description" content=""/>
<meta name="keywords" content=""/>
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<link rel="canonical" href="{{config('app.url')}}"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="shortcut icon" href="{{asset("images/logo.png")}}">
<!--begin::Fonts-->
{{--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>--}}
<link rel="stylesheet" href="{{asset("assets/css/toastr.css")}}">
{{--<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">--}}


<!--end::Fonts-->
<!--begin::Global Stylesheets Bundle(used by all pages)-->
<link href="{{asset('assets/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>
<!--end::Global Stylesheets Bundle-->
<link href="{{asset("assets/css/select2.min.css")}}" rel="stylesheet" />

{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />--}}

@stack('css')
<style>
    @font-face {
        font-family: 'Cairo-Regular';
        font-style: normal;
        src: url('/assets/font/Cairo-Regular.ttf');

    }

    html, body{

        font-family: Cairo-Regular,"sans-serif" !important;

    }</style>
