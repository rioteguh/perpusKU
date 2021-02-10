<script>
    var table;
    $(document).ready(function() {
    
        //datatables
        table = dt_user();

    });

    function dt_user()
    {
        $('.js-basic-example').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('user_api')?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
                { 
                    "targets": [ 0 ], //first column / numbering column
                    "orderable": false, //set not orderable
                },
            ],

        });
    }

    function add_user()
    {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }
    function reload_table()
    {
        $('.js-basic-example').DataTable().ajax.reload(); //reload datatable ajax 
        $('#form')[0].reset(); // reset form on modals
    }

    function save()
    {
        $('#btnSave').text('SIMPAN...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable 
        var url;
    
        if(save_method == 'add') {
            url = "<?php echo site_url('user_api/add_user')?>";
        } else {
            url = "<?php echo site_url('user_api/update_user')?>";
        }
    
        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
    
                if(data.status) //if success close modal and reload ajax table
                {
                    $('#modal_form').modal('hide');
                    reload_table();
                }
    
                $('#btnSave').text('SIMPAN'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
    
    
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Data tidak bisa disimpan !');
                $('#btnSave').text('TAMBAH'); //change button text
                $('#btnSave').attr('enabled',false); //set button enable 
    
            }
        });
    }

    function delete_user(id)
    {
        if(confirm('Apakah anda yakin ingin menghapusnya?'))
        {
            // ajax delete data to database
            $.ajax({
                url : "<?php echo site_url('user_api/delete_user')?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                    //if success reload ajax table
                    $('#modal_form').modal('hide');
                    reload_table();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Data tidak bisa dihapus !');
                }
            });
    
        }
    }

</script>