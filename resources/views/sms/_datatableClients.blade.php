<script type="text/javascript">
    $(document).ready(function () {

        globalThis.table = $('#table_id').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            ajax: "{{route('sms.edit',$sms)}}",
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
                { data: 'checkbox',name:'checkbox'},
                {data: 'full_name', name: 'full_name'},
                {data: 'phone', name: 'phone'},
            ]

        });

    });
</script>
