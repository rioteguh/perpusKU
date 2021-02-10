<script>
    function get_koleksi()
    {
        var search = document.getElementById("search").value;
        $.ajax({
            url : "<?php echo site_url('login/pencarian_api')?>",
            type: "POST",
            dataType: 'json',
            data: {search:search},
            beforeSend: function(data) {
                var loading = '<div class="preloader pl-size-md">'+
                                    '<div class="spinner-layer">'+
                                        '<div class="circle-clipper left">'+
                                            '<div class="circle"></div>'+
                                        '</div>'+
                                        '<div class="circle-clipper right">'+
                                            '<div class="circle"></div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';
                $('#loading').html(loading);
            },
            success: function(data)
            {
                
                $('#loading').text('');

                var image = '';

                if (data.jml_data != 0) {
                    for(var i = 0 ; i < data.data.length; i++)
                    {
                        image += '<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" title="'+data.data[i].judul+'">'+
                                    '<a href="javascript:void(0);">'+
                                        '<center><img class="img-responsive thumbnail bayang bayang1" src="<?=base_url("dist/file/img/'+data.data[i].nama_img+'");?>" width="40%" onclick="detail_buku('+data.data[i].id+')"></center>'+
                                    '</a>'+
                                '</div>';
                    }
                    $('#aniimated-thumbnials').html(image);
                }else{
                    if (search == null || search == '') {
                        $('#aniimated-thumbnials').text('');
                    }else{
                        image = '<strong><center>Data Tidak Ditemukan</center></strong>';
                        $('#aniimated-thumbnials').html(image);
                    }
                }
                
            },
            error: function (data)
            {
                $('#loading').html('<strong>Data tidak ditemukan</strong>');
            }
        });
    }

    function detail_buku(id)
    {
        $.ajax({
            url : "<?php echo site_url('login/detail_buku')?>",
            type: "POST",
            dataType: 'json',
            data: {kategori:id},
            beforeSend: function(data) {
                $('#loading').html('');
            },
            success: function(data)
            {
                var view ='';
                var judul ='';

                for(var i = 0 ; i < data.data.length; i++)
                {
                    if (data.data[i].jml_tersedia != 0) {
                        var sedia = 'Tersedia';
                    }else{
                        var sedia = 'Tidak Tersedia';
                    }
                    view += '<div class="row">'+
                                    '<div class="col-lg-4">'+
                                        '<img class="img-responsive thumbnail" src="<?=base_url("dist/file/img/'+data.data[i].nama_img+'");?>" width="100%"">'+
                                    '</div>'+
                                    '<div class="col-lg-8">'+
                                        '<table class="table">'+
                                            '<tr>'+
                                                '<th>Kode Buku</th>'+
                                                '<td>: '+data.data[i].id_buku+'</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<th>Judul</th>'+
                                                '<td>: '+data.data[i].judul+'</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<th>Kategori</th>'+
                                                '<td>: '+data.data[i].kategori.toUpperCase()+'</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<th>Penulis</th>'+
                                                '<td>: '+data.data[i].penulis+'</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<th>Penerbit</th>'+
                                                '<td>: '+data.data[i].penerbit+'</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<th>Tahun</th>'+
                                                '<td>: '+data.data[i].thn_terbit+'</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<strong>Ketersediaan Buku :</strong>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<th>No.Rak</th>'+
                                                '<td>: '+data.data[i].no_rak+'</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<th>Lokasi</th>'+
                                                '<td>: '+data.data[i].level+'</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<th>Ketersediaan </th>'+
                                                '<td>: '+sedia+'</td>'+
                                            '</tr>'+
                                        '</table>'+
                                    '</div>'+
                            '</div>';
                }
                $('#defaultModalLabel').text('DETAIL KETERSEDIAAN BUKU');
                $('#view').html(view);
                $('#modal_form').modal('show'); // show bootstrap modal
            },
            error: function (data)
            {
                alert('Error, Terjadi Kesalahan Sistem !');
            }
        });
    }
</script>