<script type="text/javascript">
    $(document).ready(function () {

        globalThis.table = $('#table_id').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            ajax: "{{route('employee.index')}}",
            language: {
                "lengthMenu": "عرض _MENU_ صف في الصفحة",
                "zeroRecords": "لم يتم إيجاد شيء",
                "info": "عرض صفحة _PAGE_ من _PAGES_",
                "infoEmpty": "لا يوجد أي بيانات متاحة",
                "infoFiltered": "(تصفية من _MAX_ العدد الكلي للصفوف)",
                "sSearch": "البحث:"

            },
            columns: [
                {data: 'full_name', name: 'full_name'},
                {data: 'email', name: 'email'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]

        });

    });
</script>
