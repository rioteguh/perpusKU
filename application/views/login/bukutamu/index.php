    <style>
        body{
            background-image: url('<?=base_url('dist/images/background-5540399_1920.jpg');?>'); 
            background-size: cover;
            background-attachment: fixed;
        }
    </style>
    <br/>
    <div class="image">
        <center><img src="<?=base_url("dist/images/logosekolah.png");?>" width="7%"></center>
    </div>
    <!-- <br/> -->
    <center><h4 class="col-white">BUKU TAMU VISITOR</h4></center>
    <center><h4 class="col-white">PerpusKU - Perpustakaan Digital</h4></center>
    <center>
        <a href="<?=base_url();?>login" class="btn btn-danger waves-effect">
            <i class="material-icons">lock</i>
            <span>Kembali Login</span>
        </a>
        <a href="<?=base_url();?>pencarian" class="btn btn-info waves-effect media-right">
            <i class="material-icons">search</i>
            <span>Pencarian Buku</span>
        </a>
    </center>
    <br/>
    <div class="container-fluid">
        <!-- Basic Card -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12"></div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <form id="form" action="javascript:void(0);" autocomplete="off">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">person</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" id="nis" name="nis" class="form-control" placeholder="NIS atau Nomor Identitas">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">local_library</i>
                                        </span>
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" id="tujuan" name="tujuan" placeholder="Tujuan datang ke perpustakaan ?"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="refresh" class="btn btn-warning waves-effect" onclick="refresh()">
                            <i class="material-icons">refresh</i>
                            <span>Refresh</span>
                        </button>
                        <button type="button" class="btn bg-teal waves-effect" onclick="simpan()">
                            <i class="material-icons">save</i>
                            <span>Submit</span>
                        </button>
                        </form>
                    </div>
                    <hr/>
                    <center><span>Copyright &copy; 2018</span></center>
                    <center><strong><span class="col-pink">PerpusKu</span> - SMK Telekomunikasi Telesandi Bekasi</strong></center>
                    <br/>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12"></div>
    </div>
    
    <!-- Default Size -->
    <div class="modal fade" id="modal_form" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-teal">
                    <h4 class="modal-title" id="defaultModalLabel"></h4>
                </div>
                <div class="modal-body">
                    <div id="view"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-red waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>