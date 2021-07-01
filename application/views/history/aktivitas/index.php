    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Aktivitas - <?=$this->session->userdata('MM_Name');?></h2>
            </div>
            <!-- Basic Card -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TABEL AKTIVITAS <span id="loading"></span>
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Keterangan</th>
                                        <th>Tgl</th>
                                    </tr>
                                </thead>
                                <tbody id="data">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>