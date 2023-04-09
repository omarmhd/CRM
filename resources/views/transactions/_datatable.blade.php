<script type="text/javascript">
    $(document).ready(function () {

        globalThis.table = $('#table_id').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            ajax: "{{route('transactions.index')}}",
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
                {data: 'client_id', name: 'client_id'},
                {data: 'name', name: 'name'},
                {data: 'type', name: 'type'},
                {data: 'price', name: 'price'},
                {data: 'karat', name: 'karat'},
                {data: 'wight', name: 'wight'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]

        });

    });
</script>
