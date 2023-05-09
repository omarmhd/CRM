<script type="text/javascript">
    $(document).ready(function () {

        globalThis.table = $('#table_id').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            ajax: "{{route('point-awards.index')}}",
            language: {
                "lengthMenu": "عرض _MENU_ صف في الصفحة",
                "zeroRecords": "لم يتم إيجاد شيء",
                "info": "عرض صفحة _PAGE_ من _PAGES_",
                "infoEmpty": "لا يوجد أي بيانات متاحة",
                "infoFiltered": "(تصفية من _MAX_ العدد الكلي للصفوف)",
                "sSearch": "البحث:"

            },
            columns: [

                { data: 'DT_RowIndex', 'orderable': true, 'searchable': false },
                {data: 'client', name: 'client'},
                {data: 'points', name: 'points'},
                {data: 'redeemed_points', name: 'redeemed_points'},
                {data: 'awards', name: 'awards'},

                {data: 'created_at', name: 'created_at'},
                {data:'action',name: 'action'},
            ]

        });

    });
</script>
