<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Data Peminjaman</h2>
            </div>
            <!-- Basic Card -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TABEL PEMINJAM BUKU
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <button type="button" class="btn bg-light-blue waves-effect m-r-20" onclick="tambah_data()"><i class="material-icons">book</i> Pinjam Buku</button>
                            <button type="button" class="btn bg-pink waves-effect m-r-20" onclick="reload_table()"><i class="material-icons">cached</i> Reload</button>
                            <hr/>
                            <table class="table table-bordered js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>ID_Buku</th>
                                        <th>Tgl Pinjam</th>
                                        <th>Tgl Kembali</th>
                                        <th>Status</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
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
                    <h4 class="modal-title" id="defaultModalLabel">Tambah Daftar Peminjam</h4>
                </div>
                <form autocomplete="off" enctype="multipart/form-data" method="post" action="<?=base_url();?>buku_api/tambah_buku">
                    <div class="modal-body">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="judul" name="judul" class="form-control">
                                <label class="form-label">Judul Buku</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <select class="form-control show-tick" name="kategori" id="kategori">
                                <option value="">-- Kategori Buku --</option>
                                <option value="novel">Novel</option>
                                <option value="kompetensi">Kompetensi</option>
                                <option value="religi">Religi</option>
                                <option value="sains">Sains</option>
                                <option value="sosial">Sosial</option>
                                <option value="komik">Komik</option>
                                <option value="jurnal">Jurnal</option>
                            </select>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="penulis" name="penulis" class="form-control">
                                <label class="form-label">Penulis / Pengarang</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="penerbit" name="penerbit" class="form-control">
                                <label class="form-label">Penerbit</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="thn" name="thn" class="form-control">
                                <label class="form-label">Tahun Terbit</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">Input Cover</label>
                            <input type="file" id="cover" name="cover" class="form-control" accept="image/*">
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">FIle Buku</label>
                            <input type="file" id="file_buku" name="file_buku" class="form-control" accept=".pdf">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn bg-blue waves-effect" id="btnSave" onclick="save()">TAMBAH</button>
                        <button type="button" class="btn bg-red waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>