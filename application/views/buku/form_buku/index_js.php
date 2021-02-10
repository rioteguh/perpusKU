<script>
    var table;
    $(document).ready(function() {
        //datatables
        table = dt_buku();
    });

    function dt_buku()
    {
        $('.js-basic-example').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('buku_api')?>/list_buku",
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

    function reload_table()
    {
        $('.js-basic-example').DataTable().ajax.reload(); //reload datatable ajax 
        $('#form')[0].reset(); // reset form on modals
    }

    function add_buku()
    {
        $('#modal_form').modal('show'); // show bootstrap modal
    }

</script>