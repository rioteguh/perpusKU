
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?=$judul;?></title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?=base_url('dist/plugins/bootstrap/css/bootstrap.css');?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?=base_url('dist/plugins/node-waves/waves.css');?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?=base_url('dist/plugins/animate-css/animate.css');?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?=base_url('dist/css/style.css');?>" rel="stylesheet">
</head>

<body class="login-page bg-pink" style="background-image: url('<?=base_url('dist/images/page-3949423_1920.jpg');?>'); background-size: cover;">
    <div class="login-box">
        <div class="logo ">
            <div class="image">
                <center><img src="<?=base_url("dist/images/logosekolah.png");?>" width="35%"></center>
            </div>
            <a href="javascript:void(0);" class="">Perpus<b>KU</b></a>
            <small class="font-bold">SMK Telekomunikasi Telesandi Bekasi</small>
        </div>
        <div class="card">
            <div class="body">
                <form method="POST" action="<?=base_url();?>login/login" autocomplete="off">
                    <!-- <div class="msg col-pink">Login dahulu untuk mengunjungi lebih lanjut !</div> -->
                    <?php if ($error == null) :?>
                        <br/>
                    <?php else:?>
                        <div><?=$error;?></div>
                    <?php endif;?>
                    
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="<?=base_url();?>bukutamu">Buku Tamu Visitor</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="<?=base_url();?>pencarian">Cari Buku</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?=base_url('dist/plugins/jquery/jquery.min.js');?>"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?=base_url('dist/plugins/bootstrap/js/bootstrap.js');?>"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?=base_url('dist/plugins/node-waves/waves.js');?>"></script>

    <!-- Validation Plugin Js -->
    <script src="<?=base_url('dist/plugins/jquery-validation/jquery.validate.js');?>"></script>

    <!-- Custom Js -->
    <script src="<?=base_url('dist/js/admin.js');?>"></script>
    <script src="<?=base_url('dist/js/pages/examples/sign-in.js');?>"></script>
</body>

</html>