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
                $('#tot_buku').text('Loading...');
            },
            success: function(data)
            {
                $('#visit_off').text(data.visit_off);
                $('#visit_on').text(data.visit_on);
                $('#tot_buku').text(data.tot_buku);
            },
            error: function (data)
            {
                $('#visit_off').text('!');
                $('#visit_on').text('!');
                $('#tot_buku').text('!');
            }
        });
    }
</script>