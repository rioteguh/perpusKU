<script>
    $(document).ready(function() {
        load_data();
    });

    function load_data()
    {
        $.ajax({
            url : "<?php echo site_url('buku_api/load_by_id/'); echo $id;?>",
            type: "POST",
            dataType: 'json',
            beforeSend: function(data) {
                $('#loading').html('');
            },
            success: function(data)
            {
                $('#loading').text('');
                var tampil = '<img class="img-responsive thumbnail" src="<?=base_url("dist/file/img/'+data.data.nama_img+'");?>" width="50%">'+
                                '<table>'+
                                '<tr><th>Judul</th><td>: '+data.data.judul+'</td></tr>'+
                                '<tr><th>Kategori</th><td>: '+data.data.kategori.toUpperCase()+'</td></tr>'+
                                '<tr><th>Penulis</th><td>: '+data.data.penulis+'</td></tr>'+
                                '<tr><th>Penerbit</th><td>: '+data.data.penerbit+'</td></tr>'+
                                '<tr><th>Tahun</th><td>: '+data.data.thn_terbit+'</td></tr>'+
                                '<tr><th><button type="button" class="btn btn-info waves-effect" onclick="view_pdf()">'+
                                    '<i class="material-icons">remove_red_eye</i>'+
                                    '<span id="loading">View</span>'+
                                '</button></th><td><button type="button" class="btn btn-danger waves-effect" onclick="close_window()">'+
                                    '<i class="material-icons">cancel</i>'+
                                    '<span id="loading">Back</span>'+
                                '</button></td></tr>'+
                                '</table>';
                $('#tampil_desc').html(tampil);
            },
            error: function (data)
            {
                $('#loading').html('<strong>Data tidak ditemukan</strong>');
            }
        });
    }

    function view_pdf()
    {
        $.ajax({
            url : "<?php echo site_url('buku_api/load_by_id/'); echo $id;?>",
            type: "POST",
            dataType: 'json',
            beforeSend: function(data) {
                $('#loading').text('Loading...');
            },
            success: function(data)
            {
                $('#loading').text('View');
                var tampil = '<iframe src="<?=base_url("dist/file/doc/'+data.data.nama_file+'");?>#toolbar=0" frameBorder="0" scrolling="auto" height="541px" width="100%" ></iframe>';
                $('#tampil_pdf').html(tampil);
            },
            error: function (data)
            {
                $('#loading').text('View');
                alert('Mohon maaf, terjadi kesalahan sistem.');
            }
        });
    }

    function close_window() {
        if (confirm("Apakah anda yakin keluar laman ini ?")) {
            close();
        }
    }
</script>