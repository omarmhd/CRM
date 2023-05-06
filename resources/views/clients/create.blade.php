@extends('layouts.app_admin')
@section('title','إضافة زبون')
@section('toolbar.title','لوحة التحكم')
@section('breadcrumb')
    <!--begin::Item-->
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-400 w-5px h-2px"></span>
    </li>

    <li class="breadcrumb-item text-muted">@yield('title')</li>
@endsection
@section('content')
    <!--begin::Form Widget 13-->
    <div class="card">
        <!--begin::Body-->
        <div class="card-body py-1">
            <!--begin:Form-->
            <!--begin::Heading-->
            <div class="mb-13 mt-5 text-start">
                <!--begin::Title-->
                <h1 class="mb-3">@yield('title')</h1>
                <!--end::Title-->
                <!--begin::Description-->
                <div class="text-gray-400 fw-bold fs-5">
                    @can("administrator")
                    <a href="{{route('clients.index')}}" class="fw-bolder link-primary">جميع الزبائن</a>.
                    @endcan
                </div>
                <!--end::Description-->
            </div>
            <form id="form1" class="form" method="POST" action="javascript:void(0)">


            @csrf
            <!--begin::Input group-->

                @include('clients._fields')


                <div class="text-center mt-20 ms-20 mb-20">
                    <button type="submit" id="user_submit" class="btn btn-primary">
                        <span class="indicator-label"><i class="fa fa-save"></i> حفظ </span>
                        <span class="indicator-progress">الرجاء الإنتظار...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>

                    <a href="{{route("clients.index")}}" class="btn btn-white me-3"> <i class="fa fa-"></i>إلغاء</a>
                </div>
                <!--end::Actions-->
            </form>
            <!--end:Form-->
        </div>
        <!--begin::Body-->
    </div>

@endsection
@push('js')
    @include("parts.sweetCreate", ['route' => route('clients.store'),'method'=>'post','redirect'=>route("clients.index")])
@endpush

