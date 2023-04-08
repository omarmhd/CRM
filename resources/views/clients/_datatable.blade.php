<script type="text/javascript">
    $(document).ready(function () {

        globalThis.table = $('#table_id').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            ajax: "{{route('clients.index')}}",
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

                {data: 'full_name', name: 'full_name'},
                {data: 'id_number', name: 'id_number'},
                {data: 'phone', name: 'phone'},
                {data: 'marital_status', name: 'marital_status'},
                {data: 'city', name: 'city'},
                {data: 'email', name: 'email'},
                {data: 'BOD', name: 'BOD'},
                {data: 'occupation', name: 'occupation'},

                {data: 'created_at', name: 'created_at'},
                {data: 'qr', name: 'qr'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]

        });

    });
</script>
