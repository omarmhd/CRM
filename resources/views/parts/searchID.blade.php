<script>
    $(function () {
        $('#client_id').keyup(function() {
            var query = $(this).val();
            $('#name').css("color","")
            $('#name').val("")
            $.ajax({
                url: "{{route('search.client')}}",
                method: 'get',
                data: {query: query},
                success: function(response) {

                    $('#name').val(response.message)

                },
                error: function(response, textStatus, errorThrown) {
                    $('#name').val("الزبون غير مسجل في النظام")
                    $('#name').css("color","red")
                }
                ,

            });
        });




    })


</script>
