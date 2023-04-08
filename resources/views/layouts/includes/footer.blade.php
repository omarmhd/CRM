<!--begin::Footer-->
<div class="footer py-4 d-flex flex-lg-column" id="kt_footer" style="background-color: #181c32">
    <!--begin::Container-->
    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1">

            <a href="" target="_blank" class="text-gray-800 text-hover-primary">ي</a>
            <span class="text-muted fw-bold me-1">©{{date("Y")}}</span>
        </div>
        <!--end::Copyright-->

    </div>
    <!--end::Container-->
</div>

<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <!--begin::Svg Icon | path: icons/duotone/Navigation/Up-2.svg-->
    <span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                     height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24"/>
						<rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10" rx="1"/>
						<path
                            d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                            fill="#000000" fill-rule="nonzero"/>
					</g>
				</svg>
			</span>
    <!--end::Svg Icon-->
</div>
@include("massages.tostar")

<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
<script src="{{asset('assets/js/toastr.min.js')}}"></script>
{{--<script src="https://npmcdn.com/flatpickr/dist/l10n/ar.js"></script>--}}

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/localization/messages_ar.min.js"></script>--}}

<script>
    var url = window.location;
    var element = $('.menu-item a').filter(function() {
        return this.href == url
    }).addClass('active');
    if (element.parent().parent().parent('.menu-accordion').length) {

        element.parent().parent().parent('.menu-accordion').find(".menu-active-bg").show()
    }
</script>


{{--<script>--}}
{{--    flatpickr.localize(flatpickr.l10ns.ar);--}}
{{--    toastr.options = {--}}
{{--        'closeButton': true,--}}
{{--        'closeClass': 'toast-close-button',--}}
{{--        'closeDuration': 300,--}}
{{--        'closeEasing': 'swing',--}}
{{--        'closeHtml': '<button class="m-5 ms-3"><i class="icon-off"></i></button>',--}}
{{--        'closeMethod': 'fadeOut',--}}
{{--        'closeOnHover': true,--}}
{{--        'containerId': 'toast-container',--}}
{{--        'debug': false,--}}
{{--        'escapeHtml': false,--}}
{{--        'extendedTimeOut': 10000,--}}
{{--        'hideDuration': 1000,--}}
{{--        'hideEasing': 'linear',--}}
{{--        'hideMethod': 'fadeOut',--}}
{{--        'iconClass': 'toast-info',--}}
{{--        'iconClasses': {--}}
{{--            'error': 'toast-error',--}}
{{--            'info': 'toast-info',--}}
{{--            'success': 'toast-success',--}}
{{--            'warning': 'toast-warning',--}}
{{--        },--}}
{{--        'messageClass': 'toast-message',--}}
{{--        'newestOnTop': false,--}}
{{--        'onHidden': null,--}}
{{--        'onShown': null,--}}
{{--        'positionClass': 'toast-bottom-left',--}}
{{--        'preventDuplicates': true,--}}
{{--        'progressBar': true,--}}
{{--        'progressClass': 'toast-progress',--}}
{{--        'rtl': false,--}}
{{--        'showDuration': 300,--}}
{{--        'showEasing': 'swing',--}}
{{--        'showMethod': 'fadeIn',--}}
{{--        'tapToDismiss': true,--}}
{{--        'target': 'body',--}}
{{--        'timeOut': 5000,--}}
{{--        'titleClass': 'toast-title',--}}
{{--        'toastClass': 'toast',--}}
{{--    };--}}
{{--    var initDataTable = {--}}
{{--        "language": {--}}
{{--            "search": "بحث : ",--}}
{{--            "sSearchPlaceholder": "إبحث عن البيانات في الجدول",--}}
{{--            "zeroRecords": "لا يوجد بيانات لعرضها",--}}
{{--            "sProcessing": "جاري المعالجة ....",--}}
{{--            "sLoadingRecords": "تحميل ....",--}}
{{--            "emptyTable": "لايوجد بيانات لعرضها",--}}
{{--            "paginate": {--}}
{{--                "sPrevious": "السابق",--}}
{{--                "sNext": "التالي",--}}
{{--                "sLast": "الأخير",--}}
{{--                "sFirst": "الأول",--}}
{{--            },--}}
{{--            "infoEmpty": "لايوجد أعمدة",--}}
{{--            "info": "صفحة _PAGE_ من _PAGES_",--}}
{{--            "sInfoFiltered": "( ما تمت تصفيته من إجمالي  _MAX_ صفوف  )",--}}
{{--        },--}}
{{--        "lengthMenu": [[5, 10, 25, 50, 75, -1], [5, 10, 25, 50, 75, "الكل"]],--}}
{{--        responsive: true,--}}
{{--        processing: true,--}}
{{--        serverSide: true,--}}
{{--        ajax: '',--}}
{{--        columns: [{"title": "", "className": "", "sortable": false}],--}}
{{--        order: [[1, "asc"]],--}}
{{--        columnDefs: [--}}
{{--            {--}}
{{--                targets: 0,--}}
{{--                orderable: false,--}}
{{--                sortable: false,--}}
{{--            },--}}
{{--        ],--}}
{{--    };--}}
{{--    var time_interval=5000;--}}
{{--    $.ajaxSetup({--}}
{{--        headers: {--}}
{{--            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}
<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript(used by this page)-->
@stack('js')

@include('massages.tostar')
<!--end::Page Custom Javascript-->
<!--end::Javascript-->
