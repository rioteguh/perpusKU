<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Home</h2>
            </div>
            <!-- Body Copy -->
            <?php if ($this->session->userdata('MM_Status') == 'admin') :?>
            <div class="row clearfix">
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person</i>
                        </div>
                        <div class="content">
                            <div class="text">VISITOR ONLINE</div>
                            <div class="number count-to" data-speed="15" data-fresh-interval="20"><span id="visit_on"></span></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person</i>
                        </div>
                        <div class="content">
                            <div class="text">VISITOR OFFLINE</div>
                            <div class="number count-to" data-speed="1000" data-fresh-interval="20"><span id="visit_off"></span></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">book</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL BUKU</div>
                            <div class="number count-to" data-speed="1000" data-fresh-interval="20"><span id="tot_buku"></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            <?php endif;?>

            <div class="row clearfix">
                <!-- Line Chart -->
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>VISITOR CHART</h2>
                        </div>
                        <div class="body">
                            <canvas id="line_chart" height="150"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>VISITOR TERBAIK</h2>
                        </div>
                        <div class="body" id="reward">
                        </div>
                    </div>
                </div>
                <!-- #END# Line Chart -->
            </div>

            <div class="block-header">
                <h2>Informasi</h2>
            </div>

            <!-- Basic Example -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-red">
                            <h2>
                                Pengembalian Buku 
                            </h2>
                        </div>
                        <div class="body">
                            Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, etiam lacinia netus dictum magnis per facilisi sociosqu. Volutpat. Ridiculus nostra.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>