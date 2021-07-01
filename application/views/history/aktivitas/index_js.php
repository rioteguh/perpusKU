<script>
    $(document).ready(function() {
        //datatables
        get_data();
    });

    function get_data()
    {
        $.ajax({
            url : "<?php echo site_url('histori_api/')?>",
            type: "POST",
            dataType: 'json',
            beforeSend: function(data) {
                $('#loading').text(' | Loading...');
            },
            success: function(data)
            {
                var body = '';
                var no = 1;
                                
                for (var i = 0; i < data.data.length; i++) {
                    body += '<tr>'+
                                '<td>'+ no++ +'</td>'+
                                '<td>'+data.data[i].ket+'</td>'+
                                '<td>'+data.data[i].date+'</td>'+
                            '</tr>';
                }

                $('#data').html(body);
                $('#loading').text('');
            },
            error: function (data)
            {
                $('#loading').text('');
            }
        });
    }

</script>