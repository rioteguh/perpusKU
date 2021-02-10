<script>
    function simpan()
    {
        $.ajax({
            url : "<?php echo site_url('login/tambah_aktivitas');?>",
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
                if(data.status == true) //if success close modal and reload ajax table
                {
                    alert('Terimakasih sudah mengisi buku tamu perpustakaan.');
                    refresh();
                }else{
                    if (data.keterangan == 'sudah ada') {
                        alert('Anda sudah mengisi buku tamu perpustakaan !');
                        refresh();
                    }else{
                        alert('Mohon untuk mengisi buku tamu perpustakaan dengan lengkap !');
                    }
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Data tidak bisa disimpan !');
            }
        });
    }

    function refresh()
    {
        $('#form')[0].reset();
    }
</script>