@extends('layouts.app_admin')
@section('title','الرسائل النصية  ')
@section('toolbar.title','لوحة التحكم')
@section('breadcrumb')
    <!--begin::Item-->
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-400 w-5px h-2px"></span>
    </li>

    <li class="breadcrumb-item text-muted">لوحة التحكم</li>
@endsection
@push('css')


    <link href="{{asset('assets/css/jquery.dataTables.min.css')}}" rel="stylesheet"
          type="text/css"/>
@endpush
@section('content')


    <!--begin::Tables Widget 13-->
    <form id="form1" class="form" method="POST" action="javascript:void(0)">

        @method("put")
    <div class="card">
        <!--begin::Card header-->



        <div class="row p-3">

                <div class="col-md-4">
                    <input name="title" placeholder="الهدف من رسالة" type="text" value="{{$sms->title}}" class="form-control form-control-solid">
                </div>
                <div class="col-md-4">

                    <textarea name="content" class="form-control form-control-solid" placeholder="المحتوى"  id="" >{{$sms->content}}</textarea>
                </div>
                <div class="col-md-4">
                    <button type="submit"class="btn btn-primary ">ارسال <i class="fa fa-sms"></i></button>
                </div>


            <!--begin::Card title-->
        {{--            <div class="card-title">--}}
        {{--                جدول البيانات--}}


        {{--            </div>--}}
        <!--begin::Card title-->
            <!--begin::Card toolbar-->

            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">

                <!--begin::Table-->
                <table id="table_id"
                       class="table table-bordered table-hover table-row-gray-300 align-middle gs-0 gy-3 border-1 text-center fs-7">
                    <!--begin::Table head-->
                    <thead>
                    <tr class="fw-bolder  bg-secondary text-muted ">
                        <th class="w-10 text-center"  style="width:1%">#</th>
                        <th class="w-10 text-center"  style="width:1%"></th>
                        <th class="w-10  text-center"  style="width:10%">الاسم</th>
                        <th class="w-10  text-center"  style="width:10%">الجوال</th>



                    </tr>


                    </thead>


                    </tr>

                    <!--end::Table head-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
    </div>
    </form>
    <!--end::Tables Widget 13-->
@endsection

@push('js')
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    @include("parts.sweetCreate", ['route' => route('sms.update',['sms' => $sms]),'method'=>'put',"redirect"=>route("sms.index")])

    @include('sms._datatableClients',["sms"=>$sms])
@endpush
