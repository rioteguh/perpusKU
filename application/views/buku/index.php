    <style>
        .bayang {
            cursor: pointer;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
        }

        .bayang1:hover {
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
        }
    </style>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Koleksi Buku</h2>
            </div>
            <!-- Basic Card -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DAFTAR KOLEKSI BUKU
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group form-float">
                                        <select class="form-control show-tick" name="kategori" id="kategori" onchange="get_koleksi()">
                                            <option value="">-- Kategori Buku --</option>
                                            <option value="sains">Sains</option>
                                            <option value="sosial">Sosial</option>
                                            <option value="komik">Komik</option>
                                            <option value="novel">Novel</option>
                                            <option value="religi">Religi</option>
                                            <option value="kompetensi">Kompetensi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-5">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="search" name="search" class="form-control" onchange="get_koleksi()" placeholder="Pencarian Buku">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <center><div id="loading"></div></center>
                            <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                                
                            </div>
                            <div>
                                <!-- <embed src="<?=base_url("dist/file/doc/Ayat - ayat Cinta ( PDFDrive ).pdf");?>" type="application/pdf" style="pointer-events: none;"  height="800px" width="100%"> -->
                                <!-- <iframe
                                    src="<?=base_url("dist/file/doc/Ayat - ayat Cinta ( PDFDrive ).pdf");?>#toolbar=0"
                                    frameBorder="0"
                                    scrolling="auto"
                                    height="500px"
                                    width="100%"
                                ></iframe> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Default Size -->
    <div class="modal fade" id="modal_form" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Tambah User</h4>
                </div>
                <form id="form" autocomplete="off">
                    <div class="modal-body">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="id_perpus" name="id_perpus" class="form-control">
                                <label class="form-label">ID Perpus</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="nis" name="nis" class="form-control">
                                <label class="form-label">Nama User</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="email" id="email" name="email" class="form-control">
                                <label class="form-label">Email</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="password" id="password" name="password" class="form-control">
                                <label class="form-label">Password</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <select class="form-control show-tick" name="status" id="status">
                                <option value="">-- Status User --</option>
                                <option value="visitor">Visitor</option>
                                <option value="admin">Administrator</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-blue waves-effect" id="btnSave" onclick="save()">TAMBAH</button>
                        <button type="button" class="btn bg-red waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>