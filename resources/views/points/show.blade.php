@extends('layouts.app_admin')


@section('breadcrumb')
    <!--begin::Item-->
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-400 w-5px h-2px"></span>
    </li>

    <li class="breadcrumb-item text-muted">تقيماتي</li>
@endsection
@push('css')
{{--    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet"--}}
{{--          type="text/css"/>--}}
@endpush

@section('content')
    @include('modals.acceptable')
    @include('modals.notes')
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">

        @empty($surveyLatest)

            <!--begin::Alert-->
                <div class="alert alert-dismissible bg-light-danger border border-danger border-dashed d-flex flex-column flex-sm-row w-100 p-5 mb-10">
                    <!--begin::Icon-->
                    <!--begin::Svg Icon | path: icons/duotone/Interface/Comment.svg-->
                    <span class="svg-icon svg-icon-2hx svg-icon-danger me-4 mb-5 mb-sm-0">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd" d="M5.69477 2.48932C4.00472 2.74648 2.66565 3.98488 2.37546 5.66957C2.17321 6.84372 2 8.33525 2 10C2 11.6647 2.17321 13.1563 2.37546 14.3304C2.62456 15.7766 3.64656 16.8939 5 17.344V20.7476C5 21.5219 5.84211 22.0024 6.50873 21.6085L12.6241 17.9949C14.8384 17.9586 16.8238 17.7361 18.3052 17.5107C19.9953 17.2535 21.3344 16.0151 21.6245 14.3304C21.8268 13.1563 22 11.6647 22 10C22 8.33525 21.8268 6.84372 21.6245 5.66957C21.3344 3.98488 19.9953 2.74648 18.3052 2.48932C16.6859 2.24293 14.4644 2 12 2C9.53559 2 7.31411 2.24293 5.69477 2.48932Z" fill="#191213"></path>
																<path fill-rule="evenodd" clip-rule="evenodd" d="M7 7C6.44772 7 6 7.44772 6 8C6 8.55228 6.44772 9 7 9H17C17.5523 9 18 8.55228 18 8C18 7.44772 17.5523 7 17 7H7ZM7 11C6.44772 11 6 11.4477 6 12C6 12.5523 6.44772 13 7 13H11C11.5523 13 12 12.5523 12 12C12 11.4477 11.5523 11 11 11H7Z" fill="#121319"></path>
															</svg>
														</span>
                    <!--end::Svg Icon-->
                    <!--end::Icon-->
                    <!--begin::Content-->
                    <div class="d-flex flex-column pe-0 pe-sm-10">
                        <h5 class="mb-1">رسالة تنبيه</h5>
                        <span> مرحبا {{auth()->user()->full_name}} ,لا يوجد لديك تقيمات في الوقت الحالي </span>
                    </div>
                    <!--end::Content-->
                    <!--begin::Close-->
{{--                    <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">--}}
{{--                        <i class="bi bi-x fs-1 text-danger"></i>--}}
{{--                    </button>--}}
                    <!--end::Close-->
                </div>
{{--            <div class="alert  alert-custom alert-secondary" role="alert">--}}
{{--                <div class="alert-icon"><i class="flaticon-questions-circular-button"></i></div>--}}
{{--                <div class="alert-text"> {{auth()->user()->full_name}} للأسف لا يوجد تقيمات!</div>--}}
{{--            </div>--}}

        @else
            <div id="kt_content_container" class="container">
                <!--begin::Navbar-->
                <div class="card mb-5 mb-xxl-8">
                    <div class="card-body pt-9 pb-0">
                        <!--begin::Details-->
                        <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                            <!--begin: Pic-->
                            <div class="me-7 mb-4">
                                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                    <img src="{{asset('images/avatar.png')}}" alt="image" />
                                    <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div>
                                </div>
                            </div>
                            <!--end::Pic-->
                            <!--begin::Info-->
                            <div class="flex-grow-1">
                                <!--begin::Title-->
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <!--begin::User-->
                                    <div class="d-flex flex-column">
                                        <!--begin::Name-->
                                        <div class="d-flex align-items-center mb-2">
                                            <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bolder me-1">{{$user->name}}</a>
                                            {{--                                        <a href="#">--}}
                                            {{--                                            <!--begin::Svg Icon | path: icons/duotone/Design/Verified.svg-->--}}
                                            {{--                                            <span class="svg-icon svg-icon-1 svg-icon-primary">--}}
                                            {{--																	<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
                                            {{--																		<path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="#00A3FF" />--}}
                                            {{--																		<path class="permanent" d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white" />--}}
                                            {{--																	</svg>--}}
                                            {{--																</span>--}}
                                            {{--                                            <!--end::Svg Icon-->--}}
                                            {{--                                        </a>--}}
                                        </div>
                                        <!--end::Name-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                            <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                                <!--begin::Svg Icon | path: icons/duotone/General/User.svg-->
                                                <span class="svg-icon svg-icon-4 me-1">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24" />
																		<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																		<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
																	</g>
																</svg>
															</span>
                                                <!--end::Svg Icon-->{{$user->full_name}}</a>
                                            <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                                <!--begin::Svg Icon | path: icons/duotone/Communication/Mail-at.svg-->
                                                <span class="svg-icon svg-icon-4 me-1">
																<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<path d="M11.575,21.2 C6.175,21.2 2.85,17.4 2.85,12.575 C2.85,6.875 7.375,3.05 12.525,3.05 C17.45,3.05 21.125,6.075 21.125,10.85 C21.125,15.2 18.825,16.925 16.525,16.925 C15.4,16.925 14.475,16.4 14.075,15.65 C13.3,16.4 12.125,16.875 11,16.875 C8.25,16.875 6.85,14.925 6.85,12.575 C6.85,9.55 9.05,7.1 12.275,7.1 C13.2,7.1 13.95,7.35 14.525,7.775 L14.625,7.35 L17,7.35 L15.825,12.85 C15.6,13.95 15.85,14.825 16.925,14.825 C18.25,14.825 19.025,13.725 19.025,10.8 C19.025,6.9 15.95,5.075 12.5,5.075 C8.625,5.075 5.05,7.75 5.05,12.575 C5.05,16.525 7.575,19.1 11.575,19.1 C13.075,19.1 14.625,18.775 15.975,18.075 L16.8,20.1 C15.25,20.8 13.2,21.2 11.575,21.2 Z M11.4,14.525 C12.05,14.525 12.7,14.35 13.225,13.825 L14.025,10.125 C13.575,9.65 12.925,9.425 12.3,9.425 C10.65,9.425 9.45,10.7 9.45,12.375 C9.45,13.675 10.075,14.525 11.4,14.525 Z" fill="#000000" />
																</svg>
															</span>
                                                <!--end::Svg Icon-->{{$user->email}}</a>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::User-->

                                </div>
                                <!--end::Title-->
                                <!--begin::Stats-->



                                <div class="d-flex flex-wrap flex-stack">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column flex-grow-1 pe-8">
                                        <!--begin::Stats-->
                                        <div class="d-flex flex-wrap">
                                            <!--begin::Stat-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <!--begin::Number-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-up.svg-->
                                                    <span class="svg-icon svg-icon-3 svg-icon-success me-2">
																		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																				<polygon points="0 0 24 0 24 24 0 24" />
																				<rect fill="#000000" opacity="0.5" x="11" y="5" width="2" height="14" rx="1" />
																				<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
																			</g>
																		</svg>
																	</span>
                                                    <!--end::Svg Icon-->
                                                    <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{$avgScore}}" data-kt-countup-prefix="%">0</div>
                                                </div>
                                                <!--end::Number-->
                                                <!--begin::Label-->
                                                <div class="fw-bold fs-6 text-gray-400">المتوسط العام</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Stat-->

                                            <!--begin::Stat-->
                                            <!--end::Stat-->
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Wrapper-->
                                    <!--begin::Progress-->
                                    <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                                        <b> أخر تقيم</b>
                                        <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                            <span class="fw-bold fs-7 text-gray-400">{{$surveyLatest->survey->title}}</span>
                                            <span class="fw-bolder fs-6">{{$surveyLatest->results->sum('score')}} %</span>
                                        </div>
                                        <div class="h-5px mx-3 w-100 bg-light mb-3">
                                            <div class="bg-success rounded h-5px {{$surveyLatest->results->sum('score')>70?"bg-success":"bg-warning"}} rounded h-4px" role="progressbar" style="width: {{$surveyLatest->results->sum('score')}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <!--end::Progress-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Details-->
                        <!--begin::Navs-->
                    {{--                    <div class="d-flex overflow-auto h-55px">--}}
                    {{--                        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder flex-nowrap">--}}
                    {{--                            <!--begin::Nav item-->--}}
                    {{--                            <li class="nav-item">--}}
                    {{--                                <a class="nav-link text-active-primary me-6 active" href="pages/profile/overview.html">تقيماتي</a>--}}
                    {{--                            </li>--}}
                    {{--                            <!--end::Nav item-->--}}
                    {{--                            <!--begin::Nav item-->--}}
                    {{--                            <li class="nav-item">--}}
                    {{--                                <a class="nav-link text-active-primary me-6" href="pages/profile/projects.html">حسابي</a>--}}
                    {{--                            </li>--}}


                    {{--                            <!--end::Nav item-->--}}
                    {{--                        </ul>--}}
                    {{--                    </div>--}}
                    <!--begin::Navs-->


                    </div>

                </div>
                <div class="d-flex flex-wrap flex-stack mb-6">
                    <!--begin::Heading-->
                    <h3 class="fw-bolder my-2">تقيماتي
                        <span class="fs-6 text-gray-400 fw-bold ms-1"></span></h3>
                    <!--end::Heading-->
                    <!--begin::Actions-->
                {{--                <div class="d-flex flex-wrap my-2">--}}
                {{--                    <div class="me-4">--}}
                {{--                        <!--begin::Select-->--}}
                {{--                        <select name="status" data-control="select2" data-hide-search="true" class="form-select form-select-sm form-select-white w-125px select2-hidden-accessible" data-select2-id="select2-data-10-ki72" tabindex="-1" aria-hidden="true">--}}
                {{--                            <option value="Active" selected="selected" data-select2-id="select2-data-12-wh4d">Active</option>--}}
                {{--                            <option value="Approved">In Progress</option>--}}
                {{--                            <option value="Declined">To Do</option>--}}
                {{--                            <option value="In Progress">Completed</option>--}}
                {{--                        </select>--}}
                {{--                        <!--end::Select-->--}}

                {{--                    </div>--}}
                {{--                    <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">New Project</a>--}}
                {{--                </div>--}}
                <!--end::Actions-->
                </div>
                <div class="row g-6 g-xl-9">
                    <!--begin::Col-->

                    @foreach($surveys as $survey)


                        <div class="col-md-12 col-xl-4">
                            <!--begin::Card-->
                            <div class="card border border-2 border-gray-300 border-hover">
                                <!--begin::Card header-->

                                <!--end:: Card header-->
                                <!--begin:: Card body-->
                                <div class="card-body p-9">
                                    <!--begin::Name-->

                                    <div class="fs-3 fw-bolder text-dark">{{$survey->survey->title}}
                                        {{--                                <span class="badge badge-light-primary fw-bolder me-auto px-4 py-3 ">{{$survey->survey->title}}</span>--}}

                                    </div>
                                    <!--end::Name-->
                                    <!--begin::Description-->
                                    <p class="text-gray-400 fw-bold fs-5 mt-1 mb-7">{{$survey->survey->description}}</p>
                                    <!--end::Description-->
                                    <!--begin::Info-->
                                    <div class="d-flex flex-wrap mb-5">
                                        <!--begin::Due-->
                                        <div class="border border-gray-300 border-solid rounded min-w-125px py-3 px-4 me-7 mb-3">
                                            <div class="fs-6 text-gray-800 fw-bolder">{{$survey->results->sum('score')}}%</div>
                                            <div class="fw-bold text-gray-400">درجة التقيم</div>
                                        </div>
                                        <!--end::Due-->
                                        <!--begin::Budget-->
                                        @if($survey->evaluator_notes)
                                            <div class="border border-gray-300 border-solid rounded min-w-20px py-3 px-4 mb-3">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modal_notes"  data-note="{{$survey->evaluator_notes}}">
                                                    <div class="fs-6 text-gray-800 fw-bolder hover-zoom text-danger"><span class="text-danger"><i class="fas fa-pen-square text-danger"></i> ملاحظات المقيم </span></div>
                                                    <div class="fw-bold text-gray-400"></div>
                                                </a>
                                            </div>
                                    @endif
                                    <!--end::Budget-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Progress-->
                                    <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="" data-bs-original-title="درجة تقيمك هي  {{$survey->results->sum('score')}}">
                                        <div class="{{$survey->results->sum('score')>70?"bg-success":"bg-warning"}} rounded h-4px" role="progressbar" style="width: {{$survey->results->sum('score')}}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <!--end::Progress-->
                                    <!--begin::Users-->
                                    <div class="symbol-group symbol-hover position-relative ">
                                        <!--begin::User-->


                                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="" data-bs-original-title="{{$survey->evaluator->full_name}}">
                                            <img alt="Pic" src="{{asset('images/avatar.png')}}">
                                        </div>

                                        @if($survey->status=="1" )

                                            <button  id=""  data-id="{{$survey->id}}" data-bs-toggle="modal" data-bs-target="#modal_acceptable"  class="btn btn-primary position-absolute  end-0 ">
                                                <span class="indicator-label">الموافقة</span>
                                                <span class="indicator-progress">الرجاء الإنتظار...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                            </button>

                                        @else

                                            <span id="" class="text-success position-absolute  end-0 "> <i class="fa fa-check text-success"></i> تمت الموافقة</span>

                                        @endif
                                        <span id="done_accepted" class="text-success position-absolute  end-0 d-none" style="display: none"> <i class="fa fa-check text-success"></i> تمت الموافقة</span>



                                        <!--begin::User-->
                                        <!--begin::User-->

                                        <!--begin::User-->
                                    </div>
                                    <!--end::Users-->
                                </div>
                                <!--end:: Card body-->
                                </a>
                                <!--end::Card-->
                            </div>
                        </div>

                @endforeach
                <!--end::Col-->
                    <!--begin::Col-->

                    <!--end::Col-->
                </div>


            {{$surveys->links()}}

            <!--end::Navbar-->
                <!--begin::Row-->

                <!--end::Row-->
                <!--begin::Modals-->
                <!--begin::Modal - Offer A Deal-->
                <!--end::Modal - Offer A Deal-->
                <!--end::Modals-->



            </div>
        @endempty
        <!--begin::Container-->

        <!--end::Container-->
    </div>
@endsection

@push('js')
{{--    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>--}}

            <script>
                var button=""

                $('#modal_notes').on('show.bs.modal', function (event) {

                    var btn_notes= $(event.relatedTarget) // Button that triggered the modal
                    var note =btn_notes.data('note')

                    var modal = $(this)

                    modal.find('.notes_evaluator').text(note)


                })
                $('#modal_acceptable').on('show.bs.modal', function (event) {
                    button = $(event.relatedTarget) // Button that triggered the modal
                    var id = button.data('id')

                    var modal = $(this)
                    modal.find('#accepted').attr('data-id',id)


                })
                $(document).on('click', '#accepted', function(e) {

                    e.preventDefault();

                    var id = $(this).data('id')
                    var note=$(this).parent().parent().find('.note').val()

                    var  element=$(this)
                    var url = "{{ route('status.update',['id'=>':id','type'=>'2'])  }}";
                    url = url.replace(':id', id)

                    $.ajax({
                        type: "get",
                        url: url,
                        data:{
                          'note':note,
                        },

                        beforeSend: function(response) {

                            button.parent().find('.indicator-progress').show();
                            button.parent().find('.indicator-label').hide()
                            button.parent().find('#user_submit').prop("disabled", true);

                        },
                        success: function(result) {
                            button.parent().find('.indicator-progress').hide();
                            button.parent().find('.indicator-label').show()
                            button.hide();
                            $("#modal_acceptable").modal("hide");
                            button.parent().find("#done_accepted").show();
                            button.parent().append(`<span id="done_accepted" class="text-success position-absolute  end-0 ytyryrt" > <i class="fa fa-check text-success"></i> تمت الموافقة</span>`)
                        },
                        error: function(result) {

                        }
                    });
                })

            </script>

@endpush
