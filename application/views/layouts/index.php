<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Main view</title>

    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?= base_url() ?>assets/css/customs.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">

</head>

<body>

<div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                               
                            <span class="clear"> <span class="block m-t-xs"> <span size="20px">  <strong class="font-bold" >Siloket</strong>
                             </span> <span class="text-muted text-xs block"><b >Dinas Pendapatan Daerah </b></span> </span> </a> 
                           <!--  <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="<? //= base_url ('auth/login')?>">Login</a></li>
                                <li><a href="<? //= base_url ('auth/register')?>">register</a></li>
                            </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                -

                <li class="active">
                    <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Main view</span></a>
                </li> -->
                <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"   aria-haspopup="true" aria-expanded="false">Master Data
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                <?php if(isset($this->session->userdata('login')['nama'])){ ?>
                    <li>
                        <a href="<?= base_url('loket/index')?>"><i class="fa fa-th-large"></i> <span class="nav-label">Tambah Loket</span> </a>
                    </li>
                     <li>
                        <a href="<?= base_url('Kecamatan/index')?>"><i class="fa fa-th-large"></i> <span class="nav-label">Tambah Kecamatan</span> </a>
                    </li>
                     <li>
                        <a href="<?= base_url('ta_loket/index')?>"><i class="fa fa-th-large"></i> <span class="nav-label">Ref Loket</span> </a>
                    </li>
                    <li>
                        <a href="<?= base_url('ta_antrian/index')?>"><i class="fa fa-th-large"></i> <span class="nav-label">Antrian</span> </a>
                    </li>
                <?php }?>
            </ul>
        </li>

        <?php if(isset($this->session->userdata('login')['nama'])){ ?>
                    <li>
                        <a href="<?= base_url('userloket')?>"><i class="fa fa-th-large"></i> <span class="nav-label">LOKET</span> </a>
                    </li>
                    <li>
                        <a href="<?= base_url('home')?>"><i class="fa fa-th-large"></i> <span class="nav-label">PENGUNJUNG</span> </a>
                    </li>
                     <li>
                        <a href="<?= base_url('dataantrian')?>"><i class="fa fa-th-large"></i> <span class="nav-label">RIWAYAT</span> </a>
                    </li>
                <?php }?>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" method="post" action="#">
                        <div class="form-group">
                            <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="auth/logout">
                            <?php if(isset($this->session->userdata('login')['nama'])){ ?>
                            <i class="fa fa-sign-out"></i> Log out
                        <?php } else { ?>
                             <i class="fa fa-sign-out"></i> Login
                             <?php }?>
                        </a>
                    </li>
                </ul>



            </nav>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                        <?= $content ?>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="pull-right">
                SISTEM <strong>INFORMASI</strong> LOKET.
            </div>
           <!--  <div>
                <strong>Copyright</strong> Antrian Loket
            </div> -->
        </div>

    </div>
</div>

<!-- Mainly scripts -->
<script src="<?= base_url() ?>assets/js/jquery-3.1.1.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?= base_url() ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?= base_url() ?>assets/js/inspinia.js"></script>
<script src="<?= base_url() ?>assets/js/plugins/pace/pace.min.js"></script>


</body>

</html>
