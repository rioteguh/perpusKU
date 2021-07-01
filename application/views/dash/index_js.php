<script>
    $(document).ready(function() {
        data_dash();
    });

    function data_dash()
    {
        $.ajax({
            url : "<?php echo site_url('dash/data_dashboard')?>",
            type: "POST",
            dataType: 'json',
            beforeSend: function(data) {
                $('#visit_off').text('Loading...');
                $('#visit_on').text('Loading...');
                $('#reward').text('Loading...');
                $('#tot_buku').text('Loading...');
            },
            success: function(data)
            {
                var head = '<table class="table">';
                var foot = '</table>';
                var body = '';
                                
                for (var i = 0; i < data.reward.length; i++) {
                    body += '<tr>'+
                                '<td>'+data.reward[i].id_user+'</td>'+
                                '<th>'+data.reward[i].nis+'</th>'+
                                <?php
                                if ($this->session->userdata('MM_Status') == 'admin'): ?>
                                '<td>'+data.reward[i].jmlh+'</td>'+
                                <?php endif; ?>
                            '</tr>';
                    // body += '<li class="list-group-item"><i class="material-icons">person</i> <span>'+data.reward[i].id_user+' '+data.reward[i].nis+'</span></li>';
                }

                $('#reward').html(head+body+foot);
                $('#visit_off').text(data.visit_off);
                $('#visit_on').text(data.visit_on);
                $('#tot_buku').text(data.tot_buku);
            },
            error: function (data)
            {
                $('#reward').text('');
                $('#visit_off').text('!');
                $('#visit_on').text('!');
                $('#tot_buku').text('!');
            }
        });
    }
</script>