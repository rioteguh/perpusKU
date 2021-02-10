    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>User Administrator</h2>
            </div>
            <!-- Basic Card -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TABEL USER
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <button type="button" class="btn bg-light-blue waves-effect m-r-20" onclick="add_user()"><i class="material-icons">person_add</i> Add User</button>
                            <button type="button" class="btn bg-pink waves-effect m-r-20" onclick="reload_table()"><i class="material-icons">cached</i> Reload</button>
                            <hr/>
                            <table class="table table-bordered js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Perpus</th>
                                        <th>Nama User</th>
                                        <th>Email</th>
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