<script>
    $(document).ready(function() {
        
    });

    function get_koleksi()
    {
        var kategori = document.getElementById("kategori").value;
        var search = document.getElementById("search").value;
        $.ajax({
            url : "<?php echo site_url('buku_api')?>",
            type: "POST",
            dataType: 'json',
            data: {kategori:kategori, search:search},
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

                if (kategori == null) {
                    image = '<strong><center>Data Tidak Ditemukan</center></strong>';
                    $('#aniimated-thumbnials').html(image);
                }
                if (data.data != null) {
                    for(var i = 0 ; i < data.data.length; i++)
                    {
                        image += '<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" title="'+data.data[i].judul+'">'+
                                    '<a href="<?=base_url();?>views/detail_buku?id='+data.data[i].id_buku+'" target="_blank">'+
                                        '<img class="img-responsive thumbnail bayang bayang1" src="<?=base_url("dist/file/img/'+data.data[i].nama_img+'");?>" width="80%">'+
                                    '</a>'+
                                '</div>';
                    }
                    $('#aniimated-thumbnials').html(image);
                }else{
                    image = '<strong><center>Data Tidak Ditemukan</center></strong>';
                    $('#aniimated-thumbnials').html(image);
                }
                
            },
            error: function (data)
            {
                $('#loading').html('<strong>Data tidak ditemukan</strong>');
            }
        });
    }
</script>